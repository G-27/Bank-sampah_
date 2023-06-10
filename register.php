<?php
error_reporting(0);
session_start();
if ($_SESSION['status'] == "register") {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>SAP | Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--icon gambar web-->
    <link rel="icon" type="image/png" href="
    authstyle/images/icons/user.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="
    authstyle/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="
    authstyle/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="
    authstyle/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="
    authstyle/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="
    authstyle/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="
    authstyle/css/util.css">
    <link rel="stylesheet" type="text/css" href="
    authstyle/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="
                    authstyle/images/img-01.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" action="proses/registrasi.php" method="post">
                    <span class="login100-form-title">
                        Buat akun
                    </span>



                    <div class="wrap-input100 validate-input" data-validate=" Nama wajib diisi">
                        <input class="input100" type="text" name="nama" placeholder="Nama">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        </span>
                    </div>


                    <div class="wrap-input100 validate-input" data-validate=" Nomor Hp wajib diisi">
                        <input class="input100" type="text" name="no_hp" placeholder="No hp">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-id-badge" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate=" alamat wajib diisi">
                        <input class="input100" type="text" name="alamat" placeholder="Alamat">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate=" Email wajib diisi">
                        <input class="input100" type="email" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate=" Username wajib diisi">
                        <input class="input100" type="text" name="username" placeholder="Username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        </span>
                    </div>


                    <div class="wrap-input100 validate-input" data-validate="Password wajib diisi">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Register
                        </button>
                    </div>


                    <div class="text-center p-t-136">
                        <a class="txt2" href="/tipe_a">
                            Sudah punya akun ?
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="
    authstyle/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="
    authstyle/vendor/bootstrap/js/popper.js"></script>
    <script src="
    authstyle/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="
    authstyle/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="
    authstyle/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="
    authstyle/js/main.js"></script>

</body>

</html>