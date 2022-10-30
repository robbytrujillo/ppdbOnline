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




// Input sub sidebar
if ($module=='sidebar' AND $act=='input'){
    mysqli_query($koneksi, "INSERT INTO sidebar(nama_sidebar,
								  code,
								  posisi,
                                  aktif)
                            VALUES('$_POST[nama_sidebar]',
									'$_POST[code]',
                                   '$_POST[posisi]',
                                   '$_POST[aktif]')");
  header('location:../../media.php?module='.$module);
}

// Update sub sidebar
elseif ($module=='sidebar' AND $act=='update'){
    mysqli_query($koneksi, "UPDATE sidebar SET   nama_sidebar = '$_POST[nama_sidebar]',
									code = '$_POST[code]',
									posisi = '$_POST[posisi]',
                                   aktif  = '$_POST[aktif]'
                             WHERE id_sidebar   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
