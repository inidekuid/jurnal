<?php
include_once("adata.php");
$hari = date_to_day(date('Y-m-d'));
$nip  = $_GET['kg'];
$tp = $_GET['tp'];
$tp = $con->query("SELECT * FROM tahun_pelajaran WHERE IDTP='".$tp."'");
$rowtp = $tp->fetch_array();
$namaBulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
$a = $con->query("SELECT KODEGURU, NAMA FROM guru WHERE KODEGURU='" . $nip . "'");
$rs = $a->fetch_array();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cetak Rekap Personal atas Nama <?php echo $rs['NAMA']; ?></title>
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <meta name="googlebot-news" content="nosnippet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="assets/css/adminlte.min.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">

        <section class="invoice">

            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        <i class="fas fa-globe"></i>Rekap Personal Guru Mengajar SMAN 1 Jepara
                    </h2>
                </div>

            </div>

            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">

                    <address>
                        Nama Guru: <strong><?php echo $rs['NAMA']; ?></strong><br>
                        Tahun Pelajaran/Semester: <strong><?php echo $rowtp['KETERANGAN']; ?></strong>
                    </address>
                </div>

            </div>


            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th valign="center">Tanggal</th>
                                <th valign="center">Kelas</th>
                                <?php
                                $user = $data_user['STATE'];
                                switch ($user) {
                                    case 5:
                                        echo "<th valign='center'>Jam Ke</th>";
                                        break;
                                    default:
                                        break;
                                }
                                ?>
                                <th valign="center">Status</th>
                                <th valign="center">Mapel</th>
                                <th valign="center">Aktifitas</th>
                                <?php
                                $user = $data_user['STATE'];
                                switch ($user) {
                                    case 5:
                                        echo "<th valign='center'>Rencana Berikutnya</th>";
                                        break;
                                    default:
                                        break;
                                }
                                ?>
                                <th valign="center">Dokumentasi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $stmts = $con->query("SELECT kg.TANGGAL, rk.NAMA_KELAS, kg.JAMKE, rm.NAMA_MAPEL,kg.HADIR, kg.KETERANGAN, kg.PBL_SELANJUTNYA, kg.SWAFOTO
											FROM kehadiran_guru AS kg
                                            LEFT JOIN guru AS gr ON kg.KODEGURU=gr.KODEGURU
											LEFT JOIN ref_kelas AS rk on kg.KD_KELAS=rk.KD_KELAS
											LEFT JOIN ref_mapel AS rm on kg.KD_MAPEL=rm.KDMAPEL
											WHERE kg.KODEGURU='" . $nip . "' and kg.IDTP='" . $rowtp['IDTP'] . "' ORDER BY kg.TANGGAL ASC");
                            while ($data = $stmts->fetch_array()) {
                                echo "<tr><td>" . $data['TANGGAL'] . "</td><td>" . $data['NAMA_KELAS'] . "</td>
                        ";
                                switch ($user) {
                                    case '5':
                                        echo "<td>" . $data['JAMKE'] . "</td>";
                                        break;
                                    default:
                                        break;
                                };
                                echo  "<td>" . $data['HADIR'] . "</td>
                                <td>" . $data['NAMA_MAPEL'] . "</td>
                                <td>" . $data['KETERANGAN'] . "</td>";
                                switch ($user) {
                                    case '5':
                                        echo "<td>" . $data['PBL_SELANJUTNYA'] . "</td>";
                                        break;
                                    default:
                                        break;
                                };

                                echo "<td><img src='./upload_gambar/" . $data['SWAFOTO'] . "' width='75'</td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </section>

    </div>

    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>