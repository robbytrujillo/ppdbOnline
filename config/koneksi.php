<?php
//panggil fungsi validasi xss dab injection
// require_once('fungsi_validasi.php');
// $server = "localhost";
// $username = "root";
// $password = "";
// $database = "ppdb_online";
//koneksi dan memilih database di server
// mysql_connect($server, $username, $password) or die("Koneksi Gagal");
// mysql_select_db($database) or die("Database tidak dapat di buka");
//buat variable untuk validasi dari file fungsi_validasi.php
// $val = new validasi;



// panggil fungsi validasi xss dan injection
// require_once('fungsi_validasi.php');

$db['host'] = "localhost"; //host
$db['user'] = "root"; //username database
$db['pass'] = ""; //password database
$db['name'] = "ppdb_online"; //nama database
 
$koneksi = mysqli_connect($db['host'], $db['user'], $db['pass'], $db['name']);
// buat variabel untuk validasi dari file fungsi_validasi.php
$val = new Robbyvalidasi;

function anti_injection($data){
  global $koneksi;
  $filter = mysqli_real_escape_string($koneksi, stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}
?>