<?php
include "config.php";

if (isset($_POST['submit'])) {
    $mulai = $_POST["mulai"];
    $akhir = $_POST["akhir"];
    $insertMulai = date('Y-m-d H:i:s', strtotime($mulai));
    $insertAkhir = date('Y-m-d H:i:s', strtotime($akhir));
    $nama = $_POST['nama'];
    $tahun = $_POST['tahun'];
    $status = $_POST['status'];

    $sql_periode = "select * from periode where nama_prd='$nama' and tahun='$tahun'";
    $query_periode = mysqli_query($koneksi, $sql_periode);
    $data_periode = mysqli_fetch_assoc($query_periode);
    $sql_periode1 = "select * from periode where stat = 'on'";
    $query_periode1 = mysqli_query($koneksi, $sql_periode1);
    $data_periode1 = mysqli_fetch_assoc($query_periode1);


    if ($data_periode1['stat'] != $status){
        if ($data_periode['nama_prd'] != $nama && $data_periode['tahun'] != $tahun) {
            $query_prd = mysqli_query($koneksi, "INSERT INTO periode (nama_prd,tahun,start_date,end_date,stat) VALUES ('$nama','$tahun','$insertMulai','$insertAkhir','$status') ON DUPLICATE KEY UPDATE nama_prd='$nama', tahun='$tahun', start_date='$insertMulai', end_date='$insertAkhir', stat='$status';") or die(mysqli_error($koneksi));
            if ($query_prd) {
                echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tambah_periode";</script>';
            } else {
                echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
            }
        } else {
            echo '<script>alert("Data Periode Dengan Nama  : '.$nama.' Dan Tahun : '.$tahun.' Sudah Ada!");</script>';
        }
    } else {
        echo '<script>alert("Status ON tidak boleh lebih dari satu");</script>';
    }
}
?>

<div style="text-align: center;">
    <span style="font-size: x-large; ">Tambah Periode</span>
</div>
<hr>

<form action="" method="post">
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">Nama Periode</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="nama" class="form-control" placeholder="Contoh : Januari - Juli">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">Tahun Periode</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="tahun" class="form-control" placeholder="Contoh : 2021">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">Tanggal Mulai
            Periode</label>
        <div class="col-md-6 col-sm-6">
            <input type="datetime-local" name="mulai" class="form-control">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">Tanggal Akhir
            Periode</label>
        <div class="col-md-6 col-sm-6">
            <input type="datetime-local" name="akhir" class="form-control">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">Status Periode</label>
        <div class="col-md-6 col-sm-6">
            <select name="status" class="form-control" required>
                <option value="on"> ON</option>
                <option value="off"> OFF</option>
            </select>
        </div>
    </div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
        </div>
</form>