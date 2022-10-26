<?php
//panggil fungsi validasi xss dab injection
require_once('fungsi_validasi.php');
$server = "localhost";
$username = "root";
$password = "";
$database = "ppdb_online";
//koneksi dan memilih database di server
mysql_connect($server, $username, $password) or die("Koneksi Gagal");
mysql_select_db($database) or die("Database tidak dapat di buka");
//buat variable untuk validasi dari file fungsi_validasi.php
$val = new validasi;
?>