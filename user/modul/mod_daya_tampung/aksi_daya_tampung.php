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
if ($module=='daya_tampung' AND $act=='hapus'){
  $data=mysqli_fetch_array(mysqli_query($koneksi, "SELECT gambar FROM daya_tampung WHERE id_halaman='$_GET[id]'"));
  if ($data['gambar']!=''){
     mysqli_query($koneksi, "DELETE FROM daya_tampung WHERE id_halaman='$_GET[id]'");
     unlink("../../../foto_banner/$_GET[namafile]");   
  }
  else{
     mysqli_query($koneksi, "DELETE FROM daya_tampung WHERE id_halaman='$_GET[id]'");
  }
  header('location:../../media.php?module='.$module);
}

// Input halaman statis
elseif ($module=='daya_tampung' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file   = $_FILES['fupload']['name'];
  
  $link_statis  = trim(strtolower($_POST[judul]));

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=banner')</script>";
    }
    else{
    UploadBanner($nama_file);
    mysqli_query($koneksi, "INSERT INTO daya_tampung(judul,
                                    isi_halaman,
                                    tgl_posting,
                                    gambar) 
                            VALUES('$_POST[judul]',
                                   '$_POST[isi_halaman]',
                                   '$tgl_sekarang',
                                   '$nama_file')");
  header('location:../../media.php?module='.$module);
  }
  }
  else{
    mysqli_query($koneksi, "INSERT INTO daya_tampung(judul,
                                    isi_halaman,
                                    tgl_posting) 
                            VALUES('$_POST[judul]',
                                   '$_POST[isi_halaman]',
                                   '$tgl_sekarang')");
  header('location:../../media.php?module='.$module);
  }
}

// Update halaman statis
elseif ($module=='daya_tampung' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysqli_query($koneksi, "UPDATE daya_tampung SET kapasitas       = '$_POST[kapasitas]',
                                          nilai_minimal = '$_POST[nilai_minimal]'
                                    WHERE id_daya_tampung  = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  }
  else{
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=banner')</script>";
    }
    else{  
    UploadBanner($nama_file);
    mysqli_query($koneksi, "UPDATE daya_tampung SET judul       = '$_POST[judul]',
                                          isi_halaman = '$_POST[isi_halaman]',
                                          gambar      = '$nama_file'   
                                    WHERE id_halaman  = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  }
  }
}
}
?>
