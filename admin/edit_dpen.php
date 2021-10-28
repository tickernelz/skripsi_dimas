<?php
include ('../Koneksi.php');
$get_nim = $_GET['nim'];
# Registrasi
$sql_regis = "select * from registrasi where nim='$get_nim'";
$query_regis = mysqli_query($koneksi, $sql_regis);
$data_regis = mysqli_fetch_assoc($query_regis);
$status_show = $data_regis['status'];
$judul_show = $data_regis['judul'];
# Mahasiswa
$sql_mhs = "select * from mahasiswa where nim='$get_nim'";
$query_mhs = mysqli_query($koneksi, $sql_mhs);
$data_mhs = mysqli_fetch_assoc($query_mhs);
$nim_show = $data_mhs['NIM'];
$nama_show = $data_mhs['Nama'];
# Dosen Pembimbing
$sql_dp = "select * from dosen_pembimbing where nim_mhs='$get_nim'";
$query_dp = mysqli_query($koneksi, $sql_dp);
$data_dp = mysqli_fetch_assoc($query_dp);
$dosen_pembimbing1_show = $data_dp['dosen_pembimbing1'];
$dosen_penguji1_show  = $data_dp['dpen1'];
$dosen_penguji2_show = $data_dp['dpen2'];
$dosen_penguji3_show = $data_dp['dpen3'];
# DP1
$sql_dp1 = "select * from proposal where nim='$get_nim'";
$query_dp1 = mysqli_query($koneksi, $sql_dp1);
$data_dp1 = mysqli_fetch_assoc($query_dp1);
$id_dp1 = $data_dp1['id'];
# DPen1
$sql_dpen1 = "select * from proposal_dpen1 where nim='$get_nim'";
$query_dpen1 = mysqli_query($koneksi, $sql_dpen1);
$data_dpen1 = mysqli_fetch_assoc($query_dpen1);
$id_dpen1 = $data_dpen1['id'];
# DPen2
$sql_dpen2 = "select * from proposal_dpen2 where nim='$get_nim'";
$query_dpen2 = mysqli_query($koneksi, $sql_dpen2);
$data_dpen2 = mysqli_fetch_assoc($query_dpen2);
$id_dpen2 = $data_dpen2['id'];
# DPen3
$sql_dpen3 = "select * from proposal_dpen3 where nim='$get_nim'";
$query_dpen3 = mysqli_query($koneksi, $sql_dpen3);
$data_dpen3 = mysqli_fetch_assoc($query_dpen3);
$id_dpen3 = $data_dpen3['id'];

if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $status = $_POST['status'];
    $judul = $_POST['judul'];
    $dp1 = $_POST['dp1'];
    $dp1_explode = explode('|', $dp1);
    $dpenguji1 = $_POST['dpen1'];
    $dpenguji1_explode = explode('|', $dpenguji1);
    $dpenguji2 = $_POST['dpen2'];
    $dpenguji2_explode = explode('|', $dpenguji2);
    $dpenguji3 = $_POST['dpen3'];
    $dpenguji3_explode = explode('|', $dpenguji3);

    $query_mhs = mysqli_query($koneksi, "UPDATE mahasiswa SET NIM = '$nim', Nama = '$nama' WHERE NIM = '$nim';") or die(mysqli_error($koneksi));
    $query_regis = mysqli_query($koneksi, "UPDATE registrasi SET status = '$status', judul = '$judul' WHERE nim = '$nim';") or die(mysqli_error($koneksi));
    $query_dp = mysqli_query($koneksi, "UPDATE dosen_pembimbing SET dosen_pembimbing1 = '$dp1_explode[0]', dpen1 = '$dpenguji1_explode[0]', dpen2 = '$dpenguji2_explode[0]', dpen3 = '$dpenguji3_explode[0]' WHERE nim_mhs = '$nim';") or die(mysqli_error($koneksi));
    $q_dp1 = mysqli_query($koneksi, "INSERT INTO proposal (id, nim, id_dosen, nama_dosen) VALUES ('$id_dp1','$nim','$dp1_explode[1]','$dp1_explode[0]') ON DUPLICATE KEY UPDATE nim='$nim', id_dosen='$dp1_explode[1]', nama_dosen='$dp1_explode[0]';") or die(mysqli_error($koneksi));
    $q_dpenguji1 = mysqli_query($koneksi, "INSERT INTO proposal_dpen1 (id, nim, id_dosen, nama_dosen) VALUES ('$id_dpen1','$nim','$dpenguji1_explode[1]','$dpenguji1_explode[0]') ON DUPLICATE KEY UPDATE nim='$nim', id_dosen='$dpenguji1_explode[1]', nama_dosen='$dpenguji1_explode[0]';") or die(mysqli_error($koneksi));
    $q_dpenguji2 = mysqli_query($koneksi, "INSERT INTO proposal_dpen2 (id, nim, id_dosen, nama_dosen) VALUES ('$id_dpen2','$nim','$dpenguji2_explode[1]','$dpenguji2_explode[0]') ON DUPLICATE KEY UPDATE nim='$nim', id_dosen='$dpenguji2_explode[1]', nama_dosen='$dpenguji2_explode[0]';") or die(mysqli_error($koneksi));
    $q_dpenguji3 = mysqli_query($koneksi, "INSERT INTO proposal_dpen3 (id, nim, id_dosen, nama_dosen) VALUES ('$id_dpen3','$nim','$dpenguji3_explode[1]','$dpenguji3_explode[0]') ON DUPLICATE KEY UPDATE nim='$nim', id_dosen='$dpenguji3_explode[1]', nama_dosen='$dpenguji3_explode[0]';") or die(mysqli_error($koneksi));

    if ($query_mhs && $query_regis && $query_dp) {
        echo '<script>alert("Berhasil Mengubah Data."); document.location="index.php?page=kelola_dpen";</script>';
    } else {
        echo '<script>alert("Gagal Mengubah data.");</script>';
    }
}
?>

<div style="text-align: center;">
    <span style="font-size: x-large; ">Edit User Mahasiswa</span>
</div>
<hr>

<form action="" method="post">
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">NIM</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="nim" class="form-control" placeholder="Contoh : 118043"
                   value="<?php echo $nim_show; ?>">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">Nama Mahasiswa</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="nama" class="form-control" placeholder="Contoh : Asep Supriadi"
                   value="<?php echo $nama_show; ?>">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">Status</label>
        <div class="col-md-6 col-sm-6">
            <select name="status" class="form-control" required>
                <option value="-">-</option>
                <option value="Proposal" <?php if ($status_show == "Proposal") echo 'selected="selected"'; ?>>Proposal
                </option>
                <option value="Hasil" <?php if ($status_show == "Hasil") echo 'selected="selected"'; ?>>Hasil</option>
                <option value="Akhir" <?php if ($status_show == "Akhir") echo 'selected="selected"'; ?>>Akhir</option>
            </select>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">Judul</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="judul" class="form-control" value="<?php echo $judul_show; ?>">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">Dosen Pembimbing I</label>
        <div class="col-md-6 col-sm-6">
            <select name="dp1" class="form-control" required>
                <option value="-">-</option>
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
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">Dosen Penguji I
            </label>
        <div class="col-md-6 col-sm-6">
            <select name="dpen1" class="form-control" required>
                <option value="-">-</option>
                <?php
                $sql = mysqli_query($koneksi, "SELECT * from dosen");
                while ($isi = mysqli_fetch_array($sql)) {
                    $id_dosen = $isi['id_dosen'];
                    $nama_dosen = $isi['nama_dosen'];
                    ?>
                    <option value="<?php echo $nama_dosen; ?>|<?php echo $id_dosen; ?>" <?php if ($dosen_penguji1_show == $nama_dosen) echo 'selected="selected"'; ?>> <?php echo $nama_dosen ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">Dosen Penguji II</label>
        <div class="col-md-6 col-sm-6">
            <select name="dpen2" class="form-control" required>
                <option value="-">-</option>
                <?php
                $sql = mysqli_query($koneksi, "SELECT * from dosen");
                while ($isi = mysqli_fetch_array($sql)) {
                    $id_dosen = $isi['id_dosen'];
                    $nama_dosen = $isi['nama_dosen'];
                    ?>
                    <option value="<?php echo $nama_dosen; ?>|<?php echo $id_dosen; ?>" <?php if ($dosen_penguji2_show == $nama_dosen) echo 'selected="selected"'; ?>> <?php echo $nama_dosen ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">Dosen Penguji II</label>
        <div class="col-md-6 col-sm-6">
            <select name="dpen3" class="form-control" required>
                <option value="-">-</option>
                <?php
                $sql = mysqli_query($koneksi, "SELECT * from dosen");
                while ($isi = mysqli_fetch_array($sql)) {
                    $id_dosen = $isi['id_dosen'];
                    $nama_dosen = $isi['nama_dosen'];
                    ?>
                    <option value="<?php echo $nama_dosen; ?>|<?php echo $id_dosen; ?>" <?php if ($dosen_penguji3_show == $nama_dosen) echo 'selected="selected"'; ?>> <?php echo $nama_dosen ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
        </div>
</form>