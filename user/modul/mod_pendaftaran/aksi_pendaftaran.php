<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];



// Update Pendafataran
if ($module=='pendaftaran' AND $act=='update'){

  mysqli_query($koneksi, "UPDATE pendaftaran SET nama = '$_POST[nama]',
                               		tempat  = '$_POST[tempat]',
							   		tgl_lahir  = '$_POST[tanggal_lahir]',
							   		jenis_kelamin = '$_POST[jenis_kelamin]',
							   		agama = '$_POST[agama]',
							   		asal_sekolah  = '$_POST[asal_sekolah]',	
									alamat = '$_POST[alamat]',
							   		wali = '$_POST[wali]',
							   		email = '$_POST[email]',
							   		telp = '$_POST[telp]'
                          WHERE id_pendaftaran   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
