<?php
include_once("adata.php");
$hari = date_to_day(date('Y-m-d'));
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil - Jurnal Mengajar Guru SMAN 1 Jepara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/beranda.css">

</head>

<body>
    <!--body-->
    <main class="container">
        <h2>Akun</h2>
        <ul class="list-group list-group-flush">
            <a href="presensi_arsip.php" class="text-decoration-none">
                <li class="list-group-item"><i class="bi bi-archive"></i> Arsip</li>
            </a>

        </ul>
		<ul class="list-group list-group-flush">
            <a href="akeluar.php" class="text-decoration-none">
                <li class="list-group-item"><i class="bi bi-box-arrow-right"></i> Keluar</li>
            </a>

        </ul>
    </main>
    <!-- navbar bottom -->
    <?php include_once("_komponen/navbar_bottom.php") ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>