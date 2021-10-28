<div style="text-align: center;"><span style="font-size: x-large; ">Upload SK Perpanjanagn Proposal</span></div>
<hr>
<?php
include('config.php');
$nim = $_GET['nim'];
$sql_sk = "select * from upload_berkas where nim='$nim'";
$query_sk = mysqli_query($koneksi, $sql_sk);
$data_sk = mysqli_fetch_assoc($query_sk);
$id_upberkas = $data_sk['id_berkas'];
$file_sk = $data_sk['sk_perpanjangan'];
if (isset($_POST['sk_perpanjangan'])) {

	$sk_perpanjangan = $_FILES['sk_perpanjangan']['name'];
	//cek dulu jika merubah gambar produk jalankan coding ini
	if ($sk_perpanjangan != "") {
		$dirnim = $_GET['nim'];
		$dirsk = 'sk_perpanjangan';
		$newfoldernim = '../file/' . $dirnim;
		$newfoldersk = '../file/' . $dirnim . '/' . $dirsk;
		$ekstensi_diperbolehkan = array('png', 'jpg', 'pdf'); //ekstensi file gambar yang bisa diupload
		$x = explode('.', $sk_perpanjangan); //memisahkan nama file dengan ekstensi yang diupload
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['sk_perpanjangan']['tmp_name'];
		$angka_acak = rand(1, 999);
		$nama_gambar_baru = $sk_perpanjangan; //menggabungkan angka acak dengan nama file sebenarnya
		if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {

			$query = mysqli_query($koneksi, "
            INSERT INTO upload_berkas (id_berkas,nim,sk_perpanjangan) VALUES ('$id_upberkas','$nim','$sk_perpanjangan') ON DUPLICATE KEY UPDATE nim='$nim', sk_perpanjangan='$sk_perpanjangan';
			") or die(mysqli_error($koneksi));

			if ($query) {
				if (is_dir($newfoldernim) === false) {
					if (!mkdir($newfoldernim) && !is_dir($newfoldernim)) {
						throw new \RuntimeException(sprintf('Directory "%s" was not created', $newfoldernim));
					}
				}
				if (is_dir($newfoldersk) === false) {
					if (!mkdir($newfoldersk) && !is_dir($newfoldersk)) {
						throw new \RuntimeException(sprintf('Directory "%s" was not created', $newfoldersk));
					}
				}
				unlink('../file/' . $nim . '/sk_perpanjangan' . '/' . $file_sk);
				move_uploaded_file($file_tmp, '../file/' . $nim . '/sk_perpanjangan' . '/' . $nama_gambar_baru); //memindah file gambar ke folder gambar

				echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_sk&nim='.$dirnim.'";</script>';
			} else {
				//jika file ekstensi tidak jpg dan png maka alert ini yang tampil
				echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='index.php?page=upload_sk&nim='.$dirnim.'';</script>";
			}
		}
	}
}
?>


<!-- Upload Transkp -->
<div class="d-flex justify-content-center">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Upload sk_perpanjangan</div>
                    <div>
                        <br>
                        <form method="POST" action="" enctype="multipart/form-data">
                            <input type="file" name="sk_perpanjangan" class="form-control" size="4" required>
                            <br>
                            <input name="sk_perpanjangan" type="submit" value="UPLOAD">
                        </form>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
   