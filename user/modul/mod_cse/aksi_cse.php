<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET['module'];
$act=$_GET['act'];


// Update cse
if ($module=='cse' AND $act=='update'){
	$box = addslashes($_POST[search_box]);
	$result= addslashes($_POST[search_result]);
   mysqli_query($koneksi, "UPDATE cse SET search_box       = '$box',
	                            search_result   = '$result' 
                                WHERE id_cse   = '$_POST[id]'");

  header('location:../../media_non.php?module='.$module);
}
}
?>
