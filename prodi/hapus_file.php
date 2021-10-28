<?php
include('config.php');
$files = $_GET['files'];
//berita Acara
$dirsk = 'berita_acara';
$folder = '../file/' . $dirsk;
$file = $folder . '/' . 'berita_acara.pdf';
//Jadwal
$dirjd = 'jadwal';
$folderjd = '../file/' . $dirjd;
$filejd = $folderjd . '/' . 'jadwal.pdf';
if ($files == 'berita'){
$hapus = unlink($file);
if ($hapus) {
    echo '<script>alert("Berhasil menghapus data."); document.location="index.php?page=upload_jadwal";</script>';
} else {
    echo '<script>alert("Gagal menghapus data."); document.location="index.php?page=upload_jadwal";</script>';
}
}
elseif ($files == 'jadwal'){
    $hapus = unlink($filejd);
    if ($hapus) {
        echo '<script>alert("Berhasil menghapus data."); document.location="index.php?page=upload_jadwal";</script>';
    } else {
        echo '<script>alert("Gagal menghapus data."); document.location="index.php?page=upload_jadwal";</script>';
    }
}
?>
