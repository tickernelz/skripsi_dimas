<?php
include('config.php');

$id = $_GET['id'];

$del_prd = mysqli_query($koneksi, "DELETE FROM periode WHERE id='$id'") or die(mysqli_error($koneksi));

if ($del_prd) {
    echo '<script>alert("Berhasil menghapus data."); document.location="index.php?page=kelola_periode";</script>';
} else {
    echo '<script>alert("Gagal menghapus data."); document.location="index.php?page=kelola_periode";</script>';
}

?>
