<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_daya_tampung/aksi_daya_tampung.php";
switch($_GET[act]){
  // Tampil Daya Tampung Penerimaan Siswa Baru
  default:
echo "<div class='rightpanel'>        
        <ul class='breadcrumbs'>
            <li><a href='media.php?module=home'><i class='iconfa-home'></i></a> <span class='separator'></span></li>           
            <li>Daya Tampung</li>
        </ul>
        <div class='pageheader'>
           <div class='pageicon'><span class='iconfa-star'></span></div>
            <div class='pagetitle'>
                <h5>Daya Tampung</h5>
                <h1>Setting Daya Tampung Siswa & Margin Kelulusan </h1>
            </div>
        </div><!--pageheader-->
        
        <div class='maincontent'>
            <div class='maincontentinner'><div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Atur Daya Tmapung/Kapasitas Siswa Baru</h4>
                <div class='widgetcontent wc1'>";
    $edit = mysqli_query($koneksi, "SELECT * FROM daya_tampung");
    $r    = mysqli_fetch_array($edit);

    echo "<form class='stdform stdform2' method=POST enctype='multipart/form-data' action=$aksi?module=daya_tampung&act=update>
          <input type=hidden name=id value=$r[id_daya_tampung]>
         <p>
          <label>Daya Tampung</label> 
		  <span class='field'><input type=text name='kapasitas' size=10 value='$r[kapasitas]'>
		  </span>
		  <label>Nilai Kelululusan Minimal</label> 
		  <span class='field'><input type=text name='nilai_minimal' size=60 value='$r[nilai_minimal]'>
		  </span>
		  </p>
		 <p class='stdformbutton'>
         <button class='btn btn-primary'>Simpan</button>
		</p></form";
    break;  
}}

?>
