<?php
error_reporting(0);
session_start();
if ($_SESSION['status'] == "login") {
    header("location:dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ujian | Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--icon gambar web-->
    <link rel="icon" type="image/png" href="authstyle/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="authstyle/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="authstyle/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="authstyle/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="authstyle/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="authstyle/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="authstyle/css/util.css">
    <link rel="stylesheet" type="text/css" href="authstyle/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="authstyle/images/img-01.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" action="proses/proses_login.php" method="post">
                    <span class="login100-form-title">
                        Member Login
                    </span>

                    <!-- cek pesan notifikasi -->
                    <?php
                    if (isset($_GET['pesan'])) {
                        if ($_GET['pesan'] == "gagal") {
                            echo "<div class='alert alert-danger'>Username atau Password salah!</div>";
                        } else if ($_GET['pesan'] == "logout") {
                            echo "<div class='alert alert-danger'>Anda sudah Logout!</div>";
                        } else if ($_GET['pesan'] == "belum_login") {
                            echo "<div class='alert alert-danger'>Anda harus login untuk mengakses halaman admin!</div>";
                        }
                    }
                    ?>

                    <div class="wrap-input100 validate-input" data-validate=" username is required">
                        <input class="input100" type="text" name="username" placeholder="username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>


                    <div class="text-center p-t-136">
                        <a class="txt2" href="register.php">
                            Buat akun
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="authstyle/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="authstyle/vendor/bootstrap/js/popper.js"></script>
    <script src="authstyle/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="authstyle/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="authstyle/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="authstyle/js/main.js"></script>


</body>

</html>