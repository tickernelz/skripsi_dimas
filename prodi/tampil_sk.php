<?php
include('config.php');
?>
<div style="text-align: center;"><span style="font-size: x-large; ">Tampil SK Perpanjangan Proposal</span></div>
<hr>
<div class="container-fluid">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <?php
            $nim = $_GET['nim'];
            $dirsk = 'sk_perpanjangan';
            $folder = '../file/' . $nim . '/' . $dirsk;
            $sql_p = "SELECT sk_perpanjangan FROM upload_berkas WHERE nim = '$nim'";
            $query_p = mysqli_query($koneksi, $sql_p);
            $info_p = mysqli_fetch_array($query_p);
            $file = $folder . '/' . $info_p['sk_perpanjangan'];
            if (file_exists($file)) {
                echo '
                            <div style="text-align: center;">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">sk_perpanjangan</div>
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
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">sk_perpanjangan</div>
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
