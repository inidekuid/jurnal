<?php
ob_start();
session_start();
if (isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit();
}
include_once 'config/koneksi.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Selamat Datang</title>
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="webmin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="webmin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="webmin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="/" class="logo d-flex align-items-center w-auto">
                                    <img src="webmin/assets/img/logo.png" alt="">
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Masuk Ke akun Anda</h5>
                                        <p class="text-center small">Masukkan NIP/NIK dan Sandi</p>
                                    </div>
                                    <?php
                                    if (isset($_POST['submit'])) {
                                        $username = htmlspecialchars($_POST['user_name']);
                                        if (!isset($username, $_POST['password'])) {
                                            die('Please fill both the username and password field!');
                                        }
                                        if ($stmt = $con->prepare('SELECT IDP,NAMAPENGGUNA,PASS,IDKELAS,STATE FROM pengguna WHERE USER = ?')) {
                                            $stmt->bind_param('s', $username);
                                            $stmt->execute();
                                            $stmt->store_result();

                                            if ($stmt->num_rows > 0) {
                                                $stmt->bind_result($id, $namapengguna, $password, $idkelas, $idstate);
                                                $stmt->fetch();
                                                if (password_verify($_POST['password'], $password) and $idstate == 5) {

                                                    // Create sessions 
                                                    session_regenerate_id();
                                                    $_SESSION['loggedin'] = TRUE;
                                                    $_SESSION['idnip'] = $username;
                                                    header('Location: index.php');
                                                } elseif (password_verify($_POST['password'], $password) && $idstate == 1) {
                                                    // Create sessions 
                                                    session_regenerate_id();
                                                    $_SESSION['loggedin'] = TRUE;
                                                    $_SESSION['idnip'] = $username;
                                                    header('Location: webmin/index.php');
                                                } else {
                                                    echo 'Incorrect password!';
                                                }
                                            } else {
                                                echo 'Incorrect username!';
                                            }
                                            $stmt->close();
                                        }
                                    }
                                    ?>
                                    <form class="row g-3 needs-validation" method="post">

                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">NIP/NIK</label>
                                            <div class="input-group has-validation">
                                                <input type="text" name="user_name" class="form-control" id="yourUsername" required>
                                                <div class="invalid-feedback">Please enter your nip.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Kata Sandi</label>
                                            <input type="password" name="password" class="form-control" id="pass" required>
                                            <div class="invalid-feedback">Please enter your Sandi!</div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="chk">
                                                <label class="form-check-label" for="rememberMe">Tampilkan Sandi</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" name="submit" type="submit">Login</button>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="assets/js/showHide.js"></script>

</body>

</html>