<?php
  	if ($_GET['module']=='home'){?>
	<!-- breaking-news -->
	<div class="breaking-news">
	<div class="breaking-title"><span class="breaking-icon">&nbsp;</span><b>Sekilas Info</b><div class="the-corner"></div></div>
	<div class="breaking-block">
    <ul>
    <?php
	$sql   = "SELECT * FROM berita WHERE headline='N' AND breaking_news='Y' ORDER BY id_berita DESC LIMIT 5";	
	$hasil = mysqli_query($koneksi, $sql);		
	while($r=mysqli_fetch_array($hasil)){
	$isi_berita = htmlentities(strip_tags($r['isi_berita'])); // membuat paragraf pada isi berita dan mengabaikan tag html
    $isi = substr($isi_berita,0,100); // ambil sebanyak 220 karakter
    $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat
	echo"<li><a href='berita-$r[judul_seo].html'>$r[judul]</a><span>$isi ...</span></li>";
	}
	?>
	</ul>
	</div>
	<div class="breaking-controls"><a href="#" class="breaking-arrow-left">&nbsp;</a>
    <a href="#" class="breaking-arrow-right">&nbsp;</a><div class="clear-float"></div><div class="the-corner"></div></div>
	<!-- END .breaking-news -->
	</div>
    
    <!-- BEGIN .main-content-left -->
	<div class="main-content-left">
	<?php
	//Pengaturan Layout Content Sebelah Kiri 
	$content=mysqli_query($koneksi, "SELECT * FROM content WHERE aktif='Y' ORDER BY posisi");  
	while($c=mysqli_fetch_array($content)){
	include "content/$c[code]";
	}
	?>

	<!-- END .main-content-left -->
	</div>
    <?php 
  }
    // DETAIL BERITA////////////////////////////////////////////
  elseif ($_GET['module']=='cse'){
  include "modul/mod_google/hasilpencarian.php";}
  // DETAIL BERITA////////////////////////////////////////////
  elseif ($_GET['module']=='detailberita'){
  include "modul/mod_berita/detailberita.php";}
  //////////////////////////////////////////////////////////// 
  // CARI BERITA ////////////////////////////////////////////
  elseif ($_GET['module']=='hasilcari'){
  include "modul/mod_berita/hasilcari.php";}
  ////////////////////////////////////////////////////////////
  // SEMUA BERITA ////////////////////////////////////////////
  elseif ($_GET['module']=='semuaberita'){
  include "modul/mod_berita/semuaberita.php";}
  ////////////////////////////////////////////////////////////
  // SEMUA VIDEO ////////////////////////////////////////////
  elseif ($_GET['module']=='semuavideo'){
  include "modul/mod_berita/semuavideo.php";}
  ////////////////////////////////////////////////////////////
  // SEMUA Artikel ////////////////////////////////////////////
  elseif ($_GET['module']=='semuaartikel'){
  include "modul/mod_berita/semuaartikel.php";}
  ////////////////////////////////////////////////////////////
   // SEMUA Artikel ////////////////////////////////////////////
  elseif ($_GET['module']=='semuakarya'){
  include "modul/mod_berita/semuakarya.php";}
  ////////////////////////////////////////////////////////////
  // DETAIL AGENDA ////////////////////////////////////////////
  elseif ($_GET['module']=='detailagenda'){
  include "modul/mod_agenda/detailagenda.php";}
  /////////////////////////////////////////////////////////////
    // Info PPDB ////////////////////////////////////////////
  elseif ($_GET['module']=='infoppdb'){
  include "modul/mod_infoppdb/infoppdb.php"; }
  /////////////////////////////////////////////////////////////
   // Daftar Blog Siswa ////////////////////////////////////////////
  elseif ($_GET['module']=='daftarblog'){
  include "modul/mod_daftarblog/daftarblog.php"; }
  /////////////////////////////////////////////////////////////
     // Simpan Pendaftaran PPDB ////////////////////////////////////////////
  elseif ($_GET['module']=='aksipendaftaran'){
  include "modul/mod_formpendaftaran/aksipendaftaran.php"; }
  /////////////////////////////////////////////////////////////
  // VIDEO ////////////////////////////////////////////
  elseif ($_GET['module']=='play'){
  include "modul/mod_video/play.php";}
  /////////////////////////////////////////////////////////////

  // PLAYLIST VIDEO ////////////////////////////////////////////
  elseif ($_GET['module']=='semuaplaylist'){
  include "modul/mod_playlist/semuaplaylist.php";}
  /////////////////////////////////////////////////////////////

  // DEATAIL PLAYLIST VIDEO ////////////////////////////////////////////
  elseif ($_GET['module']=='detailplaylist'){
  include "modul/mod_playlist/detailplaylist.php";}
  /////////////////////////////////////////////////////////////


   // DEATAIL HALAMAN STATIS ////////////////////////////////////////////
  elseif ($_GET['module']=='halamanstatis'){
  include "modul/mod_halaman/halaman.php";}
  /////////////////////////////////////////////////////////////
 // HUBUNGI AKSI ////////////////////////////////////////////
  elseif ($_GET['module']=='hubungiaksi'){
	include "modul/mod_hubungi/hubungiaksi.php";}
 /////////////////////////////////////////////////////////////
  // HUBUNGI AKSI ////////////////////////////////////////////
  elseif ($_GET['module']=='bukutamuaksi'){
	include "modul/mod_bukutamu/bukutamuaksi.php";}
 /////////////////////////////////////////////////////////////
  // HUBUNGI AKSI ////////////////////////////////////////////
  elseif ($_GET['module']=='tag'){
	include "modul/mod_berita/tag.php";}
 /////////////////////////////////////////////////////////////


  // DEATAIL HALAMAN ERROR ////////////////////////////////////////////
 elseif ($_GET['module']=='notfound'){
  include "modul/404/404.php";}
  /////////////////////////////////////////////////////////////
  
 
  //========= Copyright © 2012. Developed by: Rizal Faizal  =======

  ?>      
