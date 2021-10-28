<div style="text-align: center;"><span style="font-size: x-large; ">Upload Proposal</span></div>
<hr>
<?php
include('config.php');
$nim = $_SESSION['NIM'];
$id_upberkas = $data_berkas['id_berkas'];
$file_prop = $data_berkas['proposal'];
if (isset($_POST['proposal'])) {

    $proposal = $_FILES['proposal']['name'];
    //cek dulu jika merubah gambar produk jalankan coding ini
    if ($proposal != "") {
        $dirnim = $_SESSION['NIM'];
        $dirproposal = 'proposal';
        $newfoldernim = '../file/' . $dirnim;
        $newfolderproposal = '../file/' . $dirnim . '/' . $dirproposal;
        $ekstensi_diperbolehkan = array('png', 'jpg', 'pdf'); //ekstensi file gambar yang bisa diupload
        $x = explode('.', $proposal); //memisahkan nama file dengan ekstensi yang diupload
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['proposal']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $proposal; //menggabungkan angka acak dengan nama file sebenarnya
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {

            $query = mysqli_query($koneksi, "
			INSERT INTO upload_berkas (id_berkas,nim,proposal) VALUES ('$id_upberkas','$nim','$proposal') ON DUPLICATE KEY UPDATE nim='$nim', proposal='$proposal';
			") or die(mysqli_error($koneksi));

            if ($query) {
                if (is_dir($newfoldernim) === false) {
	                if (!mkdir($newfoldernim) && !is_dir($newfoldernim)) {
		                throw new \RuntimeException(sprintf('Directory "%s" was not created', $newfoldernim));
	                }
                }
                if (is_dir($newfolderproposal) === false) {
	                if (!mkdir($newfolderproposal) && !is_dir($newfolderproposal)) {
		                throw new \RuntimeException(sprintf('Directory "%s" was not created', $newfolderproposal));
	                }
                }
	            unlink('../file/' . $nim . '/proposal' . '/' . $file_prop);
                move_uploaded_file($file_tmp, '../file/' . $nim . '/proposal' . '/' . $nama_gambar_baru); //memindah file gambar ke folder gambar

                echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_proposal";</script>';
            } else {
                //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='upload_proposal.php';</script>";
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
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Upload Proposal</div>
                    <div>
                        <br>
                        <form method="POST" action="" enctype="multipart/form-data">
                            <input type="file" name="proposal" class="form-control" size="4" required>
                            <br>
                            <input name="proposal" type="submit" value="UPLOAD">
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
   