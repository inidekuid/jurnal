<?php
ob_start();
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit();
}
include_once 'config/koneksi.php';
include_once 'config/library.php';
include_once 'config/fungsi_indotgl.php';
// query data user
$queryUser = $con->query("SELECT * FROM pengguna WHERE USER ='" . $_SESSION['idnip'] . "'");
$data_user = $queryUser->fetch_array();
//Qdata TA
$queryTp = $con->query("SELECT * FROM tahun_pelajaran WHERE AKTIF='yes'");
$data_tp = $queryTp->fetch_array();

//Qdata
//Qdata Guru 
$queryGuru = $con->query("SELECT * FROM guru ");
$data_guru = $queryGuru->fetch_array();