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




// Update tagline
	if ($module=='tagline' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysqli_query($koneksi, "UPDATE tagline SET judul     = '$_POST[judul]'
                             		WHERE id_tagline = '$_POST[id]'");
  }
  else{
    
	$data_gambar = mysqli_query($koneksi, "SELECT gambar FROM tagline WHERE id_tagline='$_POST[id]'");
	$r    	= mysqli_fetch_array($data_gambar);
	@unlink('../../../foto_tagline/'.$r['gambar']);
	Uploadtagline ($nama_file);
	
    mysqli_query($koneksi, "UPDATE tagline SET judul     = '$_POST[judul]',
                                   gambar    = '$nama_file'   
                             WHERE id_tagline = '$_POST[id]'");
  }
  header('location:../../media.php?module='.$module);
}
}
?>
