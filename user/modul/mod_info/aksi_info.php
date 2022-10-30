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
include "../../../config/fungsi_seo.php";

$module=$_GET['module'];
$act=$_GET['act'];


// Hapus info
if ($module=='info' AND $act=='hapus'){
  $data=mysqli_fetch_array(mysqli_query($koneksi, "SELECT gambar FROM info WHERE id_info='$_GET[id]'"));
  if ($data[gambar]!=''){
     mysqli_query($koneksi, "DELETE FROM info WHERE id_info='$_GET[id]'");
     unlink("../../../foto_statis/$_GET[namafile]");   
     unlink("../../../foto_statis/small_$_GET[namafile]");   
  }
  else{
     mysqli_query($koneksi, "DELETE FROM info WHERE id_info='$_GET[id]'");
  }
  header('location:../../media.php?module='.$module);
}


// Input info
elseif ($module=='info' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];  $nama_file      = $_FILES['fupload']['name'];
  $name = strtolower(str_replace(" ","_",$nama_file));
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$name;$judul_seo      = seo_title($_POST[judul]);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadStatis($nama_file_unik);

   mysqli_query($koneksi, "INSERT INTO info(judul,
	                                       judul_seo,
										   isi_info,
										   tgl_posting,
										   gambar,
										   username,
										     dibaca,
										      jam,
											  hari) 
									VALUES('$_POST[judul]',
										   '$judul_seo', 
										   '$_POST[isi_info]',
										   '$tgl_sekarang',
										   '$nama_file_unik',
										   '$_SESSION[namauser]',
										   '$_POST[dibaca]', 
										     '$jam_sekarang',
										    '$hari_ini')");
  header('location:../../media.php?module='.$module);
  }
  else{
   mysqli_query($koneksi, "INSERT INTO info(judul,
	                                       judul_seo,
										   isi_info,
										   tgl_posting,
										   username,
										     dibaca,
										      jam,
											  hari) 
									VALUES('$_POST[judul]',
										   '$judul_seo', 
										   '$_POST[isi_info]',
										   '$tgl_sekarang',
										   '$_SESSION[namauser]',
										   '$_POST[dibaca]', 
										     '$jam_sekarang',
										    '$hari_ini')");
  header('location:../../media.php?module='.$module);
  }
}
// Update info
elseif ($module=='info' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];  $nama_file      = $_FILES['fupload']['name'];
  $name = strtolower(str_replace(" ","_",$nama_file));
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$name;$judul_seo      = seo_title($_POST[judul]);

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysqli_query($koneksi, "UPDATE info SET judul        = '$_POST[judul]',
                                        judul_seo    = '$judul_seo',
                                        isi_info  = '$_POST[isi_info]'  
                                  WHERE id_info   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  }
  else{
   $data_gambar = mysqli_query($koneksi, "SELECT gambar FROM info WHERE id_info='$_POST[id]'");
	$r    	= mysqli_fetch_array($data_gambar);
	@unlink('../../../foto_statis/'.$r['gambar']);
	@unlink('../../../foto_statis/'.'small_'.$r['gambar']);
    UploadStatis($nama_file_unik ,'../../../foto_statis/');
    mysqli_query($koneksi, "UPDATE info SET judul        = '$_POST[judul]',
                                          judul_seo    = '$judul_seo',
                                          isi_info  = '$_POST[isi_info]',
                                          gambar       = '$nama_file_unik'   
                                    WHERE id_info   = '$_POST[id]'");
    header('location:../../media.php?module='.$module);
  }
}
}
?>
