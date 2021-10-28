<?php include('config.php'); ?>

<div style="text-align: center;">
    <span style="font-size: x-large; ">Upload Berkas</span>
</div>
<hr>
<?php
$id_upberkas = $data_berkas['id_berkas'];
$nim = $_SESSION['NIM'];
$file_super = $data_berkas['surat_permohonan'];
$file_ktm = $data_berkas['ktm'];
$file_transkrip = $data_berkas['transkrip_nilai'];
$file_slip = $data_berkas['slip_ukt'];
$file_her = $data_berkas['kartu_herregis'];
$file_krs = $data_berkas['krs_terakhir'];
if (isset($_POST['surat_permohonan'])) {

	$surat_permohonan = $_FILES['surat_permohonan']['name'];
	//cek dulu jika merubah gambar produk jalankan coding ini
	if ($surat_permohonan != "") {
		$dirnim = $_SESSION['NIM'];
		$dirsurat = 'surat_permohonan';
		$newfoldernim = '../file/' . $dirnim;
		$newfoldersurat = '../file/' . $dirnim . '/' . $dirsurat;
		$ekstensi_diperbolehkan = array('png', 'jpg', 'pdf'); //ekstensi file gambar yang bisa diupload
		$x = explode('.', $surat_permohonan); //memisahkan nama file dengan ekstensi yang diupload
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['surat_permohonan']['tmp_name'];
		$angka_acak = rand(1, 999);
		$nama_gambar_baru = $surat_permohonan;
		if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {

			$query = mysqli_query($koneksi, "
			INSERT INTO upload_berkas (id_berkas,nim,surat_permohonan) VALUES ('$id_upberkas','$nim','$surat_permohonan') ON DUPLICATE KEY UPDATE nim='$nim', surat_permohonan='$surat_permohonan';
			") or die(mysqli_error($koneksi));
			$query1 = mysqli_query($koneksi, "
			INSERT INTO nilai_berkas (nim,srt_permohonan) VALUES ('$nim','Proses') ON DUPLICATE KEY UPDATE srt_permohonan='Proses';
			") or die(mysqli_error($koneksi));

			if ($query && $query1) {
				if (is_dir($newfoldernim) === false) {
					if (!mkdir($newfoldernim) && !is_dir($newfoldernim)) {
						throw new \RuntimeException(sprintf('Directory "%s" was not created', $newfoldernim));
					}
				}
				if (is_dir($newfoldersurat) === false) {
					if (!mkdir($newfoldersurat) && !is_dir($newfoldersurat)) {
						throw new \RuntimeException(sprintf('Directory "%s" was not created', $newfoldersurat));
					}
				}
				unlink('../file/' . $nim . '/surat_permohonan' . '/' . $file_super);
				move_uploaded_file($file_tmp, '../file/' . $nim . '/surat_permohonan' . '/' . $nama_gambar_baru); //memindah file gambar ke folder gambar

				echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=Upload_berkas";</script>';
			} else {
				//jika file ekstensi tidak jpg dan png maka alert ini yang tampil
				echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
			}
		}
	}
}

if (isset($_POST['ktm'])) {

	$ktm = $_FILES['ktm']['name'];
	//cek dulu jika merubah gambar produk jalankan coding ini
	if ($ktm != "") {
		$dirnim = $_SESSION['NIM'];
		$dirsurat = 'ktm';
		$newfoldernim = '../file/' . $dirnim;
		$newfoldersurat = '../file/' . $dirnim . '/' . $dirsurat;
		$ekstensi_diperbolehkan = array('png', 'jpg', 'pdf'); //ekstensi file gambar yang bisa diupload$nim = $_SESSION['nim];
		$x = explode('.', $ktm); //memisahkan nama file dengan ekstensi yang diupload
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['ktm']['tmp_name'];
		$angka_acak = rand(1, 999);
		$nama_gambar_baru = $ktm; //menggabungkan angka acak dengan nama file sebenarnya
		if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {

			$query = mysqli_query($koneksi, "
			INSERT INTO upload_berkas (id_berkas,nim,ktm) VALUES ('$id_upberkas','$nim','$ktm') ON DUPLICATE KEY UPDATE nim='$nim', ktm='$ktm';
			") or die(mysqli_error($koneksi));
			$query1 = mysqli_query($koneksi, "
		    INSERT INTO nilai_berkas (nim,ktm) VALUES ('$nim','Proses') ON DUPLICATE KEY UPDATE ktm='Proses';
			") or die(mysqli_error($koneksi));

			if ($query && $query1) {
				if (is_dir($newfoldernim) === false) {
					if (!mkdir($newfoldernim) && !is_dir($newfoldernim)) {
						throw new \RuntimeException(sprintf('Directory "%s" was not created', $newfoldernim));
					}
				}
				if (is_dir($newfoldersurat) === false) {
					if (!mkdir($newfoldersurat) && !is_dir($newfoldersurat)) {
						throw new \RuntimeException(sprintf('Directory "%s" was not created', $newfoldersurat));
					}
				}
				unlink('../file/' . $nim . '/ktm' . '/' . $file_ktm);
				move_uploaded_file($file_tmp, '../file/' . $nim . '/ktm' . '/' . $nama_gambar_baru); //memindah file gambar ke folder gambar

				echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=Upload_berkas";</script>';
			} else {
				//jika file ekstensi tidak jpg dan png maka alert ini yang tampil
				echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
			}
		}
	}
}
if (isset($_POST['transkip_nilai'])) {

	$transkip_nilai = $_FILES['transkip_nilai']['name'];
	//cek dulu jika merubah gambar produk jalankan coding ini
	if ($transkip_nilai != "") {
		$dirnim = $_SESSION['NIM'];
		$dirsurat = 'transkip_nilai';
		$newfoldernim = '../file/' . $dirnim;
		$newfoldersurat = '../file/' . $dirnim . '/' . $dirsurat;
		$ekstensi_diperbolehkan = array('png', 'jpg', 'pdf'); //ekstensi file gambar yang bisa diupload
		$x = explode('.', $transkip_nilai); //memisahkan nama file dengan ekstensi yang diupload
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['transkip_nilai']['tmp_name'];
		$angka_acak = rand(1, 999);
		$nama_gambar_baru = $transkip_nilai; //menggabungkan angka acak dengan nama file sebenarnya
		if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {

			$query = mysqli_query($koneksi, "
			INSERT INTO upload_berkas (id_berkas,nim,transkip_nilai) VALUES ('$id_upberkas','$nim','$transkip_nilai') ON DUPLICATE KEY UPDATE nim='$nim', transkip_nilai='$transkip_nilai';
			") or die(mysqli_error($koneksi));
			$query1 = mysqli_query($koneksi, "
			INSERT INTO nilai_berkas (nim,transkip_nilai) VALUES ('$nim','Proses') ON DUPLICATE KEY UPDATE transkip_nilai='Proses';
			") or die(mysqli_error($koneksi));

			if ($query && $query1) {
				if (is_dir($newfoldernim) === false) {
					if (!mkdir($newfoldernim) && !is_dir($newfoldernim)) {
						throw new \RuntimeException(sprintf('Directory "%s" was not created', $newfoldernim));
					}
				}
				if (is_dir($newfoldersurat) === false) {
					if (!mkdir($newfoldersurat) && !is_dir($newfoldersurat)) {
						throw new \RuntimeException(sprintf('Directory "%s" was not created', $newfoldersurat));
					}
				}
				unlink('../file/' . $nim . '/transkip_nilai' . '/' . $file_transkrip);
				move_uploaded_file($file_tmp, '../file/' . $nim . '/transkip_nilai' . '/' . $nama_gambar_baru); //memindah file gambar ke folder gambar

				echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=Upload_berkas";</script>';
			} else {
				//jika file ekstensi tidak jpg dan png maka alert ini yang tampil
				echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
			}
		}
	}
}

if (isset($_POST['slip_ukt'])) {

	$slip_ukt = $_FILES['slip_ukt']['name'];
	$dirnim = $_SESSION['NIM'];
	$dirsurat = 'slip_ukt';
	$newfoldernim = '../file/' . $dirnim;
	$newfoldersurat = '../file/' . $dirnim . '/' . $dirsurat;
	//cek dulu jika merubah gambar produk jalankan coding ini
	if ($slip_ukt != "") {
		$ekstensi_diperbolehkan = array('png', 'jpg', 'pdf'); //ekstensi file gambar yang bisa diupload
		$x = explode('.', $slip_ukt); //memisahkan nama file dengan ekstensi yang diupload
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['slip_ukt']['tmp_name'];
		$angka_acak = rand(1, 999);
		$nama_gambar_baru = $slip_ukt; //menggabungkan angka acak dengan nama file sebenarnya
		if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {

			$query = mysqli_query($koneksi, "
			INSERT INTO upload_berkas (id_berkas,nim,slip_ukt) VALUES ('$id_upberkas','$nim','$slip_ukt') ON DUPLICATE KEY UPDATE nim='$nim', slip_ukt='$slip_ukt';
			") or die(mysqli_error($koneksi));
			$query1 = mysqli_query($koneksi, "
			INSERT INTO nilai_berkas (nim,slip_ukt) VALUES ('$nim','Proses') ON DUPLICATE KEY UPDATE slip_ukt='Proses';
			") or die(mysqli_error($koneksi));

			if ($query && $query1) {
				if (is_dir($newfoldernim) === false) {
					if (!mkdir($newfoldernim) && !is_dir($newfoldernim)) {
						throw new \RuntimeException(sprintf('Directory "%s" was not created', $newfoldernim));
					}
				}
				if (is_dir($newfoldersurat) === false) {
					if (!mkdir($newfoldersurat) && !is_dir($newfoldersurat)) {
						throw new \RuntimeException(sprintf('Directory "%s" was not created', $newfoldersurat));
					}
				}
				unlink('../file/' . $nim . '/slip_ukt' . '/' . $file_slip);
				move_uploaded_file($file_tmp, '../file/' . $nim . '/slip_ukt' . '/' . $nama_gambar_baru); //memindah file gambar ke folder gambar

				echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=Upload_berkas";</script>';
			} else {
				//jika file ekstensi tidak jpg dan png maka alert ini yang tampil
				echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
			}
		}
	}
}

if (isset($_POST['kartu_herregis'])) {

	$kartu_herregis = $_FILES['kartu_herregis']['name'];
	//cek dulu jika merubah gambar produk jalankan coding ini
	if ($kartu_herregis != "") {
		$dirnim = $_SESSION['NIM'];
		$dirsurat = 'kartu_herregis';
		$newfoldernim = '../file/' . $dirnim;
		$newfoldersurat = '../file/' . $dirnim . '/' . $dirsurat;
		$ekstensi_diperbolehkan = array('png', 'jpg', 'pdf'); //ekstensi file gambar yang bisa diupload
		$x = explode('.', $kartu_herregis); //memisahkan nama file dengan ekstensi yang diupload
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['kartu_herregis']['tmp_name'];
		$angka_acak = rand(1, 999);
		$nama_gambar_baru = $kartu_herregis; //menggabungkan angka acak dengan nama file sebenarnya
		if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {

			$query = mysqli_query($koneksi, "
			INSERT INTO upload_berkas (id_berkas,nim,kartu_herregis) VALUES ('$id_upberkas','$nim','$kartu_herregis') ON DUPLICATE KEY UPDATE nim='$nim', kartu_herregis='$kartu_herregis';
			") or die(mysqli_error($koneksi));
			$query1 = mysqli_query($koneksi, "
			INSERT INTO nilai_berkas (nim,kartu_her) VALUES ('$nim','Proses') ON DUPLICATE KEY UPDATE kartu_her='Proses';
			") or die(mysqli_error($koneksi));

			if ($query && $query1) {
				if (is_dir($newfoldernim) === false) {
					if (!mkdir($newfoldernim) && !is_dir($newfoldernim)) {
						throw new \RuntimeException(sprintf('Directory "%s" was not created', $newfoldernim));
					}
				}
				if (is_dir($newfoldersurat) === false) {
					if (!mkdir($newfoldersurat) && !is_dir($newfoldersurat)) {
						throw new \RuntimeException(sprintf('Directory "%s" was not created', $newfoldersurat));
					}
				}
				unlink('../file/' . $nim . '/kartu_herregis' . '/' . $file_her);
				move_uploaded_file($file_tmp, '../file/' . $nim . '/kartu_herregis' . '/' . $nama_gambar_baru); //memindah file gambar ke folder gambar

				echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=Upload_berkas";</script>';
			} else {
				//jika file ekstensi tidak jpg dan png maka alert ini yang tampil
				echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
			}
		}
	}
}

if (isset($_POST['krs_terakhir'])) {

	$krs_terakhir = $_FILES['krs_terakhir']['name'];
	//cek dulu jika merubah gambar produk jalankan coding ini
	if ($krs_terakhir != "") {
		$dirnim = $_SESSION['NIM'];
		$dirsurat = 'krs_terakhir';
		$newfoldernim = '../file/' . $dirnim;
		$newfoldersurat = '../file/' . $dirnim . '/' . $dirsurat;
		$ekstensi_diperbolehkan = array('png', 'jpg', 'pdf'); //ekstensi file gambar yang bisa diupload
		$x = explode('.', $krs_terakhir); //memisahkan nama file dengan ekstensi yang diupload
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['krs_terakhir']['tmp_name'];
		$angka_acak = rand(1, 999);
		$nama_gambar_baru = $krs_terakhir; //menggabungkan angka acak dengan nama file sebenarnya
		if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {

			$query = mysqli_query($koneksi, "
			INSERT INTO upload_berkas (id_berkas,nim,krs_terakhir) VALUES ('$id_upberkas','$nim','$krs_terakhir') ON DUPLICATE KEY UPDATE nim='$nim', krs_terakhir='$krs_terakhir';
			") or die(mysqli_error($koneksi));
			$query1 = mysqli_query($koneksi, "
			INSERT INTO nilai_berkas (nim,krs_terakhir) VALUES ('$nim','Proses') ON DUPLICATE KEY UPDATE krs_terakhir='Proses';
			") or die(mysqli_error($koneksi));

			if ($query && $query1) {
				if (is_dir($newfoldernim) === false) {
					if (!mkdir($newfoldernim) && !is_dir($newfoldernim)) {
						throw new \RuntimeException(sprintf('Directory "%s" was not created', $newfoldernim));
					}
				}
				if (is_dir($newfoldersurat) === false) {
					if (!mkdir($newfoldersurat) && !is_dir($newfoldersurat)) {
						throw new \RuntimeException(sprintf('Directory "%s" was not created', $newfoldersurat));
					}
				}
				unlink('../file/' . $nim . '/krs_terakhir' . '/' . $file_krs);
				move_uploaded_file($file_tmp, '../file/' . $nim . '/krs_terakhir' . '/' . $nama_gambar_baru); //memindah file gambar ke folder gambar

				echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=Upload_berkas";</script>';
			} else {
				//jika file ekstensi tidak jpg dan png maka alert ini yang tampil
				echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
			}
		}
	}
}
?>
<!-- Upload Surat Permohonan -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Upload Surat
                                    Pernyataan
                                </div>
                                <div>
                                    <br>
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        <input type="file" name="surat_permohonan" class="form-control" size="4"
                                               required>
                                        <br>
                                        <input name="surat_permohonan" type="submit" value="UPLOAD">
                                    </form>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Upload Scan -->
        <div class="col-xl-3 col-md-6 mb-4">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Upload Scan KTM
                                </div>
                                <div>
                                    <br>
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        <input type="file" name="ktm" class="form-control" size="4" required>
                                        <br>
                                        <input name="ktm" type="submit" value="UPLOAD">
                                    </form>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <!-- Upload Transkp -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Upload Scan Transkip
                                Nilai
                            </div>
                            <div>
                                <br>
                                <form method="POST" action="" enctype="multipart/form-data">
                                    <input type="file" name="transkip_nilai" class="form-control" size="4" required>
                                    <br>
                                    <input name="transkip_nilai" type="submit" value="UPLOAD">
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

        <!-- Upload Slip UKT -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Upload Scan Slip
                                UKT
                            </div>
                            <div>
                                <br>
                                <form method="POST" action="" enctype="multipart/form-data">
                                    <input type="file" name="slip_ukt" class="form-control" size="4" required>
                                    <br>
                                    <input name="slip_ukt" type="submit" value="UPLOAD">
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

        <!-- Upload Herregis -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Upload Scan Kartu
                                Harregis
                            </div>
                            <div>
                                <br>
                                <form method="POST" action="" enctype="multipart/form-data">
                                    <input type="file" name="kartu_herregis" class="form-control" size="4" required>
                                    <br>
                                    <input name="kartu_herregis" type="submit" value="UPLOAD">
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

        <!-- krs terakhir -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Upload KRS Terakhir
                            </div>
                            <div>
                                <br>
                                <form method="POST" action="" enctype="multipart/form-data">
                                    <input type="file" name="krs_terakhir" class="form-control" size="4" required>
                                    <br>
                                    <input name="krs_terakhir" type="submit" value="UPLOAD">
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