<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

include "../../../config/koneksi.php";
include "../../../config/fungsi_seo.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET['module'];
$act=$_GET['act'];


// Hapus pengumuman
if ($module=='pengumuman' AND $act=='hapus'){
  $data=mysqli_fetch_array(mysqli_query($koneksi, "SELECT gambar FROM pengumuman WHERE id_pengumuman='$_GET[id]'"));
  if ($data['gambar']!=''){
  mysqli_query($koneksi, "DELETE FROM pengumuman WHERE id_pengumuman='$_GET[id]'");
     unlink("../../../foto_pengumuman/$_GET[namafile]");   
     unlink("../../../foto_pengumuman/small_$_GET[namafile]");   
  }
  else{
  mysqli_query($koneksi, "DELETE FROM pengumuman WHERE id_pengumuman='$_GET[id]'");  
  }
  header('location:../../media.php?module='.$module);
}

// Input pengumuman
elseif ($module=='pengumuman' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $tipe_file   = $_FILES['fupload']['type'];  $nama_file      = $_FILES['fupload']['name'];
  $name = strtolower(str_replace(" ","_",$nama_file));
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$name;$tema_seo = seo_title($_POST['tema']);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=pengumuman')</script>";
    }
    else{
    UploadAgenda($nama_file_unik);
    mysqli_query($koneksi, "INSERT INTO pengumuman(tema,
                                  tema_seo, 
                                  isi_pengumuman,                                  
                                  tgl_posting,                                  
                                  gambar, 
                                  username) 
					              VALUES('$_POST[tema]',
					              '$tema_seo', 
                                 '$_POST[isi_pengumuman]',
                                 '$tgl_sekarang',
                                 '$nama_file_unik',
                                 '$_SESSION[namauser]')");
  header('location:../../media.php?module='.$module);
  }
  }
  else{
    mysqli_query($koneksi, "INSERT INTO pengumuman(tema,
                                  tema_seo, 
                                  isi_pengumuman,
                                  tgl_posting,
                                  username) 
					                VALUES('$_POST[tema]',
					                       '$tema_seo', 
                                 '$_POST[isi_pengumuman]',
                                 '$tgl_sekarang',
                                 '$_SESSION[namauser]')");
  header('location:../../media.php?module='.$module);
  }
}

// Update pengumuman
elseif ($module=='pengumuman' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 


  $tema_seo = seo_title($_POST['tema']);

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
  mysqli_query($koneksi, "UPDATE pengumuman SET tema        = '$_POST[tema]',
                                 tema_seo    = '$tema_seo',
                                 isi_pengumuman  = '$_POST[isi_pengumuman]'
                           WHERE id_pengumuman   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  }
  else{
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=album')</script>";
    }
    else{
	
	$data_gambar = mysqli_query($koneksi, "SELECT gambar FROM pengumuman WHERE id_pengumuman='$_POST[id]'");
	$r    	= mysqli_fetch_array($data_gambar);
	@unlink('../../../foto_pengumuman/'.$r['gambar']);
	@unlink('../../../foto_pengumuman/'.'small_'.$r['gambar']);
    UploadAgenda($nama_file_unik,'../../../foto_pengumuman/',300,120);
	
  
    mysqli_query($koneksi, "UPDATE pengumuman SET tema      = '$_POST[tema]',
                                 tema_seo    = '$tema_seo',
                                 isi_pengumuman  = '$_POST[isi_pengumuman]', 
                                 gambar      = '$nama_file_unik',  
                           WHERE id_pengumuman   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  }
  }
}
}
?>
