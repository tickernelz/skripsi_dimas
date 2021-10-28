<?php
include ('../Koneksi.php');
$get_nip = $_GET['nip'];
#dosen
$sql_dosen = "select * from dosen where nip='$get_nip'";
$query_dosen = mysqli_query($koneksi, $sql_dosen);
$data_dosen = mysqli_fetch_assoc($query_dosen);
$data_nip_show = $data_dosen['nip'];
$data_ndosen_show = $data_dosen['nama_dosen'];
$data_alamat_show = $data_dosen['alamat'];
$data_telp_show = $data_dosen['telp'];

if (isset($_POST['submit'])) {
    $nip = $_POST['nip'];
    $nama_dosen = $_POST['nama_dosen'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];

    $query_dosen = mysqli_query($koneksi, "UPDATE dosen SET nip = '$nip', nama_dosen = '$nama_dosen', alamat = '$alamat', telp = '$telp' WHERE nip = '$nip';") or die(mysqli_error($koneksi));
    if ($query_dosen) {
        echo '<script>alert("Berhasil Mengubah Data."); document.location="index.php?page=kelola_dsn";</script>';
    } else {
        echo '<script>alert("Gagal Mengubah data.");</script>';
    }
}
?>

<div style="text-align: center;">
    <span style="font-size: x-large; ">Edit User Dosen</span>
</div>
<hr>

<<form action="" method="post">
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">NIP</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="nip" class="form-control" placeholder="Contoh : 197512122003121003"
                   value="<?php echo $data_nip_show; ?>">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">Nama Dosen</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="nama_dosen" class="form-control" placeholder="Contoh : Asep Supriadi"
                   value="<?php echo $data_ndosen_show; ?>">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">Alamat</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="alamat" class="form-control" value="<?php echo $data_alamat_show; ?>">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">No Telpon</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="telp" class="form-control" value="<?php echo $data_telp_show; ?>">
        </div>
    </div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
        </div>

</form>