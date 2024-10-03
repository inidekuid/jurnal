<?php
include_once("adata.php");
$hari = date_to_day(date('Y-m-d'));
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jurnal Mengajar Guru SMAN 1 Jepara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/beranda.css">

</head>

<body>
    <!--body-->
    <main class="container">
        <div class=" mt-1 mb-4 p-3 d-flex justify-content-center">
            <div class="card p-2">
                <div class=" image d-flex flex-column justify-content-center align-items-center text-center"> <button class="btn btn-secondary"> <i class="bi bi-person-circle" style="font-size: 5rem; color: rgb(207, 217, 236);"></i></button> <span class="name mt-3"><?php echo $data_user['NAMAPENGGUNA'] ?></span> <span class="number"><?php echo $data_user['USER'] ?></span>
                    <div class=" d-flex mt-2"> <button class="btn1 btn-dark">TA Aktif</button> </div>
                    <div class="text mt-3"> <span><?php echo $data_tp['KETERANGAN'] ?></span> </div>
                    <div class=" px-2 rounded mt-4 date "> <span class="join"><?php echo $hari . ", " . tgl_indo(date("Y-m-d")) ?></span> </div>
                </div>
            </div>
        </div>
    </main>
    <!-- navbar bottom -->
    <?php include_once("_komponen/navbar_bottom.php") ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>