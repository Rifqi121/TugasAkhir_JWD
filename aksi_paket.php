<?php

include "koneksi.php";

if (isset($_POST['btntambah'])) {
    //persiapan simpan data

    $fname = $_FILES['tfoto']['name'];
    $dirname = "uploads/";

    if (!move_uploaded_file($_FILES['tfoto']['tmp_name'], $dirname . $fname)) {
        return;
    }

    $kueri = "INSERT INTO paket (nama, deskripsi, foto) VALUES ('$_POST[tnama]','$_POST[tdeskripsi]', '$fname');";

    $simpan = mysqli_query($koneksi, $kueri);

    //jika simpan sukses
    if ($simpan) {
        echo "<script>
                alert('Simpan data sukses');
                document.location = 'index.php?page=paket';
              </script>";
    } else {
        echo "<script>
                alert('Simpan data gagal');
                document.location = 'index.php?page=paket';
              </script>";
    }
}

if (isset($_POST['bhapus'])) {
    //persiapan hapus data
    $hapus = mysqli_query($koneksi, "DELETE FROM paket WHERE id = '$_POST[id_paket]' ");

    unlink('uploads/' . $_POST['nama_foto']);

    //jika hapus sukses
    if ($hapus) {
        echo "<script>
                alert('Hapus data sukses');
                document.location = 'index.php?page=paket';
              </script>";
    } else {
        echo "<script>
                alert('Hapus data gagal');
                document.location = 'index.php?page=paket';
              </script>";
    }
}


if (isset($_POST['bubah'])) {
    //persiapan ubah data
    $kueri =  "UPDATE paket SET 
                            nama = '$_POST[tnama]',
                            deskripsi = '$_POST[tdeskripsi]'
               WHERE id = '$_POST[id_paket]' ";

    if ($_FILES['tfoto']['size'] != 0) {
        //hapus file sebelumnya
        unlink('uploads/' . $_POST['nama_foto']);

        //upload file baru
        $fname = $_FILES['tfoto']['name'];
        $dirname = "uploads/";

        if (!move_uploaded_file($_FILES['tfoto']['tmp_name'], $dirname . $fname)) {
            echo "<script>
                alert('Ubah data gagal');
                document.location = 'index.php?page=paket';
              </script>";
        }

        //tentukan kueri baru
        $kueri =  "UPDATE paket SET 
                            nama = '$_POST[tnama]',
                            deskripsi = '$_POST[tdeskripsi]',
                            foto = '$fname'
                   WHERE id = '$_POST[id_paket]' ";
    }

    $ubah = mysqli_query($koneksi, $kueri);
    //jika ubah sukses
    if ($ubah) {
        echo "<script>
                alert('Ubah data sukses');
                document.location = 'index.php?page=paket';
              </script>";
    } else {
        echo "<script>
                alert('Ubah data gagal');
                document.location = 'index.php?page=paket';
              </script>";
    }
}
