<?php include('config.php'); ?>

<div style="text-align: center;">
    <span style="font-size: x-large; ">Upload Jadwal Dan Berita Acara</span>
</div>
<hr>
<?php
if (isset($_POST['berita_acara'])) {

	$berita_acara = $_FILES['berita_acara']['name'];
	//cek dulu jika merubah gambar produk jalankan coding ini
	if ($berita_acara != "") {
		$newfolderba = '../file/berita_acara';
		$ekstensi_diperbolehkan = array('pdf'); //ekstensi file gambar yang bisa diupload
		$x = explode('.', $berita_acara); //memisahkan nama file dengan ekstensi yang diupload
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['berita_acara']['tmp_name'];
		$angka_acak = rand(1, 999);
		$nama_gambar_baru = 'berita_acara.pdf';
		if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
			if (is_dir($newfolderba) === false) {
				if (!mkdir($newfolderba) && !is_dir($newfolderba)) {
					throw new \RuntimeException(sprintf('Directory "%s" was not created', $newfolderba));
				}
			}
			unlink('../file/berita_acara' . '/' . $nama_gambar_baru);
			move_uploaded_file($file_tmp, '../file/berita_acara' . '/' . $nama_gambar_baru); //memindah file gambar ke folder gambar
			echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=upload_jadwal";</script>';
		} else {
			//jika file ekstensi tidak jpg dan png maka alert ini yang tampil
			echo "<script>alert('Ekstensi gambar yang boleh hanya PDF.');window.location='index.php?page=upload_jadwal';</script>";
		}
	}
}

if (isset($_POST['jadwal'])) {

	$jadwal = $_FILES['jadwal']['name'];
	//cek dulu jika merubah gambar produk jalankan coding ini
	if ($jadwal != "") {
		$dirjadwal = 'jadwal';
		$newfolderjadwal = '../file/' . $dirjadwal;
		$ekstensi_diperbolehkan = array('pdf'); //ekstensi file gambar yang bisa diupload
		$x = explode('.', $jadwal); //memisahkan nama file dengan ekstensi yang diupload
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['jadwal']['tmp_name'];
		$angka_acak = rand(1, 999);
		$nama_gambar_baru = 'jadwal.pdf'; //menggabungkan angka acak dengan nama file sebenarnya
		if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
			if (is_dir($newfolderjadwal) === false) {
				if (!mkdir($newfolderjadwal) && !is_dir($newfolderjadwal)) {
					throw new \RuntimeException(sprintf('Directory "%s" was not created', $newfolderjadwal));
				}
			}
			unlink('../file/jadwal/' . $nama_gambar_baru);
			move_uploaded_file($file_tmp, '../file/jadwal/' . $nama_gambar_baru); //memindah file gambar ke folder gambar
			echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=upload_jadwal";</script>';
		} else {
			//jika file ekstensi tidak jpg dan png maka alert ini yang tampil
			echo "<script>alert('Ekstensi gambar yang boleh hanya PDF.');window.location='index.php?page=upload_jadwal';</script>";
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
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Berita Acara
                                </div>
                                <div>
                                    <br>
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        <input type="file" name="berita_acara" class="form-control" size="4"
                                               required>
                                        <br>
                                        <input name="berita_acara" type="submit" value="UPLOAD">
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
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Upload Jadwal
                                    Seminar
                                </div>
                                <div>
                                    <br>
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        <input type="file" name="jadwal" class="form-control" size="4" required>
                                        <br>
                                        <input name="jadwal" type="submit" value="UPLOAD">
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

        <!--tampil jadwal dan berita acaara -->
        <hr>
        <div class="container-fluid">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
					<?php
					$dirsk = 'berita_acara';
					$folder = '../file/' . $dirsk;
					$file = $folder . '/' . 'berita_acara.pdf';
					if (file_exists($file)) {
						echo '
                            <div style="text-align: center;">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Berita Acara</div>
                            </div>
							<div>
                                <div class="embed-responsive embed-responsive-21by9" style="text-align: center;">
                                <iframe class="embed-responsive-item" src="' . $file . '?random='.random_int(1,99999).'"></iframe>
                                 </div>
								<div style="text-align: center; margin-top: 30px">
								    <a href="' . $file . '" target="_blank"><button class="btn btn-success">View pdf</button></a>
								     <a href="index.php?page=hapus_file&files=berita" onclick="return checkDelete()" class="btn btn-danger">Hapus</a>
                                </div>
                            </div>
                                ';
					} else {
						echo '
                                <div style="text-align: center;">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Berita Acara</div>
                                </div>
							    <div style="text-align: center; margin-top: 50px;">
                                    <span style="font-size: large; ">File Tidak Ditemukan</span>
                                </div>
                                ';
					}
					?>
                </div>
            </div>
        </div>
        <div style="margin-top: 40px" class="container-fluid">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
					<?php
					$dirjd = 'jadwal';
					$folderjd = '../file/' . $dirjd;
					$filejd = $folderjd . '/' . 'jadwal.pdf';
					if (file_exists($filejd)) {
						echo '
                            <div style="text-align: center;">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">jadwal Seminar</div>
                            </div>
							<div>
                                <div class="embed-responsive embed-responsive-21by9" style="text-align: center;">
                                <iframe class="embed-responsive-item" src="' . $filejd . '?random='.random_int(1,99999).'"></iframe>
                                 </div>
								<div style="text-align: center; margin-top: 30px">
								    <a href="' . $filejd . '" target="_blank"><button class="btn btn-success">View pdf</button></a>
								     <a href="index.php?page=hapus_file&files=jadwal" onclick="return checkDelete()" class="btn btn-danger">Hapus</a>
                                </div>
                            </div>
                                ';
					} else {
						echo '
                                <div style="text-align: center;">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">jadwal Seminar</div>
                                </div>
							    <div style="text-align: center; margin-top: 50px;">
                                    <span style="font-size: large; ">File Tidak Ditemukan</span>
                                </div>
                                ';
					}
					?>
                </div>
            </div>
        </div>
