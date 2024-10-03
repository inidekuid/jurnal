<?php
date_default_timezone_set('Asia/Jakarta');
/**
 * Namafile : koneksi.php 
 * ----------------------------*/
define('_HOST_NAME', 'localhost'); // alamat server database default localhost
define('_DATABASE_NAME', 'jurnal'); // nama database
define('_DATABASE_USER_NAME', 'root'); //  username database
define('_DATABASE_PASSWORD', ''); // password database

$con = new mysqli(_HOST_NAME, _DATABASE_USER_NAME, _DATABASE_PASSWORD, _DATABASE_NAME);
if ($con->connect_errno) {
    die("ERROR : -> " . $con->connect_error);
    $con->set_charset("utf8mb4");
}
