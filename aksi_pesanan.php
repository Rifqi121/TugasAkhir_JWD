<?php

include "koneksi.php";

if (isset($_POST['btnsimpan'])) {
    // Persiapan simpan data
    $kueri = "INSERT INTO pemesanan (
        namaPemesan, 
        telepon,
        lamaPerjalanan,
        akomodasi,
        transportasi,
        serviceMakan,
        jumPeserta,
        harga,
        totalTagihan
    ) VALUES (
        '$_POST[tnama]',
        '$_POST[tnomorhp]',
        '$_POST[tjumhari]',
        '$_POST[cpenginapan]',
        '$_POST[ctransportasi]',
        '$_POST[cmakan]',
        '$_POST[tjumpeserta]',
        '$_POST[tharga]',
        '$_POST[ttagihan]'
    );";

    $simpan = mysqli_query($koneksi, $kueri);

    // Jika simpan sukses
    if ($simpan) {
        echo "<script> 
            alert('Simpan data sukses');
            document.location = 'index.php?page=pesanan'; 
        </script>";
    } else {
        echo "<script>
            alert('Simpan data gagal');
            document.location = 'index.php?page=pesanan'; 
        </script>";
    }
}

if (isset($_POST['bhapus'])) {
    // Persiapan hapus data
    $hapus = mysqli_query($koneksi, "DELETE FROM pemesanan WHERE id = '$_POST[id_pemesanan]'");

    // Jika hapus sukses
    if ($hapus) {
        echo "<script>
            alert('Hapus data sukses');
            document.location = 'index.php?page=pesanan'; 
        </script>";
    } else {
        echo "<script>
            alert('Hapus data gagal');
            document.location = 'index.php?page=pesanan'; 
        </script>";
    }
}

if (isset($_POST['bubah'])) {
    // Persiapan ubah data
    $ubah = mysqli_query($koneksi, "UPDATE pemesanan SET 
        namaPemesan = '$_POST[tnama]',
        telepon = '$_POST[tnomorhp]',
        lamaPerjalanan = '$_POST[tjumhari]',
        akomodasi = '$_POST[cpenginapan]',
        transportasi = '$_POST[ctransportasi]',
        serviceMakan = '$_POST[cmakan]',
        jumPeserta = '$_POST[tjumpeserta]',
        harga = '$_POST[tharga]',
        totalTagihan = '$_POST[ttagihan]'
        WHERE id = '$_POST[id_pesanan]'");

    // Jika ubah sukses
    if ($ubah) {
        echo "<script>
            alert('Ubah data sukses');
            document.location = 'index.php?page=pesanan'; 
        </script>";
    } else {
        echo "<script>
            alert('Ubah data gagal');
            document.location = 'index.php?page=pesanan'; 
        </script>";
    }
}
?>
