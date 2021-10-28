<?php
include('config.php');

$jns_dsn = $_GET['dsn'];
$nim_p = $_GET['nim'];
$cmnt = $_POST['pesan'];
$id_dosen =  $_SESSION['id_dosen'];
$nama_dosen = $_SESSION['nama'];


$sql_pro = "select * from proposal where nim='$nim_p'";
$query_pro = mysqli_query($koneksi, $sql_pro);
$data_pro = mysqli_fetch_assoc($query_pro);
$id_prop = $data_pro['id'];
$hasil_prop = $data_pro['nilai_hsl'];
$sql_pro1 = "select * from proposal_dpen1 where nim='$nim_p'";
$query_pro1 = mysqli_query($koneksi, $sql_pro1);
$data_pro1 = mysqli_fetch_assoc($query_pro1);
$id_prop1 = $data_pro1['id'];
$hasil_prop1 = $data_pro1['nilai_hsl'];
$sql_pro2 = "select * from proposal_dpen2 where nim='$nim_p'";
$query_pro2 = mysqli_query($koneksi, $sql_pro2);
$data_pro2 = mysqli_fetch_assoc($query_pro2);
$id_prop2 = $data_pro2['id'];
$hasil_prop2 = $data_pro2['nilai_hsl'];
$sql_pro3 = "select * from proposal_dpen3 where nim='$nim_p'";
$query_pro3 = mysqli_query($koneksi, $sql_pro3);
$data_pro3 = mysqli_fetch_assoc($query_pro3);
$id_prop3 = $data_pro3['id'];
$hasil_prop3 = $data_pro3['nilai_hsl'];

$sql_cmnt = mysqli_query($koneksi, "UPDATE proposal SET comment = '$cmnt' WHERE nim = '$nim' AND  id_dosen = '$id_dosen'") or die(mysqli_error($koneksi));



if ($jns_dsn === 'dp1'){
    $sql_cmnt = mysqli_query($koneksi, "INSERT INTO proposal (id, comment) VALUES ('$id_prop','$cmnt') ON DUPLICATE KEY UPDATE comment = '$cmnt';") or die(mysqli_error($koneksi));
    if ($sql_cmnt) {
        echo '<script>alert("Berhasil Menambahkan Komentar!."); document.location="index.php?page=detail_proposal&nim='.$nim_p.'";</script>';
    } else {
        echo '<script>alert("Gagal Menambahkan Komentar!."); document.location="index.php?page=detail_proposal&dsn='.$jns_dsn.'&nim='.$nim_p.'";</script>';
    }
} elseif ($jns_dsn === 'dpen1') {
    $sql_cmnt = mysqli_query($koneksi, "INSERT INTO proposal_dpen1 (id, comment) VALUES ('$id_prop1','$cmnt') ON DUPLICATE KEY UPDATE comment = '$cmnt';") or die(mysqli_error($koneksi));
    if ($sql_cmnt) {
        echo '<script>alert("Berhasil Menambahkan Komentar!."); document.location="index.php?page=detail_proposal&dsn='.$jns_dsn.'&nim='.$nim_p.'";</script>';
    } else {
        echo '<script>alert("Gagal Menambahkan Komentar!."); document.location="index.php?page=detail_proposal&dsn='.$jns_dsn.'&nim='.$nim_p.'";</script>';
    }
} elseif ($jns_dsn === 'dpen2') {
    $sql_cmnt = mysqli_query($koneksi, "INSERT INTO proposal_dpen2 (id, comment) VALUES ('$id_prop2','$cmnt') ON DUPLICATE KEY UPDATE comment = '$cmnt';") or die(mysqli_error($koneksi));
    if ($sql_cmnt) {
        echo '<script>alert("Berhasil Menambahkan Komentar!."); document.location="index.php?page=detail_proposal&dsn='.$jns_dsn.'&nim='.$nim_p.'";</script>';
    } else {
        echo '<script>alert("Gagal Menambahkan Komentar!."); document.location="index.php?page=detail_proposal&dsn='.$jns_dsn.'&nim='.$nim_p.'";</script>';
    }
} elseif ($jns_dsn === 'dpen3') {
    $sql_cmnt = mysqli_query($koneksi, "INSERT INTO proposal_dpen3 (id, comment) VALUES ('$id_prop3','$cmnt') ON DUPLICATE KEY UPDATE comment = '$cmnt';") or die(mysqli_error($koneksi));
    if ($sql_cmnt) {
        echo '<script>alert("Berhasil Menambahkan Komentar!."); document.location="index.php?page=detail_proposal&dsn='.$jns_dsn.'&nim='.$nim_p.'";</script>';
    } else {
        echo '<script>alert("Gagal Menambahkan Komentar!."); document.location="index.php?page=detail_proposal&dsn='.$jns_dsn.'&nim='.$nim_p.'";</script>';
    }
}
?>
