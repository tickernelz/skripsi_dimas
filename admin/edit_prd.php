<?php
include ('../Koneksi.php');
$get_id = $_GET['id'];
$sql_periode = "select *, DATE_FORMAT(start_date, '%Y-%m-%dT%H:%i') AS cus_start_date, DATE_FORMAT(end_date, '%Y-%m-%dT%H:%i') AS cus_end_date from periode where id='$get_id'";
$query_periode = mysqli_query($koneksi, $sql_periode);
$data_periode = mysqli_fetch_assoc($query_periode);
$nama_prd = $data_periode['nama_prd'];
$tahun_prd = $data_periode['tahun'];
$start_prd = $data_periode['cus_start_date'];
$end_prd = $data_periode['cus_end_date'];
$stat_prd = $data_periode['stat'];
$sql_periode1 = "select * from periode where stat = 'on'";
$query_periode1 = mysqli_query($koneksi, $sql_periode1);
$data_periode1 = mysqli_fetch_assoc($query_periode1);


if (isset($_POST['submit'])) {
    $mulai = $_POST["mulai"];
    $akhir = $_POST["akhir"];
    $insertMulai = date('Y-m-d H:i:s', strtotime($mulai));
    $insertAkhir = date('Y-m-d H:i:s', strtotime($akhir));
    $nama = $_POST['nama'];
    $tahun = $_POST['tahun'];
    $status = $_POST['status'];

    if ($data_periode1['stat'] != $status) {
        $query_prd = mysqli_query($koneksi, "UPDATE periode SET nama_prd = '$nama', tahun = '$tahun', start_date = '$insertMulai', end_date = '$insertAkhir', stat = '$status' WHERE id = '$get_id';") or die(mysqli_error($koneksi));
        if ($query_prd) {
            echo '<script>alert("Berhasil Mengubah Data."); document.location="index.php?page=kelola_periode";</script>';
        } else {
            echo '<script>alert("Gagal Mengubah data.");</script>';
        }
    } else {
        echo '<script>alert("Status ON tidak boleh lebih dari satu");</script>';
    }
}
?>
}

<div style="text-align: center;">
    <span style="font-size: x-large; ">Edit User Dosen</span>
</div>
<hr>

<
<form action="" method="post">
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">Nama Periode</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="nama" class="form-control" placeholder="Contoh : Januari - Juli"
                   value="<?php echo $nama_prd; ?>">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">Tahun Periode</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="tahun" class="form-control" placeholder="Contoh : 2021"
                   value="<?php echo $tahun_prd; ?>">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">Tanggal Mulai
            Periode</label>
        <div class="col-md-6 col-sm-6">
            <input type="datetime-local" name="mulai" class="form-control" value="<?php echo $start_prd; ?>">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">Tanggal Akhir
            Periode</label>
        <div class="col-md-6 col-sm-6">
            <input type="datetime-local" name="akhir" class="form-control" value="<?php echo $end_prd; ?>">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">Status Periode</label>
        <div class="col-md-6 col-sm-6">
            <select name="status" class="form-control" required>
                <option value="on" <?php if ($stat_prd == "on") echo 'selected="selected"'; ?>> ON</option>
                <option value="off" <?php if ($stat_prd == "off") echo 'selected="selected"'; ?>> OFF</option>
            </select>
        </div>
    </div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
        </div>
</form>