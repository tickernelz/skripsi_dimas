<?php
include "config.php";

if (isset($_POST['submit'])) {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $pass = $_POST['nip'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $role = 'dosen';

    $sql_user = "select * from user where username='$nip'";
    $query_user = mysqli_query($koneksi, $sql_user);
    $data_user = mysqli_fetch_assoc($query_user);

    if ($data_user['username'] != $nip) {
        $query_user = mysqli_query($koneksi, "INSERT INTO user (username,pass,role) VALUES ('$nip','$pass','$role') ON DUPLICATE KEY UPDATE username='$nip', pass='$pass', role='$role';") or die(mysqli_error($koneksi));
        $query_dosen = mysqli_query($koneksi, "INSERT INTO dosen (nip,nama_dosen,alamat,telp) VALUES ('$nip','$nama','$alamat','$telp') ON DUPLICATE KEY UPDATE nip='$nip', nama_dosen='$nama', alamat = '$alamat', telp ='$telp';") or die(mysqli_error($koneksi));
        if($query_user && $query_dosen){
            echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tambah_dsn";</script>';
        }
        else {
            echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
        }
    } else {
        echo '<script>alert("Data User Dengan NIP : '.$nip.' Sudah Ada!");</script>';
    }
}
?>

<div style="text-align: center;">
    <span style="font-size: x-large; ">Tambah User Dosen</span>
</div>
<hr>

<form action="" method="post">
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">NIP</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="nip" class="form-control" placeholder="Contoh : 193305054989032002">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">Nama Dosen</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="nama" class="form-control" placeholder="Contoh : Asep Supriadi">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">Alamat</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="alamat" class="form-control">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">No. Telpon</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="telp" class="form-control">
        </div>
    </div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
        </div>
</form>