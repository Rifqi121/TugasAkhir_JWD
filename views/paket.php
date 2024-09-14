<?php 
    include "koneksi.php";
    include "components/header.php";  ?>
<!-- Button trigger modal -->
<div class="container my-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahpaket">
        Tambah Paket
    </button>

    <!-- Modal -->
    <div class="modal fade" id="tambahpaket" tabindex="-1" aria-labelledby="tambahpaketLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="aksi_paket.php" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="tambahpaketLabel">Tambah Paket Wisata</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tnama" class="form-label">Nama Paket</label>
                            <input type="text" name="tnama" class="form-control" id="tnama" required>
                        </div>
                        <div class="mb-3">
                            <label for="tdeskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="tdeskripsi" id="tdeskripsi" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="tfoto" class="form-label">Gambar Paket</label>
                            <input type="file" accept="image/*" name="tfoto" class="form-control" id="tfoto" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="btntambah">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="table-responsive-lg">
        <table class="table table-striped table-hover table-bordered mt-3">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * FROM paket");

            while ($data = mysqli_fetch_array($tampil)) :
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['deskripsi'] ?></td>
                    <td><img src="uploads/<?= $data['foto'] ?>" class="img-thumbnail" style="max-width: 150px; height: auto;"> </td>
                    <td>
                        <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">Ubah</a>
                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">Hapus</a>
                    </td>
                </tr>

                <!-- Modal Hapus -->
                <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data Paket Wisata</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="aksi_paket.php" method="post">
                                <input type="hidden" name="id_paket" value="<?= $data['id'] ?>">
                                <input type="hidden" name="nama_foto" value="<?= $data['foto'] ?>">
                                <div class="modal-body">
                                    <h5 class="text-center">Apakah anda yakin menghapus data ini?
                                        <span class="text-danger"><?= $data['nama'] ?></span>
                                    </h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger" name="bhapus">Hapus</button>
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Keluar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal Ubah-->
                <div class="modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Ubah Paket</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="aksi_paket.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_paket" value="<?= $data['id'] ?>">
                                <input type="hidden" name="nama_foto" value="<?= $data['foto'] ?>">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="tnama" class="form-label">Nama paket:</label>
                                        <input type="text" class="form-control" id="tnama" name="tnama" value="<?= $data['nama'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tdeskripsi" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" id="tdeskripsi" rows="3" name="tdeskripsi" required><?= $data['deskripsi'] ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tfoto" class="form-label">Foto paket</label>
                                        <input class="form-control" type="file" id="tfoto" accept="image/*" name="tfoto" onchange="preview_edit(event)" value="<?= $data['foto'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <img id="gambar_ubah" width="20%" src="uploads/<?= $data['foto'] ?>"> <br>
                                        <script>
                                            var preview_edit = function(event) {
                                                var output = document.getElementById('gambar_ubah');
                                                output.src = URL.createObjectURL(event.target.files[0]);
                                                output.onload = function() {
                                                    URL.revokeObjectURL(output.src) // free memory
                                                }
                                            };
                                        </script>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary" name="bubah">Ubah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </table>
    </div>
</div>

<?php include "components/footer.php"; ?>