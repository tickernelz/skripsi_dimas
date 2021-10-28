<?php
include ('../Koneksi.php');
$username = $_SESSION['username'];
$password = $_SESSION['password'];
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
# Proposal
$sql_pro = "select * from proposal where nim='$username'";
$query_pro = mysqli_query($koneksi, $sql_pro);
$data_pro = mysqli_fetch_assoc($query_pro);
# Dosen
$sql_dosen = "select * from dosen where nip='$username'";
$query_dosen = mysqli_query($koneksi, $sql_dosen);
$data_dosen = mysqli_fetch_assoc($query_dosen);
//cek jika koneksi ke mysql gagal, maka akan tampil pesan berikut
if (mysqli_connect_errno()) {
	echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
}
