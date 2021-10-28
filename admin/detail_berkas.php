<?php include('config.php');
$nim = $_GET['nim'];
$sql_cmnt = "select comen from nilai_berkas where nim='$nim'";
$query_cmnt = mysqli_query($koneksi, $sql_cmnt);
$data_cmnt = mysqli_fetch_assoc($query_cmnt);
?>
<script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<div style="text-align: center;">
    <span style="font-size: x-large; ">Berkas Persyaratan</span>
</div>
<hr>

<!-- tampil surat permohonan -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <?php
                            $nim = $_GET['nim'];
                            $dirsurat = 'surat_permohonan';
                            $folder = '../file/' . $nim . '/' . $dirsurat;
                            $sql_sp = "SELECT surat_permohonan FROM upload_berkas WHERE nim = '$nim'";
                            $query_sp = mysqli_query($koneksi, $sql_sp);
                            $info_sp = mysqli_fetch_array($query_sp);
                            $sql_stat = "SELECT srt_permohonan FROM nilai_berkas WHERE nim = '$nim'";
                            $query_stat = mysqli_query($koneksi, $sql_stat);
                            $info_stat = mysqli_fetch_array($query_stat);
                            $file = $folder . '/' . $info_sp['surat_permohonan'];
                            if (file_exists($file)) {
                                echo '
                            <div style="text-align: center;">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Surat Pernyataan</div>
                            </div>
                            <div style="text-align: center; margin-top: 5px; margin-bottom: 10px">
                                    <span style="font-size: medium; ">Status Berkas : '.$info_stat['srt_permohonan'].'</span>
                             </div>
							<div>
                                <div style="text-align: center;"> <embed type="application/pdf" src="' . $file . '" width="150" height="110"></div>
								<div style="text-align: center; margin-top: 10px">
								    <a href="index.php?page=aksi_stat&aksi=Ditolak&brks=srt_permohonan&nim=' . $nim . '"><button class="btn btn-danger">Tolak</button></a>
								    <a href="' . $file . '" target="_blank"><button class="btn btn-warning">View</button></a>
								    <a href="index.php?page=aksi_stat&aksi=Setuju&brks=srt_permohonan&nim=' . $nim . '"><button class="btn btn-success">Setuju</button></a>
                                </div>
                            </div>
                                ';
                            } else {
                                echo '
                                <div style="text-align: center;">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Surat Permohonan</div>
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
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <?php
                            $nim = $_GET['nim'];
                            $dirktm = 'ktm';
                            $folderktm = '../file/' . $nim . '/' . $dirktm;
                            $sql_ktm = "SELECT ktm FROM upload_berkas WHERE nim = '$nim'";
                            $query_ktm = mysqli_query($koneksi, $sql_ktm);
                            $info_ktm = mysqli_fetch_array($query_ktm);
                            $sql_statktm = "SELECT ktm FROM nilai_berkas WHERE nim = '$nim'";
                            $query_statktm = mysqli_query($koneksi, $sql_statktm);
                            $info_statktm = mysqli_fetch_array($query_statktm);
                            $filektm = $folderktm . '/' . $info_ktm['ktm'];
                            if (file_exists($filektm)) {
                                echo '
                            <div style="text-align: center;">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Scan KTM</div>
                            </div>
                            <div style="text-align: center; margin-top: 5px; margin-bottom: 10px">
                                    <span style="font-size: medium; ">Status Berkas : '.$info_statktm['ktm'].'</span>
                             </div>
							<div>
                                <div style="text-align: center;"> <embed type="application/pdf" src="' . $filektm . '" width="150" height="110"></div>
								<div style="text-align: center; margin-top: 10px">
								    <a href="index.php?page=aksi_stat&aksi=Ditolak&brks=ktm&nim=' . $nim . '"><button class="btn btn-danger">Tolak</button></a>
								    <a href="' . $filektm . '" target="_blank"><button class="btn btn-warning">View</button></a>
								    <a href="index.php?page=aksi_stat&aksi=Setuju&brks=ktm&nim=' . $nim . '"><button class="btn btn-success">Setuju</button></a>
                                </div>
                            </div>
                                ';
                            } else {
                                echo '
                                <div style="text-align: center;">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Scan KTM</div>
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


        <!-- tampil Transkp -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <?php
                            $nim = $_GET['nim'];
                            $dirtr = 'transkip_nilai';
                            $foldertr = '../file/' . $nim . '/' . $dirtr;
                            $sql_tr = "SELECT transkip_nilai FROM upload_berkas WHERE nim = '$nim'";
                            $query_tr = mysqli_query($koneksi, $sql_tr);
                            $info_tr = mysqli_fetch_array($query_tr);
                            $sql_stattr = "SELECT transkip_nilai FROM nilai_berkas WHERE nim = '$nim'";
                            $query_stattr = mysqli_query($koneksi, $sql_stattr);
                            $info_stattr = mysqli_fetch_array($query_stattr);
                            $filetr = $foldertr . '/' . $info_tr['transkip_nilai'];
                            if (file_exists($filetr)) {
                                echo '
                            <div style="text-align: center;">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Transkip Nilai</div>
                            </div>
                            <div style="text-align: center; margin-top: 5px; margin-bottom: 10px">
                                    <span style="font-size: medium; ">Status Berkas : '.$info_stattr['transkip_nilai'].'</span>
                             </div>
							<div>
                                <div style="text-align: center;"> <embed type="application/pdf" src="' . $filetr . '" width="150" height="110"></div>
								<div style="text-align: center; margin-top: 10px">
								    <a href="index.php?page=aksi_stat&aksi=Ditolak&brks=transkip_nilai&nim=' . $nim . '"><button class="btn btn-danger">Tolak</button></a>
								    <a href="' . $filetr . '" target="_blank"><button class="btn btn-warning">View</button></a>
								    <a href="index.php?page=aksi_stat&aksi=Setuju&brks=transkip_nilai&nim=' . $nim . '"><button class="btn btn-success">Setuju</button></a>
                                </div>
                            </div>
                                ';
                            } else {
                                echo '
                                <div style="text-align: center;">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Transkip Nilai</div>
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
        <!-- tampil Slip UKT -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <?php
                            $nim = $_GET['nim'];
                            $dirukt = 'slip_ukt';
                            $folderukt = '../file/' . $nim . '/' . $dirukt;
                            $sql_ukt = "SELECT slip_ukt FROM upload_berkas WHERE nim = '$nim'";
                            $query_ukt = mysqli_query($koneksi, $sql_ukt);
                            $info_ukt = mysqli_fetch_array($query_ukt);
                            $sql_statukt = "SELECT slip_ukt FROM nilai_berkas WHERE nim = '$nim'";
                            $query_statukt = mysqli_query($koneksi, $sql_statukt);
                            $info_statukt = mysqli_fetch_array($query_statukt);
                            $fileukt = $folderukt . '/' . $info_ukt['slip_ukt'];
                            if (file_exists($fileukt)) {
                                echo '
                            <div style="text-align: center;">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Slip UKT</div>
                            </div>
                             <div style="text-align: center; margin-top: 5px; margin-bottom: 10px">
                                    <span style="font-size: medium; ">Status Berkas : '.$info_statukt['slip_ukt'].'</span>
                             </div>
							<div>
                                <div style="text-align: center;"> <embed type="application/pdf" src="' . $fileukt . '" width="150" height="110"></div>
								<div style="text-align: center; margin-top: 10px">
								    <a href="index.php?page=aksi_stat&aksi=Ditolak&brks=slip_ukt&nim=' . $nim . '"><button class="btn btn-danger">Tolak</button></a>
								    <a href="' . $fileukt . '" target="_blank"><button class="btn btn-warning">View</button></a>
								    <a href="index.php?page=aksi_stat&aksi=Setuju&brks=slip_ukt&nim=' . $nim . '"><button class="btn btn-success">Setuju</button></a>
                                </div>
                            </div>
                                ';
                            } else {
                                echo '
                                <div style="text-align: center;">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Slip UKT</div>
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

        <!-- tampil Herregis -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <?php
                            $nim = $_GET['nim'];
                            $dirkh = 'kartu_herregis';
                            $folderkh = '../file/' . $nim . '/' . $dirkh;
                            $sql_kh = "SELECT kartu_herregis FROM upload_berkas WHERE nim = '$nim'";
                            $query_kh = mysqli_query($koneksi, $sql_kh);
                            $info_kh = mysqli_fetch_array($query_kh);
                            $sql_statkh = "SELECT kartu_her FROM nilai_berkas WHERE nim = '$nim'";
                            $query_statkh = mysqli_query($koneksi, $sql_statkh);
                            $info_statkh = mysqli_fetch_array($query_statkh);
                            $filekh = $folderkh . '/' . $info_kh['kartu_herregis'];
                            if (file_exists($filekh)) {
                                echo '
                            <div style="text-align: center;">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kartu Her-Registrasi</div>
                            </div>
                             <div style="text-align: center; margin-top: 5px; margin-bottom: 10px">
                                    <span style="font-size: medium; ">Status Berkas : '.$info_statkh['kartu_her'].'</span>
                             </div>
							<div>
                                <div style="text-align: center;"> <embed type="application/pdf" src="' . $filekh . '" width="150" height="110"></div>
								<div style="text-align: center; margin-top: 10px">
								    <a href="index.php?page=aksi_stat&aksi=Ditolak&brks=kartu_her&nim=' . $nim . '"><button class="btn btn-danger">Tolak</button></a>
								    <a href="' . $filekh . '" target="_blank"><button class="btn btn-warning">View</button></a>
								    <a href="index.php?page=aksi_stat&aksi=Setuju&brks=kartu_her&nim=' . $nim . '"><button class="btn btn-success">Setuju</button></a>
                                </div>
                            </div>
                                ';
                            } else {
                                echo '
                                <div style="text-align: center;">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kartu Her-Registrasi</div>
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


        <!-- tampil krs_terakhir -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <?php
                            $nim = $_GET['nim'];
                            $dirkt = 'krs_terakhir';
                            $folderkt = '../file/' . $nim . '/' . $dirkt;
                            $sql_kt = "SELECT krs_terakhir FROM upload_berkas WHERE nim = '$nim'";
                            $query_kt = mysqli_query($koneksi, $sql_kt);
                            $info_kt = mysqli_fetch_array($query_kt);
                            $sql_statkt = "SELECT krs_terakhir FROM nilai_berkas WHERE nim = '$nim'";
                            $query_statkt = mysqli_query($koneksi, $sql_statkt);
                            $info_statkt = mysqli_fetch_array($query_statkt);
                            $filekt = $folderkt . '/' . $info_kt['krs_terakhir'];
                            if (file_exists($filekt)) {
                                echo '
                            <div style="text-align: center;">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">KRS Terakhir</div>
                            </div>
                             <div style="text-align: center; margin-top: 5px; margin-bottom: 10px">
                                    <span style="font-size: medium; ">Status Berkas : '.$info_statkt['krs_terakhir'].'</span>
                             </div>
							<div>
                                <div style="text-align: center;"> <embed type="application/pdf" src="' . $filekt . '" width="150" height="110"></div>
								<div style="text-align: center; margin-top: 10px">
								    <a href="index.php?page=aksi_stat&aksi=Ditolak&brks=krs_terakhir&nim=' . $nim . '"><button class="btn btn-danger">Tolak</button></a>
								    <a href="' . $filekt . '" target="_blank"><button class="btn btn-warning">View</button></a>
								    <a href="index.php?page=aksi_stat&aksi=Setuju&brks=krs_terakhir&nim=' . $nim . '"><button class="btn btn-success">Setuju</button></a>
                                </div>
                            </div>
                                ';
                            } else {
                                echo '
                                <div style="text-align: center;">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">KRS Terakhir</div>
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
    </div>
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <form action="index.php?page=aksi_stat_cmnt&nim=<?php echo $nim;?>" method="post">
                <h1 style="margin-bottom: 20px"> Komentar </h1>
                <textarea name="pesan" class="ckeditor"><?= $data_cmnt['comen'] ?></textarea>
                <br>
                <button class="btn btn-primary" name="kirim" value="kirim" type="submit">Simpan</button>
            </form>
        </div>
    </div>
</div>