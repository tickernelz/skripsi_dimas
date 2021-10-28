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
$tanggal_show = $data_regis['tanggal_regis'];
$id_regis = $data_regis['id'];
$dosen_pembimbing1_show = $data_dp['dosen_pembimbing1'];
$id_dp = $data_dp['id_dp'];
$dosen_penguji1_show = $data_dp['dpen1'];
$dosen_penguji2_show = $data_dp['dpen2'];
$dosen_penguji3_show = $data_dp['dpen3'];
$id_prd_regis = $data_regis['id_periode'];
$sql_periode = "select * from periode where id='$id_prd_regis'";
$query_periode = mysqli_query($koneksi, $sql_periode);
$data_periode = mysqli_fetch_assoc($query_periode);
$nama_prd = $data_periode['nama_prd'];
$thn_prd = $data_periode['tahun'];

?>
<div style="text-align: center;">
    <span style="font-size: x-large; ">Data Registrasi</span>
</div>
<hr>

<?php
if (isset($_POST['submit'])) {

    $nama = $_POST['Nama'];
    $judul = $_POST['judul'];
    $status = $_POST['status'];
    $dosen = $_POST['nama_dosen'];
    $dosen_explode = explode('|', $dosen);

    $sql = mysqli_query($koneksi, "INSERT INTO registrasi (id, nim, judul, status) VALUES ('$id_regis','$nim_show', '$judul', '$status') ON DUPLICATE KEY UPDATE nim='$nim_show', judul='$judul', status='$status';") or die(mysqli_error($koneksi));

    $sql_regis = "select * from registrasi where nim='$username'";
    $query_regis = mysqli_query($koneksi, $sql_regis);
    $data_regis = mysqli_fetch_assoc($query_regis);
    $id_regis = $data_regis['id'];

    $sql1 = mysqli_query($koneksi, "INSERT INTO dosen_pembimbing (id_dp, nim_mhs, id_regis, dosen_pembimbing1) VALUES ('$id_dp','$nim_show', '$id_regis', '$dosen_explode[0]') ON DUPLICATE KEY UPDATE nim_mhs='$nim_show', id_regis='$id_regis', dosen_pembimbing1='$dosen_explode[0]';") or die(mysqli_error($koneksi));

    $sql2 = mysqli_query($koneksi, "INSERT INTO mahasiswa (id,Nama) VALUES ('$id_mhs','$nama') ON DUPLICATE KEY UPDATE Nama='$nama';") or die(mysqli_error($koneksi));

    if ($tanggal_show == '0000-00-00 00:00:00') {
        $sql_tanggal = mysqli_query($koneksi, "UPDATE registrasi SET tanggal_regis = (now()) WHERE nim = '$nim_show';") or die(mysqli_error($koneksi));
    }

    $sql_regis1 = "select * from registrasi where nim='$username'";
    $query_regis1 = mysqli_query($koneksi, $sql_regis1);
    $data_regis1 = mysqli_fetch_assoc($query_regis1);
    $tanggal_show1 = $data_regis1['tanggal_regis'];
    $id_prd_regis = $data_regis1['id_periode'];
    $sql_periode = "select * from periode where stat='on'";
    $query_periode = mysqli_query($koneksi, $sql_periode);
    $data_periode = mysqli_fetch_assoc($query_periode);
    $id_periode = $data_periode['id'];
    $dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
    $dt_convert = $dt->format('Y-m-d H:i:s');

    if ($tanggal_show1 > $data_periode['start_date'] && $tanggal_show1 < $data_periode['end_date'] && empty($id_prd_regis)) {
        $sql_prd = mysqli_query($koneksi, "UPDATE registrasi SET id_periode = $id_periode WHERE nim = '$nim_show';") or die(mysqli_error($koneksi));
    }

    if ($status == 'Proposal') {
        $sql3 = mysqli_query($koneksi, "INSERT INTO proposal (id, nim, id_dosen, nama_dosen) VALUES ('$id_prop','$nim_show','$dosen_explode[1]','$dosen_explode[0]') ON DUPLICATE KEY UPDATE nim='$nim_show', id_dosen='$dosen_explode[1]', nama_dosen='$dosen_explode[0]';") or die(mysqli_error($koneksi));
    }

    if (($sql && $sql1 && $sql2) || $sql3) {
        echo '<script>alert("Berhasil Menyimpan Data."); document.location="index.php?page=data_diri";</script>';
    } else {
        echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
    }
}
?>

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
            <input type="text" name="Nama" class="form-control" value="<?php echo $nama_show; ?>" required>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Judul</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="judul" class="form-control" value="<?php echo $judul_show; ?>" required>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Dosen Pembimbing I</label>
        <div class="col-md-6 col-sm-6">
            <select name="nama_dosen" class="form-control" value="<?php echo $dosen_pembimbing1_show; ?>" required>
                <option>--DOSEN--</option>
                <?php
                $sql = mysqli_query($koneksi, "SELECT * from dosen");
                while ($isi = mysqli_fetch_array($sql)) {
                    $id_dosen = $isi['id_dosen'];
                    $nama_dosen = $isi['nama_dosen'];
                    ?>
                    <option value="<?php echo $nama_dosen; ?>|<?php echo $id_dosen; ?>" <?php if ($dosen_pembimbing1_show == $nama_dosen) echo 'selected="selected"'; ?>> <?php echo $nama_dosen ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Dosen Penguji I</label>
        <div class="col-md-6 col-sm-6 ">
            <input disabled type="text" name="nim" class="form-control" size="4"
                   value="<?php echo $dosen_penguji1_show; ?>">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Dosen Penguji II</label>
        <div class="col-md-6 col-sm-6 ">
            <input disabled type="text" name="nim" class="form-control" size="4"
                   value="<?php echo $dosen_penguji2_show; ?>">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Dosen Penguji III</label>
        <div class="col-md-6 col-sm-6 ">
            <input disabled type="text" name="nim" class="form-control" size="4"
                   value="<?php echo $dosen_penguji3_show; ?>">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
        <div class="col-md-6 col-sm-6">
            <select name="status" class="form-control" value="<?php echo $status_show; ?>" required>
                <option value="">status Skripsi</option>
                <option value="Proposal" <?php if ($status_show == "Proposal") echo 'selected="selected"'; ?>>Proposal
                </option>
                <option value="Hasil" <?php if ($status_show == "Hasil") echo 'selected="selected"'; ?>>Hasil</option>
                <option value="Akhir" <?php if ($status_show == "Akhir") echo 'selected="selected"'; ?>>Akhir</option>
            </select>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Registrasi</label>
        <div class="col-md-6 col-sm-6 ">
            <input disabled type="text" name="tgl" class="form-control" size="4" value="<?php echo $tanggal_show; ?>">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Periode</label>
        <div class="col-md-6 col-sm-6 ">
            <input disabled type="text" name="periode" class="form-control" size="4"
                   value="<?php echo $nama_prd;?> (<?php echo $thn_prd;?>)">
        </div>
    </div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
            <!--a href="index.php?page=Data_diri" class="btn btn-warning">Detail Data</a-->
        </div>
</form>