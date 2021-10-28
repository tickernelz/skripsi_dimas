<?php include('config.php'); ?>

<div style="text-align: center;"><span style="font-size: x-large; ">Jadwal Dan Berita Acara</span></div>
<hr>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <?php
                            $dirj = 'jadwal';
                            $folder = '../file/'. $dirj;
                            $file = $folder . '/' . 'jadwal.pdf';
                            if (file_exists($file)) {
                                echo '
                            <div style="text-align: center;">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jadwal Proposal</div>
                            </div>
							<div>
                                <div style="text-align: center;"> <embed type="application/pdf" src="' . $file . '?random='.random_int(1,99999).'" width="150" height="110"></div>
								<div style="text-align: center;">
								    <a href="' . $file . '" target="_blank"><button class="btn btn-success">Jadwal Proposal</button></a>
                                </div>
                            </div>
                                ';
                            } else {
                                echo '
                                <div style="text-align: center;">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jadwal Proposal</div>
                                </div>
							    <div style="text-align: center; margin-top: 50px;">
                                    <span style="font-size: large; ">File Tidak Ditemukan</span>
                                </div>
                                ';
                            }
                            ?>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- tampil KTM -->
        <div style="margin-top: 40px" class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <?php
                            $dirba = 'berita_acara';
                            $folderba = '../file/'. $dirba;
                            $fileba = $folderba . '/' . 'berita_acara.pdf';
                            if (file_exists($fileba)) {
                                echo '
                            <div style="text-align: center;">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Berita Acara</div>
                            </div>
							<div>
                                <div style="text-align: center;"> <embed type="application/pdf" src="' . $fileba . '?random='.random_int(1,99999).'" width="150" height="110"></div>
								<div style="text-align: center;">
								    <a href="' . $fileba . '" target="_blank"><button class="btn btn-success">Berita Acara</button></a>
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
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>