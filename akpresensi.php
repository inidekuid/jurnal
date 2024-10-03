<?php
if (isset($_POST['simpan'])) {
    $iduser = $_POST['id'];
    $idtapel = $_POST['tapel'];
    $kguru = $_POST['nip'];
    $kelas = $_POST['kelas'];
    $mapel = $_POST['mapel'];
    $date = $_POST['date'];
    $kehadiran = $_POST['kehadiran'];
    $img = $_POST['image'];
    $folderPath = "upload_gambar/";

    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];

    $image_base64 = base64_decode($image_parts[1]);
    $fileName = uniqid() . '.png';

    $file = $folderPath . $fileName;

    $keterangan = $_POST['keterangan'];
    $jam = $_POST['jamke'];
    if (empty($kguru)  || empty($mapel) || empty($date)) {
        echo "<div class='alert alert-warning'>Isian Tidak Lengkap</div>";
    } elseif (!isset($kehadiran)) {
        echo "<div class='alert alert-warning'>Isian Isian Status kehadiran belum dipilih</div>";
    } elseif (($kehadiran == 'A') and !isset($_POST['tugas'])) {
        echo "<div class='alert alert-warning'>Isian Tugas belum dipilih</div>";
    } else {
        $tugas = $_POST['tugas'];
        $numcek = $con->query("SELECT * FROM `kehadiran_guru` WHERE `KODEGURU`='$guru' AND `JAMKE`='" . $jam[$i] . "' AND `TANGGAL`='$date' AND `KD_KELAS`='$kelas'");
        $numrow = $numcek->num_rows;
        if ($numrow > 0) {
            echo "<div class='alert alert-warning'>Input Tidak diperbolehkan karena sudah pernah diinput!!</div>";
        } else {
            file_put_contents($file, $image_base64);
            $q = $con->query("INSERT into kehadiran_guru(IDTP,KODEGURU,KD_KELAS,TANGGAL,KD_MAPEL,HADIR,TUGAS,KETERANGAN,SWAFOTO,IDP) 
					VALUES('$idtapel','$kguru','$kelas','$date','$mapel','$kehadiran','$tugas','$keterangan','$fileName','$iduser')");
        }
        if ($q) {
            echo "<div class='alert alert-success'>INPUT DATA BERHASIL</div>";
        } else {
            echo "<div class='alert alert-danger'>Input Gagal!!</div>";
        }
    }
}
