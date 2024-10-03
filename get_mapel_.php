<?php
include_once 'config/koneksi.php';
$nip = $_POST['nip'];
$kdkelas = $_POST['kelas'];

echo "<option value=''>Pilih Mapel</option>";

//$query = "SELECT * FROM re WHERE id_kab=? ORDER BY nama ASC";
$querys = "SELECT gg.KDMAPEL, rm.NAMA_MAPEL 
FROM `guru_mengajar` gg
LEFT JOIN ref_mapel rm ON rm.KDMAPEL=gg.KDMAPEL
WHERE gg.KD_KELAS='" . $kdkelas . "' and gg.KODEGURU='" . $nip . "' GROUP BY gg.KDMAPEL";
$c = $con->query($querys);
while ($row = $c->fetch_array()) {
    echo "<option value='" . $row['KDMAPEL'] . "'>" . $row['NAMA_MAPEL'] . "</option>";
}
