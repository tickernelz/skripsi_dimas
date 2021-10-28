<?php
include('config.php');

$nim_p = $_GET['nim'];
$jns_dsn = $_GET['dsn'];
$id_dosen = $_SESSION['id_dosen'];
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
$sql_nilai_pro = "select * from nilai_proposal where nim='$nim_p'";
$query_nilai_pro = mysqli_query($koneksi, $sql_nilai_pro);
$data_nilai_pro = mysqli_fetch_assoc($query_nilai_pro);
$id_nilai_pro = $data_nilai_pro['id'];
$hasil_prop3 = $data_pro3['nilai_hsl'];

$dp1_hasil_nilai1 = $_POST['dp1_hasil_nilai1'];
$dp1_hasil_nilai2 = $_POST['dp1_hasil_nilai2'];
$dp1_hasil_nilai3 = $_POST['dp1_hasil_nilai3'];
$dp1_hasil_nilai4 = $_POST['dp1_hasil_nilai4'];
$dp1_hasil_total = $_POST['dp1_hasil_total'];
$dp1_keterangan = $_POST['dp1_keterangan'];

$dpen1_hasil_nilai1 = $_POST['dpen1_hasil_nilai1'];
$dpen1_hasil_nilai2 = $_POST['dpen1_hasil_nilai2'];
$dpen1_hasil_nilai3 = $_POST['dpen1_hasil_nilai3'];
$dpen1_hasil_nilai4 = $_POST['dpen1_hasil_nilai4'];
$dpen1_hasil_total = $_POST['dpen1_hasil_total'];
$dpen1_keterangan = $_POST['dpen1_keterangan'];

$dpen2_hasil_nilai1 = $_POST['dpen2_hasil_nilai1'];
$dpen2_hasil_nilai2 = $_POST['dpen2_hasil_nilai2'];
$dpen2_hasil_nilai3 = $_POST['dpen2_hasil_nilai3'];
$dpen2_hasil_nilai4 = $_POST['dpen2_hasil_nilai4'];
$dpen2_hasil_total = $_POST['dpen2_hasil_total'];
$dpen2_keterangan = $_POST['dpen2_keterangan'];

$dpen3_hasil_nilai1 = $_POST['dpen3_hasil_nilai1'];
$dpen3_hasil_nilai2 = $_POST['dpen3_hasil_nilai2'];
$dpen3_hasil_nilai3 = $_POST['dpen3_hasil_nilai3'];
$dpen3_hasil_nilai4 = $_POST['dpen3_hasil_nilai4'];
$dpen3_hasil_total = $_POST['dpen3_hasil_total'];
$dpen3_keterangan = $_POST['dpen3_keterangan'];

if ($jns_dsn === 'dp1') {
    $query_nilai1 = mysqli_query($koneksi, "INSERT INTO proposal (id, nim, nilai1, nilai2, nilai3, nilai4, nilai_hsl, ket) VALUES ('$id_prop','$nim_p','$dp1_hasil_nilai1', '$dp1_hasil_nilai2', '$dp1_hasil_nilai3', '$dp1_hasil_nilai4', '$dp1_hasil_total','$dp1_keterangan') ON DUPLICATE KEY UPDATE nilai1='$dp1_hasil_nilai1', nilai2='$dp1_hasil_nilai2', nilai3='$dp1_hasil_nilai3', nilai4='$dp1_hasil_nilai4', nilai_hsl='$dp1_hasil_total', ket='$dp1_keterangan', nim = '$nim_p';") or die(mysqli_error($koneksi));
    $query_hsl_nilai1 = mysqli_query($koneksi, "INSERT INTO nilai_proposal (id, id_proposal, nim, dpem1) VALUES ('$id_nilai_pro','$id_prop','$nim_p','$dp1_hasil_total') ON DUPLICATE KEY UPDATE id_proposal = '$id_prop', nim = '$nim_p', dpem1 = '$dp1_hasil_total';") or die(mysqli_error($koneksi));
    $sql_nilai1 = "select * from nilai_proposal where nim='$nim_p'";
    $query_nilai1 = mysqli_query($koneksi, $sql_nilai1);
    $data_nilai1 = mysqli_fetch_assoc($query_nilai1);
    $hasil_nilai1_dpem1 = $data_nilai1['dpem1'];
    $hasil_nilai1_dpen1 = $data_nilai1['dpen1'];
    $hasil_nilai1_dpen2 = $data_nilai1['dpen2'];
    $hasil_nilai1_dpen3 = $data_nilai1['dpen3'];
    $avg = (($hasil_nilai1_dpem1 + $hasil_nilai1_dpen1 + $hasil_nilai1_dpen2 + $hasil_nilai1_dpen3) / 4);
    $query_hsl_nilai_dp1 = mysqli_query($koneksi, "INSERT INTO nilai_proposal (id,avg) VALUES ('$id_nilai_pro','$avg') ON DUPLICATE KEY UPDATE avg = '$avg';") or die(mysqli_error($koneksi));
    if ($query_nilai1 && $query_hsl_nilai1) {
        echo '<script>alert("Berhasil Menyimpan Data."); document.location="index.php?page=detail_proposal&dsn=' . $jns_dsn . '&nim=' . $nim_p . '";</script>';
    } else {
        echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
    }
} elseif ($jns_dsn === 'dpen1') {
    $query_nilai2 = mysqli_query($koneksi, "INSERT INTO proposal_dpen1 (id, nim, nilai1, nilai2, nilai3, nilai4, nilai_hsl, ket) VALUES ('$id_prop1','$nim_p','$dpen1_hasil_nilai1', '$dpen1_hasil_nilai2', '$dpen1_hasil_nilai3', '$dpen1_hasil_nilai4', '$dpen1_hasil_total','$dpen1_keterangan') ON DUPLICATE KEY UPDATE nilai1='$dpen1_hasil_nilai1', nilai2='$dpen1_hasil_nilai2', nilai3='$dpen1_hasil_nilai3', nilai4='$dpen1_hasil_nilai4', nilai_hsl='$dpen1_hasil_total', ket='$dpen1_keterangan', nim = '$nim_p';") or die(mysqli_error($koneksi));
    $query_hsl_nilai2 = mysqli_query($koneksi, "INSERT INTO nilai_proposal (id, id_proposal, nim, dpen1) VALUES ('$id_nilai_pro','$id_prop1','$nim_p','$dpen1_hasil_total') ON DUPLICATE KEY UPDATE id_proposal = '$id_prop', nim = '$nim_p', dpen1 = '$dpen1_hasil_total';") or die(mysqli_error($koneksi));
    $sql_nilai1 = "select * from nilai_proposal where nim='$nim_p'";
    $query_nilai1 = mysqli_query($koneksi, $sql_nilai1);
    $data_nilai1 = mysqli_fetch_assoc($query_nilai1);
    $hasil_nilai1_dpem1 = $data_nilai1['dpem1'];
    $hasil_nilai1_dpen1 = $data_nilai1['dpen1'];
    $hasil_nilai1_dpen2 = $data_nilai1['dpen2'];
    $hasil_nilai1_dpen3 = $data_nilai1['dpen3'];
    $avg = (($hasil_nilai1_dpem1 + $hasil_nilai1_dpen1 + $hasil_nilai1_dpen2 + $hasil_nilai1_dpen3) / 4);
    $query_hsl_nilai_dp1 = mysqli_query($koneksi, "INSERT INTO nilai_proposal (id,avg) VALUES ('$id_nilai_pro','$avg') ON DUPLICATE KEY UPDATE avg = '$avg';") or die(mysqli_error($koneksi));
    if ($query_nilai2) {
        echo '<script>alert("Berhasil Menyimpan Data."); document.location="index.php?page=detail_proposal&dsn=' . $jns_dsn . '&nim=' . $nim_p . '";</script>';
    } else {
        echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
    }
} elseif ($jns_dsn === 'dpen2') {
    $query_nilai3 = mysqli_query($koneksi, "INSERT INTO proposal_dpen2 (id, nim, nilai1, nilai2, nilai3, nilai4, nilai_hsl, ket) VALUES ('$id_prop2','$nim_p','$dpen2_hasil_nilai1', '$dpen2_hasil_nilai2', '$dpen2_hasil_nilai3', '$dpen2_hasil_nilai4', '$dpen2_hasil_total','$dpen2_keterangan') ON DUPLICATE KEY UPDATE nilai1='$dpen2_hasil_nilai1', nilai2='$dpen2_hasil_nilai2', nilai3='$dpen2_hasil_nilai3', nilai4='$dpen2_hasil_nilai4', nilai_hsl='$dpen2_hasil_total', ket='$dpen2_keterangan', nim = '$nim_p';") or die(mysqli_error($koneksi));
    $query_hsl_nilai3 = mysqli_query($koneksi, "INSERT INTO nilai_proposal (id, id_proposal, nim, dpen2) VALUES ('$id_nilai_pro','$id_prop2','$nim_p','$dpen2_hasil_total') ON DUPLICATE KEY UPDATE id_proposal = '$id_prop', nim = '$nim_p', dpen2 = '$dpen2_hasil_total';") or die(mysqli_error($koneksi));
    $sql_nilai1 = "select * from nilai_proposal where nim='$nim_p'";
    $query_nilai1 = mysqli_query($koneksi, $sql_nilai1);
    $data_nilai1 = mysqli_fetch_assoc($query_nilai1);
    $hasil_nilai1_dpem1 = $data_nilai1['dpem1'];
    $hasil_nilai1_dpen1 = $data_nilai1['dpen1'];
    $hasil_nilai1_dpen2 = $data_nilai1['dpen2'];
    $hasil_nilai1_dpen3 = $data_nilai1['dpen3'];
    $avg = (($hasil_nilai1_dpem1 + $hasil_nilai1_dpen1 + $hasil_nilai1_dpen2 + $hasil_nilai1_dpen3) / 4);
    $query_hsl_nilai_dp1 = mysqli_query($koneksi, "INSERT INTO nilai_proposal (id,avg) VALUES ('$id_nilai_pro','$avg') ON DUPLICATE KEY UPDATE avg = '$avg';") or die(mysqli_error($koneksi));
    if ($query_nilai3) {
        echo '<script>alert("Berhasil Menyimpan Data."); document.location="index.php?page=detail_proposal&dsn=' . $jns_dsn . '&nim=' . $nim_p . '";</script>';
    } else {
        echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
    }
} elseif ($jns_dsn === 'dpen3') {
    $query_nilai4 = mysqli_query($koneksi, "INSERT INTO proposal_dpen3 (id, nim, nilai1, nilai2, nilai3, nilai4, nilai_hsl, ket) VALUES ('$id_prop3','$nim_p','$dpen3_hasil_nilai1', '$dpen3_hasil_nilai2', '$dpen3_hasil_nilai3', '$dpen3_hasil_nilai4', '$dpen3_hasil_total','$dpen3_keterangan') ON DUPLICATE KEY UPDATE nilai1='$dpen3_hasil_nilai1', nilai2='$dpen3_hasil_nilai2', nilai3='$dpen3_hasil_nilai3', nilai4='$dpen3_hasil_nilai4', nilai_hsl='$dpen3_hasil_total', ket='$dpen3_keterangan', nim = '$nim_p';") or die(mysqli_error($koneksi));
    $query_hsl_nilai4 = mysqli_query($koneksi, "INSERT INTO nilai_proposal (id, id_proposal, nim, dpen3) VALUES ('$id_nilai_pro','$id_prop3','$nim_p','$dpen3_hasil_total') ON DUPLICATE KEY UPDATE id_proposal = '$id_prop', nim = '$nim_p', dpen3 = '$dpen3_hasil_total';") or die(mysqli_error($koneksi));
    $sql_nilai1 = "select * from nilai_proposal where nim='$nim_p'";
    $query_nilai1 = mysqli_query($koneksi, $sql_nilai1);
    $data_nilai1 = mysqli_fetch_assoc($query_nilai1);
    $hasil_nilai1_dpem1 = $data_nilai1['dpem1'];
    $hasil_nilai1_dpen1 = $data_nilai1['dpen1'];
    $hasil_nilai1_dpen2 = $data_nilai1['dpen2'];
    $hasil_nilai1_dpen3 = $data_nilai1['dpen3'];
    $avg = (($hasil_nilai1_dpem1 + $hasil_nilai1_dpen1 + $hasil_nilai1_dpen2 + $hasil_nilai1_dpen3) / 4);
    $query_hsl_nilai_dp1 = mysqli_query($koneksi, "INSERT INTO nilai_proposal (id,avg) VALUES ('$id_nilai_pro','$avg') ON DUPLICATE KEY UPDATE avg = '$avg';") or die(mysqli_error($koneksi));
    if ($query_nilai4) {
        echo '<script>alert("Berhasil Menyimpan Data."); document.location="index.php?page=detail_proposal&dsn=' . $jns_dsn . '&nim=' . $nim_p . '";</script>';
    } else {
        echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
    }
}
?>

