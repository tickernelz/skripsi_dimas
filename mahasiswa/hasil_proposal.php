<?php
include('config.php');
$sql_proposal = "select * from proposal where nim='$username'";
$query_proposal = mysqli_query($koneksi, $sql_proposal);
$data_proposal = mysqli_fetch_assoc($query_proposal);
$id_prop = $data_proposal['id'];
$username = $_SESSION['username'];
$nim_show = $data_mhs['NIM'];
$nama_show = $data_mhs['Nama'];
$id_mhs = $data_mhs['id'];
$judul_show = $data_regis['judul'];
$status_show = $data_regis['status'];
$id_regis = $data_regis['id'];
$dosen_pembimbing1_show = $data_dp['dosen_pembimbing1'];
$dosen_pembimbing2_show = $data_dp['dosen_pembimbing2']
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
<div style="text-align: center;">
    <span style="font-size: x-large; ">Data Registrasi</span>
</div>
<hr>
<form action="index.php?page=data_diri" method="post">
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">NIM</label>
        <div class="col-md-6 col-sm-6 ">
            <input disabled type="text" name="nim" class="form-control" size="4" value="<?php echo $nim_show; ?>">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Mahasiswa</label>
        <div class="col-md-6 col-sm-6">
            <input disabled type="text" name="Nama" class="form-control" value="<?php echo $nama_show; ?>" required>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Judul</label>
        <div class="col-md-6 col-sm-6">
            <input disabled type="text" name="judul" class="form-control" value="<?php echo $judul_show; ?>" required>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Dosen Pembimbing I</label>
        <div class="col-md-6 col-sm-6">
            <input disabled type="text" name="dpem1" class="form-control" size="4"
                   value="<?php echo $dosen_pembimbing1_show; ?>">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Dosen Pembimbing II</label>
        <div class="col-md-6 col-sm-6 ">
            <input disabled type="text" name="dpem2" id="dpem2" class="form-control" size="4"
                   value="<?php echo $dosen_pembimbing2_show; ?>">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Status Proposal</label>
        <div class="col-md-6 col-sm-6 ">
            <input disabled type="text" name="status" id="status" class="form-control" size="4"
        </div>
    </div>
</form>
<script>
    if($("#dpem2").val() === '-' || ''){
        $('#status').val('-');
    } else {
        $('#status').val('Lulus');
    }
</script>