<?php 
  if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip'))

        ob_start();
  session_start();
  // Panggil semua fungsi yang dibutuhkan (semuanya ada di folder config)
  	include "config/koneksi.php";//koneksi ke database
	include "config/class_paging.php";//fungsi untuk membuat halaman
	include "config/fungsi_combobox.php";//fungsi mengatu combo box
	include "config/library.php";
  	include "config/fungsi_autolink.php";//Membuat Auto LInk
  	include "config/fungsi_badword.php";//Mananggkal Kata - kata kotor pada komentar
  	include "config/fungsi_indotgl.php";//Membuat kalender
 	include "template.php"; 
   $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
              $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
              $waktu   = time(); // 

              // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
              $s = mysqli_query($koneksi, "SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
              // Kalau belum ada, simpan data user tersebut ke database
              if(mysqli_num_rows($s) == 0){
                mysqli_query($koneksi, "INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
              } 
              else{
                mysqli_query($koneksi, "UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
              }
?>
