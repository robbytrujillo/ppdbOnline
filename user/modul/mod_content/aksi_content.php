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




// Input sub content
if ($module=='content' AND $act=='input'){
    mysqli_query($koneksi, "INSERT INTO content(nama_content,
								  code,
								  posisi,
                                  aktif)
                            VALUES('$_POST[nama_content]',
									'$_POST[code]',
                                   '$_POST[posisi]',
                                   '$_POST[aktif]')");
  header('location:../../media.php?module='.$module);
}

// Update sub content
elseif ($module=='content' AND $act=='update'){
    mysqli_query($koneksi, "UPDATE content SET   nama_content = '$_POST[nama_content]',
									code = '$_POST[code]',
									posisi = '$_POST[posisi]',
                                   aktif  = '$_POST[aktif]'
                             WHERE id_content   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
