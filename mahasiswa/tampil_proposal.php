<?php
include('config.php');
$nim = $_SESSION['NIM'];
?>
<script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<div style="text-align: center;"><span style="font-size: x-large; ">Tampil Proposal</span></div>
<hr>
<div class="container-fluid">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">

			<?php
			$nim = $_SESSION['NIM'];
			$dirproposal = 'proposal';
			$folder = '../file/' . $nim . '/' . $dirproposal;
			$sql_p = "SELECT proposal FROM upload_berkas WHERE nim = '$nim'";
			$query_p = mysqli_query($koneksi, $sql_p);
			$info_p = mysqli_fetch_array($query_p);
			$file = $folder . '/' . $info_p['proposal'];
			if (file_exists($file)) {
				echo '
                             <div style="text-align: center;">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Proposal</div>
                            </div>
							<div>
                                <div class="embed-responsive embed-responsive-21by9" style="text-align: center;">
                                <iframe class="embed-responsive-item" src="' . $file . '"></iframe>
                                 </div>
								<div style="text-align: center; margin-top: 30px">
								    <a href="' . $file . '" target="_blank"><button class="btn btn-success">View pdf</button></a>
                                </div>
                            </div>
                                ';
			} else {
				echo '
                                <div style="text-align: center;">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Proposal</div>
                                </div>
							    <div style="text-align: center; margin-top: 50px;">
                                    <span style="font-size: large; ">File Tidak Ditemukan</span>
                                </div>
                                ';
			}
			?>

        </div>
    </div>
	<?php
	$sql_cmnt1 = "select comment from proposal where nim='$nim'";
	$query_cmnt1 = mysqli_query($koneksi, $sql_cmnt1);
	$data_cmnt1 = mysqli_fetch_assoc($query_cmnt1);
	$sql_cmnt2 = "select comment from proposal_dpen1 where nim='$nim'";
	$query_cmnt2 = mysqli_query($koneksi, $sql_cmnt2);
	$data_cmnt2 = mysqli_fetch_assoc($query_cmnt2);
	$sql_cmnt3 = "select comment from proposal_dpen2 where nim='$nim'";
	$query_cmnt3 = mysqli_query($koneksi, $sql_cmnt3);
	$data_cmnt3 = mysqli_fetch_assoc($query_cmnt3);
	$sql_cmnt4 = "select comment from proposal_dpen3 where nim='$nim'";
	$query_cmnt4 = mysqli_query($koneksi, $sql_cmnt4);
	$data_cmnt4 = mysqli_fetch_assoc($query_cmnt4);
	?>
    <div style="margin-top: 40px" class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <h2 style="margin-bottom: 20px"> Komentar Dosen Pembimbing 1</h2>
            <textarea name="pesan1" class="ckeditor" disabled><?= $data_cmnt1['comment'] ?> </textarea>
        </div>
    </div>
    <div style="margin-top: 40px" class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <h2 style="margin-bottom: 20px"> Komentar Dosen Penguji 1</h2>
            <textarea name="pesan2" class="ckeditor" disabled><?= $data_cmnt2['comment'] ?> </textarea>
        </div>
    </div>
    <div style="margin-top: 40px" class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <h2 style="margin-bottom: 20px"> Komentar Dosen Penguji 2</h2>
            <textarea name="pesan3" class="ckeditor" disabled><?= $data_cmnt3['comment'] ?> </textarea>
        </div>
    </div>
    <div style="margin-top: 40px" class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <h2 style="margin-bottom: 20px"> Komentar Dosen Penguji 3</h2>
            <textarea name="pesan4" class="ckeditor" disabled><?= $data_cmnt4['comment'] ?> </textarea>
        </div>
    </div>
</div>

<script>
    CKEDITOR.replace('pesan1', {
        toolbar: []
    })
    CKEDITOR.replace('pesan2', {
        toolbar: []
    })
    CKEDITOR.replace('pesan3', {
        toolbar: []
    })
    CKEDITOR.replace('pesan4', {
        toolbar: []
    })
</script>


