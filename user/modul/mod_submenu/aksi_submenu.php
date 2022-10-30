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


// Hapus sub submenu
if ($module=='submenu' AND $act=='hapus'){
  mysqli_query($koneksi, "DELETE FROM submenu WHERE id_sub='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input sub submenu
elseif ($module=='submenu' AND $act=='input'){
    mysqli_query($koneksi, "INSERT INTO submenu(nama_sub,
								  id_menu,
                                  link_sub)
                            VALUES('$_POST[nama_sub]',
                                   '$_POST[id_menu]',
                                   '$_POST[link]')");
  header('location:../../media.php?module='.$module);
}

// Update sub submenu
elseif ($module=='submenu' AND $act=='update'){
    mysqli_query($koneksi, "UPDATE submenu SET  nama_sub = '$_POST[nama_sub]',
									id_menu = '$_POST[id_menu]',
                                  link_sub  = '$_POST[link_sub]',
								  aktif = '$_POST[aktif]'
                             WHERE id_sub   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
