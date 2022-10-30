<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus halaman statis
if ($module=='hasil_tes' AND $act=='hapus'){
 
     mysqli_query($koneksi, "DELETE FROM hasil_tes WHERE id_hasil='$_GET[id]'");

  header('location:../../media.php?module='.$module);
}

// Input halaman statis
elseif ($module=='hasil_tes' AND $act=='input'){
$total = $_POST[skhun] + $_POST[tulis] + $_POST[wawancara];
    mysqli_query($koneksi, "INSERT INTO hasil_tes(id_pendaftaran,
                                    skhun,
									tulis,
                                    wawancara,
									total) 
                            VALUES('$_POST[id_pendaftaran]',
                                   '$_POST[skhun]',
                                   '$_POST[tulis]',
								   '$_POST[wawancara]',
								   '$total')");
mysqli_query($koneksi, "UPDATE pendaftaran SET status       = 'S' 
                                    WHERE id_pendaftaran  = '$_POST[id_pendaftaran]'");
  header('location:../../media.php?module='.$module);
  
}

// Update halaman statis
elseif ($module=='hasil_tes' AND $act=='update'){
$total = $_POST[skhun] + $_POST[tulis] + $_POST[wawancara];
    mysqli_query($koneksi, "UPDATE hasil_tes SET skhun = '$_POST[skhun]',
										  tulis = '$_POST[tulis]',
                                          wawancara = '$_POST[wawancara]',  
										  total = '$total'
                                    WHERE id_hasil  = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  }
 }
?>
