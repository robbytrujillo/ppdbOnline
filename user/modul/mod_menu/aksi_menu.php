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


// Hapus sub menu
if ($module=='menu' AND $act=='hapus'){
  mysqli_query($koneksi, "DELETE FROM menu WHERE id_menu='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input sub menu
elseif ($module=='menu' AND $act=='input'){
    mysqli_query($koneksi, "INSERT INTO menu(nama_menu,
								  atribut,
                                  link, 
								  parent)
                            VALUES('$_POST[nama_menu]',
                                   '$_POST[atribut]',
                                   '$_POST[link]',
								   '$_POST[jenis]')");
  header('location:../../media.php?module='.$module);
}

// Update sub menu
elseif ($module=='menu' AND $act=='update'){
    mysqli_query($koneksi, "UPDATE menu SET   nama_menu = '$_POST[nama_menu]',
									atribut = '$_POST[atribut]',
                                   link  = '$_POST[link]',
								  parent = '$_POST[jenis]',
								  aktif = '$_POST[aktif]'
                             WHERE id_menu   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
