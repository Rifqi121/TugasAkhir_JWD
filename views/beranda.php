<?php 
    include "koneksi.php";
    include "components/header.php"; 
?>
<main class="container">
    <section class="destination">
        <h3 class="text-center mb-4">Rekomendasi Paket</h3>
        <hr class="mb-5" style="border-top: 2px solid #007bff; width: 50px; margin: 0 auto;">
        <div class="row">
            <?php
            $paket = mysqli_query($koneksi, "SELECT * FROM paket");

            while ($data = mysqli_fetch_array($paket)) :
            ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="uploads/<?= $data['foto'] ?>" class="img-fluid" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $data['nama'] ?></h5>
                        <p class="card-text"><?= $data['deskripsi'] ?></p>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#daftarpaket">Daftar Paket</button>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </section>

    <div class="modal fade" id="daftarpaket" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="aksi_pesanan.php" method="post">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pesanan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="tnama" class="form-label">Nama Pemesan</label>
                            <input type="text" class="form-control" id="tnama" name="tnama" required>
                        </div>

                        <div class="mb-3">
                            <label for="tnomorhp" class="form-label">Nomor HP Pemesan</label>
                            <input type="number" class="form-control" id="tnomorhp" name="tnomorhp" required>
                        </div>

                        <div class="mb-3">
                            <label for="tjumhari" class="form-label">Waktu Pelaksanaan Perjalanan</label>
                            <input type="number" min="1" class="form-control" id="tjumhari" name="tjumhari" value="0"
                                required>
                        </div>

                        <label class="mb-3">Pelayanan paket perjalanan</label>

                        <div class="mb-3 form-check">
                            <input type="hidden" class="form-check-input" name="cpenginapan" value="N">
                            <input type="checkbox" class="form-check-input" id="cpenginapan" name="cpenginapan"
                                value="Y">
                            <label class="form-check-label" for="cpenginapan">Penginapan Rp. 1.000.000</label>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="hidden" class="form-check-input" name="ctransportasi" value="N">
                            <input type="checkbox" class="form-check-input" id="ctransportasi" name="ctransportasi"
                                value="Y">
                            <label class="form-check-label" for="ctransportasi">Transportasi Rp. 1.200.000</label>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="hidden" class="form-check-input" name="cmakan" value="N">
                            <input type="checkbox" class="form-check-input" id="cmakan" name="cmakan" value="Y">
                            <label class="form-check-label" for="cmakan">Makan Rp. 500.000</label>
                        </div>

                        <div class="mb-3">
                            <label for="tjumpeserta" class="form-label">Jumlah Peserta</label>
                            <input type="number" min="1" class="form-control" id="tjumpeserta" name="tjumpeserta"
                                value="0" required>
                        </div>

                        <div class="mb-3">
                            <label for="tharga" class="form-label">Harga Paket Perjalanan</label>
                            <input type="number" min="1" class="form-control" id="tharga" name="tharga" value="0"
                                readonly required>
                        </div>

                        <div class="mb-3">
                            <label for="ttagihan" class="form-label">Jumlah Tagihan</label>
                            <input type="number" min="1" class="form-control" id="ttagihan" name="ttagihan" value="0"
                                readonly required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" name="btnsimpan">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <section class="youtube py-2">
        <div class="container">
            <h3 class="text-center mb-4">Video Pariwisata</h3>
            <hr class="mb-5" style="border-top: 2px solid #007bff; width: 50px; margin: 0 auto;">
            <div class="ratio ratio-16x9" style="max-width: 800px; margin: 0 auto;">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/VOFo8J7h2Kg?si=1Rk_VNb9_rwwu26O" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>
    </section>
</main>

<?php include "components/footer.php"; ?>