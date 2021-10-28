<?php
include('config.php');

$nim = $_GET['nim'];
$cmnt = $_POST['pesan'];

$sql_cmnt = mysqli_query($koneksi, "UPDATE nilai_berkas SET comen = '$cmnt' WHERE nim = '$nim'") or die(mysqli_error($koneksi));

if ($sql_cmnt) {
    echo '<script>alert("Berhasil Menambahkan Komentar!."); document.location="index.php?page=detail_berkas&nim='.$nim.'";</script>';
} else {
    echo '<script>alert("Gagal Menambahkan Komentar!."); document.location="index.php?page=detail_berkas&nim='.$nim.'";</script>';
}
