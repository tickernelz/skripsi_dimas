<?php
include "config.php";

if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $pass = $_POST['nim'];
    $role = 'mahasiswa';

    $sql_user = "select * from user where username='$nim'";
    $query_user = mysqli_query($koneksi, $sql_user);
    $data_user = mysqli_fetch_assoc($query_user);

    if ($data_user['username'] != $nim) {
        $query_user = mysqli_query($koneksi, "INSERT INTO user (username,pass,role) VALUES ('$nim','$pass','$role') ON DUPLICATE KEY UPDATE username='$nim', pass='$pass', role='$role';") or die(mysqli_error($koneksi));
        $query_mhs = mysqli_query($koneksi, "INSERT INTO mahasiswa (NIM,Nama,role) VALUES ('$nim','$nama','$role') ON DUPLICATE KEY UPDATE NIM='$nim', Nama='$pass', role='$role';") or die(mysqli_error($koneksi));
        $query_berkas = mysqli_query($koneksi, "INSERT INTO upload_berkas (nim) VALUES ('$nim') ON DUPLICATE KEY UPDATE nim='$nim';") or die(mysqli_error($koneksi));
        $query_regis = mysqli_query($koneksi, "INSERT INTO registrasi (nim) VALUES ('$nim') ON DUPLICATE KEY UPDATE nim='$nim';") or die(mysqli_error($koneksi));
        $query_dp = mysqli_query($koneksi, "INSERT INTO dosen_pembimbing (nim_mhs) VALUES ('$nim') ON DUPLICATE KEY UPDATE nim_mhs='$nim';") or die(mysqli_error($koneksi));
        if($query_user && $query_mhs && $query_berkas && $query_regis && $query_dp){
            echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tambah_mhs";</script>';
        }
        else {
            echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
        }
    } else {
        echo '<script>alert("Data User Dengan NIM : '.$nim.' Sudah Ada!");</script>';
    }
}
?>

<div style="text-align: center;">
    <span style="font-size: x-large; ">Tambah User Mahasiswa</span>
</div>
<hr>

<form action="" method="post">
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">NIM</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="nim" class="form-control" placeholder="Contoh : 118063">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">Nama Mahasiswa</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="nama" class="form-control" placeholder="Contoh : Asep Supriadi">
        </div>
    </div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
        </div>
</form>