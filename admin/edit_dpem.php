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
$dosen_pembimbing2_show = $data_dp['dosen_pembimbing2'];
$dosen_penguji1_show  = $data_dp['dpen1'];
$dosen_penguji2_show = $data_dp['dpen2'];
$dosen_penguji3_show = $data_dp['dpen3'];

if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $status = $_POST['status'];
    $judul = $_POST['judul'];
    $dp1 = $_POST['dp1'];
    $dp2 = $_POST['dp2'];


    $query_mhs = mysqli_query($koneksi, "UPDATE mahasiswa SET NIM = '$nim', Nama = '$nama' WHERE NIM = '$nim';") or die(mysqli_error($koneksi));
    $query_regis = mysqli_query($koneksi, "UPDATE registrasi SET status = '$status', judul = '$judul' WHERE nim = '$nim';") or die(mysqli_error($koneksi));
    $query_dp = mysqli_query($koneksi, "UPDATE dosen_pembimbing SET dosen_pembimbing1 = '$dp1', dosen_pembimbing2 = '$dp2' WHERE nim_mhs = '$nim';") or die(mysqli_error($koneksi));
    if ($query_mhs && $query_regis && $query_dp) {
        echo '<script>alert("Berhasil Mengubah Data."); document.location="index.php?page=kelola_dpem";</script>';
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
                    $nama_dosen = $isi['nama_dosen'];
                    ?>
                    <option value="<?php echo $nama_dosen; ?>" <?php if ($dosen_pembimbing1_show == $nama_dosen) echo 'selected="selected"'; ?>> <?php echo $nama_dosen ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-size: medium">Dosen Pembimbing2 II
            </label>
        <div class="col-md-6 col-sm-6">
            <select name="dp2" class="form-control" required>
                <option value="-">-</option>
                <option value="<?php echo $dosen_penguji1_show ?>" <?php if ($dosen_pembimbing2_show == "$dosen_penguji1_show") echo 'selected="selected"'; ?>><?php echo $data_dp['dpen1'] ?>
                </option>
                <option value="<?php echo $dosen_penguji2_show ?>" <?php if ($dosen_pembimbing2_show == "$dosen_penguji2_show") echo 'selected="selected"'; ?>><?php echo $data_dp['dpen2'] ?>
                </option>
                <option value="<?php echo $dosen_penguji3_show ?>" <?php if ($dosen_pembimbing2_show == "$dosen_penguji3_show") echo 'selected="selected"'; ?>><?php echo $data_dp['dpen3'] ?>
                </option>
            </select>
        </div>
    </div>

    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
        </div>
</form>