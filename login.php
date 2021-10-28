<?php
session_start();
include('Koneksi.php');
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    # Login
    $sql_login = "select * from user where username='$username'";
    $query_login = mysqli_query($koneksi, $sql_login);
    $data_login = mysqli_fetch_assoc($query_login);
    # Registrasi
    $sql_regis = "select * from registrasi where nim='$username'";
    $query_regis = mysqli_query($koneksi, $sql_regis);
    $data_regis = mysqli_fetch_assoc($query_regis);
    # Dosen Pembimbing
    $sql_dp = "select * from dosen_pembimbing where nim_mhs='$username'";
    $query_dp = mysqli_query($koneksi, $sql_dp);
    $data_dp = mysqli_fetch_assoc($query_dp);
    # mahasiswa
    $sql_mhs = "select * from mahasiswa where nim='$username'";
    $sql_berkas = "select * from upload_berkas where nim='$username'";
    $query_mhs = mysqli_query($koneksi, $sql_mhs);
    $query_berkas = mysqli_query($koneksi, $sql_berkas);
    $data_mhs = mysqli_fetch_assoc($query_mhs);
    $data_berkas = mysqli_fetch_assoc($query_berkas);
    # Dosen
    $sql_dosen = "select * from dosen where nip='$username'";
    $query_dosen = mysqli_query($koneksi, $sql_dosen);
    $data_dosen = mysqli_fetch_assoc($query_dosen);
    #Date
    $sql_periode = "select * from periode where stat='on'";
    $query_periode = mysqli_query($koneksi, $sql_periode);
    $data_periode = mysqli_fetch_assoc($query_periode);
    $dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
    $dt_convert = $dt->format('Y-m-d H:i:s');
    if ($data_login['role'] == 'mahasiswa' && $data_login['pass'] == $password) {
        if ($data_periode['stat'] == 'on' && ($dt_convert > $data_periode['start_date']) && ($dt_convert < $data_periode['end_date'])) {
            $_SESSION['role'] = 'mahasiswa';
            $_SESSION['username'] = $data_login['username'];
            $_SESSION['NIM'] = $data_mhs['NIM'];
            $_SESSION['Nama'] = $data_mhs['Nama'];
            $_SESSION['id_dosen'] = $data_dosen['id_dosen'];
            header('location:mahasiswa');
        } else header("location:index.php?pesan=periode");
    } else if ($data_login['role'] == 'dosen' && $data_login['pass'] == $password) {
        $_SESSION['role'] = 'dosen';
        $_SESSION['username'] = $data_login['username'];
        $_SESSION['nip'] = $data_dosen['nip'];
        $_SESSION['id_dosen'] = $data_dosen['id_dosen'];
        $_SESSION['nama'] = $data_dosen['nama_dosen'];
        header('location:dosen');
    } else if ($data_login['role'] == 'admin' && $data_login['pass'] == $password) {
        $_SESSION['role'] = 'admin';
        $_SESSION['id'] = $data_login['id'];
        $_SESSION['username'] = $data_login['username'];
        header('location:admin');
    } else if ($data_login['role'] == 'jurusan' && $data_login['pass'] == $password) {
        $_SESSION['role'] = 'jurusan';
        $_SESSION['username'] = $data_login['username'];
        header('location:prodi');
    } else {
        // header("location:index.php?pesan=gagal&$password");
        header("location:index.php?pesan=gagal&salah=");
    }
}
?>
<!--end-->