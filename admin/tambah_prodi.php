<?php
include "config.php";

if (isset($_POST['submit'])) {
    $prodi = $_POST['prodi'];
    $pass = $_POST['pass'];
    $role = 'jurusan';

    $sql_prodi = "select * from user where username='$prodi'";
    $query_prodi = mysqli_query($koneksi, $sql_prodi);
    $data_prodi = mysqli_fetch_assoc($query_prodi);

    if ($data_prodi['username'] != $prodi) {
        $query_prodi = mysqli_query($koneksi, "INSERT INTO user (username,pass,role) VALUES ('$prodi','$pass','$role') ON DUPLICATE KEY UPDATE username='$prodi', pass='$pass', role='$role';") or die(mysqli_error($koneksi));
        if($query_prodi){
            echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tambah_prodi";</script>';
        }
        else {
            echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
        }
    } else {
        echo '<script>alert("Username : '.$user.' Sudah Terdaftar!");</script>';
    }
}
?>

<div style="text-align: center;">
    <span style="font-size: x-large; ">Tambah User Admin</span>
</div>
<hr>

<form action="" method="post">
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">Username</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="prodi" class="form-control" placeholder="Contoh : Prodi">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">Password</label>
        <div class="col-md-6 col-sm-6">
            <input type="password" name="pass" class="form-control" placeholder="Contoh : Prodi">
        </div>
    </div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
        </div>
</form>