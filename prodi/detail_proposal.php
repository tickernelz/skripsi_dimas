<?php include('config.php');
$nim_p = $_GET['nim'];
$_SESSION['nim_pro'] = $nim_p;
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>

<div style="text-align: center;"><span style="font-size: x-large; ">Tampil Proposal</span></div>
<hr>
<div class="container-fluid">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <?php
            $dirproposal = 'proposal';
            $folder = '../file/' . $nim_p . '/' . $dirproposal;
            $sql_p = "SELECT proposal FROM upload_berkas WHERE nim = '$nim_p'";
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
