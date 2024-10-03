<?php
include_once("adata.php");
$hari = date_to_day(date('Y-m-d'));
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rekap - Jurnal Mengajar Guru SMAN 1 Jepara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/presensi.css">

</head>

<body>
    <!--body-->
    <div class="container">
        <div class="alert alert-info text-center">Halaman ini memuat data isian aktifitas pembelajaran bapak/ibu dikelas atau saat meninggalkan tugas karena berhalangan hadir dikelas.</div>
        <div class="col-lg">
			<div class="col-lg-12 mb-">
				<form action="rekapguru_ind_cetak.php" method="post">
				<input type="hidden" name="guru" value="<?php echo $_SESSION['idnip']?>">
					<div class="input-group">
					  <span class="input-group-text">Masukkan Rentang Tanggal Cetak</span>
					  <input type="text" name="date1" id="datepicker" placeholder="Tanggal Awal" aria-label="First name" class="form-control">
					  <input type="text" name="date2" id="datepicker2" placeholder="Tanggal Akhir" aria-label="Last name" class="form-control">
					</div>
					
					<div class="d-grid gap-2">
						<button class="btn btn-primary" type="submit" name="simpan" formtarget="_blank">Cetak Rekap</button>
					</div>
				</form>
						
			</div>
            <table id="rekap" class="table table-striped nowrap" style="width:100%">
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
											WHERE kg.KODEGURU='" . $_SESSION['idnip'] . "' and kg.IDTP='".$data_tp['IDTP']."' ORDER BY kg.TANGGAL ASC");
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
    <!-- navbar bottom -->
    <?php include_once("_komponen/navbar_bottom.php") ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
	<script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        new DataTable('#rekap', {
            responsive: true
        });
		
		$('#datepicker').datepicker({
            uiLibrary: 'bootstrap5', 
			iconsLibrary: 'materialicons',
            format: 'yyyy-mm-dd'
        });
		$('#datepicker2').datepicker({
            uiLibrary: 'bootstrap5', 
			iconsLibrary: 'materialicons',
            format: 'yyyy-mm-dd'
        });
		
    </script>
</body>

</html>