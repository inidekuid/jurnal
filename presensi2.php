<?php
include_once("adata.php");
$hari = date_to_day(date('Y-m-d'));
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Guru BK - Jurnal Mengajar Guru SMAN 1 Jepara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/presensi.css">


</head>

<body>
    <!--body-->
    <div class="container ">
        <div class="alert alert-info text-center">Lengkapi isian jurnal Aktifitas pembelajaran dan jangan lupa untuk melakukan swafoto
            <br /><code><?php echo $hari . ", " . tgl_indo(date("Y-m-d")) ?></code>
        </div>
        <form action="" method="post" id="presensi1" autocomplete="off" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $data_user['IDP']; ?>">
            <input type="hidden" id="nip" name="nip" value="<?php echo $data_user['USER']; ?>">
            <input type="hidden" name="tapel" value="<?php echo $data_tp['IDTP']; ?>">

            <div class="mb-3">
                <label for="kelas" class="form-label">KELAS<code>*</code></label>
                <select id="kelas" name="kelas" class="form-select" required>
                    <option value=""> -- PILIH KELAS --</option>
                    <?php
                    $c = $con->query("SELECT rk.NAMA_KELAS, rk.KD_KELAS
                                        FROM guru_mengajar AS gj
                                        LEFT JOIN ref_kelas AS rk ON rk.`KD_KELAS`= gj.`KD_KELAS`
                                        WHERE gj.`KODEGURU`='" . $data_user['USER'] . "' group by gj.KD_KELAS");
                    while ($crow = $c->fetch_array()) {
                        echo "<option value=" . $crow['KD_KELAS'] . ">" . $crow['NAMA_KELAS'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="mapel" class="form-label">MAPEL <code>*</code></label>
                <select name="mapel" id="mapele" class="form-select" required>
                    <option value=""></option>
                </select>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">TANGGAL <code>*</code></label>
                <input name="date" id="datepicker" required>
            </div>
            <div class="mb-3">
                <label for="kehadiran" class="form-label">JENIS BIMBINGAN <code>*</code></label>
                <div class="col-sm-8 radios">
                    <label class="radio-inline"><input type="radio" name="kehadiran" value="K"> &nbsp;KELOMPOK</label> &nbsp;
                    <label class="radio-inline"><input type="radio" name="kehadiran" value="I"> &nbsp;INDIVIDU</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">AKTIFITAS PEMBELAJARAN <code>*</code></label>
                <textarea name="pblsaatini" class="form-control" rows="5" placeholder="Masukkan aktifitas pembelajaran yang dilakukan dikelas" required></textarea>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">SWAFOTO</label>
                <div id="v_kamera" width="100"></div>
                <input type=button value="Ambil swafoto" onClick="take_swafoto()" required>
                <input type="hidden" name="image" id="image-tag">
            </div>
            <div class="mb-3">
                <div id="result">preview</div>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit" name="simpan">Simpan Kehadiran</button>
            </div>

        </form>

    </div>
    <!-- navbar bottom -->
    <?php include_once("_komponen/navbar_bottom.php") ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
    <?php
    if (isset($_POST['simpan'])) {
        $iduser = $_POST['id'];
        $idtapel = $_POST['tapel'];
        $kguru = $_POST['nip'];
        $kelas = $_POST['kelas'];
        $mapel = $_POST['mapel'];
        $date = $_POST['date'];
        $kehadiran = $_POST['kehadiran'];
        $pbltoday = $_POST['pblsaatini'];
        $img = $_POST['image'];
        $folderPath = "upload_gambar/";
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';
        $file = $folderPath . $fileName;
		$logdate = date('Y-m-d H:i:s');
		
       	file_put_contents($file, $image_base64);
        $queryinput = $con->query("INSERT into kehadiran_guru(IDTP,KODEGURU,KD_KELAS,TANGGAL,KD_MAPEL,HADIR,KETERANGAN,SWAFOTO,IDP,LOG_DATE) 
    			VALUES('$idtapel','$kguru','$kelas','$date','$mapel','$kehadiran','$pbltoday','$fileName','$iduser','$logdate')");

			echo "<script>Swal.fire('Data sudah berhasil disimpan, tekan OK untuk lihat rekap.').then(function(){window.location.href = './rekap.php';});</script>";
        
    }
    ?>
    <script>
        Webcam.set({
            width: 320,
            height: 430,
            image_format: 'png',
            jpeg_quality: 90
        });

        Webcam.attach('#v_kamera');

        function take_swafoto() {
            Webcam.snap(function(data_uri) {
                $("#image-tag").val(data_uri);
                document.getElementById('result').innerHTML = '<img id="img-result" src="' + data_uri + '"/>';
            });
        }

        $("#kelas").change(function() {
            let kelas = $("#kelas").val();
            let nip = $("#nip").val();
            $.ajax({
                type: 'POST',
                url: "get_mapel_.php",
                data: {
                    kelas: kelas,
                    nip: nip
                },
                cache: false,
                success: function(msg) {
                    $("#mapele").html(msg);
                }
            });
        });

        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap5',
            format: 'yyyy-mm-dd'
        });
    </script>
    <script>
        document.getElementById('presensi1').onsubmit = function(e) {
			/* var radios = document.getElementsByName("kehadiran");
            if ((!radios[0].checked || !radios[1].checked)) {
                Swal.fire('Jenis Bimbingan belum diisi!');
                e.preventDefault();
                return false;
            } */
            let elemdiv = document.querySelector("#result").innerHTML;
            if (elemdiv == "preview") {
                Swal.fire('Anda belum melakukan swafoto');
                e.preventDefault();
                return false;
            }
        }
    </script>
</body>

</html>