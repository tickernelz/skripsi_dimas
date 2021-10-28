<?php
include "Koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>skripsi</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="assets/login/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/login/css/main.css">
    <!--===============================================================================================-->

</head>

<body style="background-color: #f0f0f0">

<?php
session_start();
if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "gagal") {
        echo "<div class='alert alert-danger'>Login gagal! username dan password salah!</div><br>";
        echo $_GET['salah'];
    } else if ($_GET['pesan'] == "logout") {
        echo "<div class='alert alert-info'>Anda telah berhasil logout</div>";
    } else if ($_GET['pesan'] == "belum_login") {
        echo "<div class='alert alert-danger'>Anda harus login untuk mengakses halaman admin</div>";
    } else if ($_GET['pesan'] == "periode") {
        echo "<div class='alert alert-danger'>Priode Skripsi Belum dibuka!</div>";
    }
}
?>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(assets/login/images/Logo-upr.jpeg);">
					<span class="login100-form-title-1">
						Pendaftaran Skripsi
					</span>
            </div>

            <form class="login100-form validate-form" method="POST" action="login.php">
                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">Username</span>
                    <input class="input100" type="text" name="username" placeholder="Enter username">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                    <span class="label-input100">Password</span>
                    <input class="input100" type="password" name="password" placeholder="Enter password">
                    <span class="focus-input100"></span>
                </div>
                <div class="container-login100-form-btn">
                    <button name="login" class="login100-form-btn" type="submit">
                        Login
                    </button>
                </div>
        </div>
        <br/>
    </div>
    </form>

</div>
</div>
</body>

</html>