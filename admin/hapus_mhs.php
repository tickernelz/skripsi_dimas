<?php
include('config.php');

$nim = $_GET['nim'];

$del_user = mysqli_query($koneksi, "DELETE FROM user WHERE username='$nim'") or die(mysqli_error($koneksi));

if ($del_user) {
    echo '<script>alert("Berhasil menghapus data."); document.location="index.php?page=kelola_mhs";</script>';
} else {
    echo '<script>alert("Gagal menghapus data."); document.location="index.php?page=kelola_mhs";</script>';
}

?>
