<!DOCTYPE html>
<html lang="en">
<?php
@session_start();
if ($_SESSION['role'] != "mahasiswa") {
    header("location:../index.php?pesan=belum_login");
}
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/images/logo-upr.jpeg" type="image/ico"/>

    <title> Sistem Pendafataran Skripsi </title>

    <!-- Bootstrap -->
    <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="assets/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="assets/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="assets/css/custom.css" rel="stylesheet">
</head>

<body class="nav-md">

<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <center>
                        &nbsp; <a href="index.php" class="fa fa-mortar-board fa-2x" style="color:#fff;"><span>
                  <font size="4.95" color="white" face="Helvetica Neue">APLIKASI AKADEMIK</font>
                </span></a>
                    </center>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="assets/images/logo-upr.jpeg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2> <?php echo $_SESSION['Nama']; ?></h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li><a href="index.php"><i class="fa fa-desktop"></i> Home <span
                                            class="fa fa-chevron"></span></a>
                            </li>
                            <li><a href="index.php?page=data_diri"><i class="fa fa-desktop"></i> Kelola Registrasi <span
                                            class="fa fa-chevron"></span></a>
                            </li>
                            <li><a href="#"><i class="fa fa-desktop"></i> Berkas Persyaratan <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="index.php?page=Upload_berkas">Upload Berkas</a></li>
                                    <li><a href="index.php?page=tampil_berkas">Tampil Berkas</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="fa fa-desktop"></i> Mengelola Proposal <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="index.php?page=upload_proposal">Upload Proposal</a></li>
                                    <li><a href="index.php?page=tampil_proposal">Tampil Proposal</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="fa fa-desktop"></i> Mengelola SK Proposal<span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="index.php?page=tampil_sk">Tampil SK Proposal</a></li>
                                </ul>
                            </li>
                            <li><a href="index.php?page=tampil_jadwal"><i class="fa fa-desktop"></i> Jadwal dan Berita
                                    Acara <span class="fa fa-chevron"></span></a>
                            </li>
                            <li><a href="index.php?page=hasil_proposal"><i class="fa fa-desktop"></i> Hasil Proposal <span class="fa fa-chevron"></span></a>
                            </li>

                    </div>
                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle" style="margin-left: 20px">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                    <ul class=" navbar-right">
                        <li class="nav-item dropdown open">
                            <div class="user-profile" aria-expanded="false">
                                <img src="assets/images/logo-upr.jpeg" alt=""> <?php echo $_SESSION['NIM']; ?>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content - HALAMAN UTAMA ISI DISINI -->
        <div class="right_col" role="main">
            <?php
            $queries = array();
            parse_str($_SERVER['QUERY_STRING'], $queries);
            error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
            switch ($queries['page']) {
                #Tambah Data
                case 'data_diri':
                    # code...
                    include 'data_diri.php';
                    break;
                #Upload Berkas Persyaratan
                case 'Upload_berkas':
                    # code...
                    include 'upload.php';
                    break;
                #Upload Proposal
                case 'upload_proposal':
                    # code...
                    include 'upload_proposal.php';
                    break;
                #Upload_SKperpanjangan
                case 'upload_sk':
                    # code...
                    include 'upload_sk.php';
                    break;
                #tampil berkas persyaratan
                case 'tampil_berkas':
                    include 'tampil_berkas.php';
                    break;
                #
                case 'tampil_proposal':
                    include 'tampil_proposal.php';
                    break;
                #
                case 'tampil_sk':
                    include 'tampil_sk.php';
                    break;
                #
                case 'tampil_jadwal':
                    include 'tampil_jadwal.php';
                    break;
                #Tampil Data Registrasi
                case 'Tampil_mhs':
                    include 'tampil_mhs.php';
                    break;
                case 'edit_mhs':
                    # code...
                    include 'edit_data.php';
                    break;
                case 'edit_dosen':
                    # code...
                    include 'edit_dosen.php';
                    break;
	            case 'hasil_proposal':
		            # code...
		            include 'hasil_proposal.php';
		            break;
                default:
                    #code...
                    include 'home.php';
                    break;
            }
            ?>
        </div>
    </div>
</div>
<footer>
    <div class="pull-right">
        Unversitas Palangkaraya
    </div>
    <div class="clearfix"></div>
</footer>

<!-- jQuery -->
<script src="assets/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="assets/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="assets/nprogress/nprogress.js"></script>
<!-- bootstrap-progressbar -->
<script src="assets/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="assets/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="assets/skycons/skycons.js"></script>
<!-- Custom Theme Scripts -->
<script src="assets/js/custom.js"></script>

</body>

</html>