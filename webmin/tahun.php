<?php
include_once("promp.php");
$hari = date_to_day(date('Y-m-d'));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - Sispendik</title>
    <meta content="" name="Sistem informasi pendidikan">
    <meta content="" name="sispendi, sma, smk">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">Sispendik</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>Kevin Anderson</h6>
                            <span>Web Designer</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php
    include "_komponen/menu.php";
    ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Tahun Pelajaran</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Tahun Pelajaran</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">


                        <!-- Recent Sales -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">

                                <div class="card-body">
                                    <h5 class="card-title">Data Tahun-Semester<span> | TP <?php echo $data_tp['KETERANGAN'] ?></span></h5>
                                    <!-- start Modal-->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahtahun">
                                        <i class="bi bi-plus-square"></i> Tambah Baru
                                    </button>
                                    <div class="modal fade" id="tambahtahun" tabindex="-1" data-bs-backdrop="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Tahun Pelajaran Baru!</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="row g-3" method="post" id="insert_tahun">
                                                        <div class="col-12">
                                                            <label for="inKode" class="form-label">KODE TAHUN PELAJARAN</label>
                                                            <input type="text" class="form-control" name="inKode" id="inKode">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="inIsial" class="form-label">INISIAL TAHUN PELAJARAN</label>
                                                            <input type="text" class="form-control" name="inIsial" id="inIsial">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="inState" class="form-label">STATUS AKTIF</label>
                                                            <select id="inState" name="inState" class="form-select">
                                                                <option selected>Status Aktif</option>
                                                                <option value="yes">Yes</option>
                                                                <option value="no">No</option>
                                                            </select>
                                                        </div>
                                                        <div
                                                            class="text-center">
                                                            <input type="hidden" name="inkd" id="inkd" />
                                                            <button type="submit" id="tambahkan" name="tambahkan" class="btn btn-primary"><i class="bi bi-save2"></i> Simpan Data</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <code>Cek dulu kode tahun pelajaran yang sudah tersedia!</code>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- End Modal-->
                                    <div id="tahunpelajaran_tb">

                                        <table class="table table-borderless datatable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">KODE</th>
                                                    <th scope="col">TAHUN PELAJARAN</th>
                                                    <th scope="col">STATUS</th>
                                                    <th scope="col">Aktifitas</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $stmts = $con->query("SELECT * FROM tahun_pelajaran ORDER BY IDTP ASC");
                                                while ($data = $stmts->fetch_array()) {
                                                    echo "<tr><th scope='row'>" . $data['IDTP'] . "</th>
                                                    <td>" . $data['KETERANGAN'] . "</td>
                                                    <td>" . $data['AKTIF'] . "</td>
                                                    ";
                                                    echo  "<td><a href='tahun_edit.php?id=" . $data['IDTP'] . "' id='" . $data['IDTP'] . "' class='badge bg-success edit_data'><i class='bi bi-pencil-square'></i> ubah</a></td></tr>";
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>
                        </div><!-- End Recent Sales -->

                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>SMAN 1 Jepara</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/quill/quill.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>
        $(document).ready(function() {
            $('#add').click(function() {
                $('#tambahkan').val("Inserting");
                $('#insert_tahun')[0].reset();
            });
            $(document).on('click', '.edit_data', function() {
                let idkd = $(this).attr("id");
                $.ajax({
                    url: "tahun_fetch.php",
                    method: "POST",
                    data: {
                        inkd: inkd
                    },
                    dataType: "JSON",
                    success: function(data) {
                        $("#inKode").val(data.IDTP);
                        $("#inIsial").val(data.KETERANGAN);
                        $("#inState").val(data.AKTIF);
                        $("inkd").val(data.IDTP);
                        $("#tambahkan").val("Update");
                        $("#insert_tahun").modal('show');

                    }
                });
            });
            $('#insert_tahun').on("submit", function(event) {
                event.preventDefault();
                if ($('#inKode').val() == "") {
                    alert("Kode Tahun is required");
                } else if ($('#inIsial').val() == '') {
                    alert("Inisial Tahun is required");
                } else if ($('#inState').val() == '') {
                    alert("Status Aktif is required");
                } else {
                    $.ajax({
                        url: "tahun_insert.php",
                        method: "POST",
                        data: $('#insert_tahun').serialize(),
                        beforeSend: function() {
                            $('#tambahkan').val("Inserting");
                        },
                        success: function(data) {
                            $('#insert_tahun')[0].reset();
                            $('#tambahtahun').modal('hide');
                            $('#tahunpelajaran_tb').html(data);
                        }
                    });
                }
            });
        });
    </script>

</body>

</html>