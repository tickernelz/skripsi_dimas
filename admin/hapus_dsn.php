<?php
include('config.php');

$nip = $_GET['nip'];

$del_dosen = mysqli_query($koneksi, "DELETE FROM user WHERE username='$nip'") or die(mysqli_error($koneksi));

if ($del_dosen) {
    echo '<script>alert("Berhasil menghapus data."); document.location="index.php?page=kelola_dsn";</script>';
} else {
    echo '<script>alert("Gagal menghapus data."); document.location="index.php?page=kelola_dsn";</script>';
}

?>
