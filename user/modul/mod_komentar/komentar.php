<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>


<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
 echo "
  <link href='css/zalstyle.css' rel='stylesheet' type='text/css'>";

  echo "
  </head>
  <body class='special-page'>
  <div id='container'>
  <section id='error-number'>
  
  <img src='img/lock.png'>
  <h1>MODUL TIDAK DAPAT DIAKSES</h1>
  
  <p><span class style=\"font-size:14px; color:#ccc;\">Untuk mengakses modul, Anda harus login dahulu!</p></span><br/>
  
  </section>
  
  <section id='error-text'>
  <p><a class='button' href='index.php'>&nbsp;&nbsp; <b>ULANGI LAGI</b> &nbsp;&nbsp;</a></p>
  </section>
  </div>";
  
}
else{




$aksi="modul/mod_komentar/aksi_komentar.php";
switch($_GET[act]){


  // Tampil Komentar
  default:
  echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='dashboard.html'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Komentar</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-user'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Komentar Masuk</h5>
                <h1>Komentar</h1>
            </div>
        </div><!--pageheader-->
        
        <div class='maincontent'>
            <div class='maincontentinner'>
					<table id='dyntable' class='table table-bordered'>
                    <colgroup>
                        <col class='con0' style='align: center; width: 4%' />
                        <col class='con1' />
                        <col class='con0' />
                        <col class='con1' />
                        <col class='con0' />
                        <col class='con1' />
                    </colgroup>
                    <thead>
                        <tr>
  
  <th>No</th>
  <th>Nama</th>
  <th>Komentar</th>
  <th>Aktif</th>
  <th>Aksi</th>
  
  </thead>
  <tbody>";

   $tampil=mysqli_query($koneksi, "SELECT * FROM berita,komentar WHERE komentar.id_berita=berita.id_berita AND berita.username='$_SESSION[namauser]' ORDER BY id_komentar DESC");
    $no = $posisi+1;
    while ($r=mysqli_fetch_array($tampil)){
   
	
  echo "<tr class=gradeX> 
  <td width=50><center>$no</center></td>
  <td>$r[nama_komentar]</td>
  <td><a href='../berita-$r[judul_seo].html#$r[id_komentar]' target='blank'>$r[isi_komentar]</a></td>
  <td><center>$r[aktif]</center></td>
  
  <td width=80>
   <a href='?module=komentar&act=editkomentar&id=$r[id_komentar]' class='btn btn-info btn-circle'><i class='iconfa-pencil'></i></a>


  <a href=javascript:confirmdelete('$aksi?module=komentar&act=hapus&id=$r[id_komentar]') class='btn btn-danger btn-circle'><span class='iconfa-remove'></span></a>
   
  </td></tr>";

  $no++;}
  
  echo "</table>";
	
	
    $jmldata=mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM komentar"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

   
    break;
  
  case "editkomentar":
  $edit = mysqli_query($koneksi, "SELECT * FROM komentar WHERE id_komentar='$_GET[id]'");
  $r    = mysqli_fetch_array($edit);
  echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='dashboard.html'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Komentar</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-user'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Komentar Masuk</h5>
                <h1>Komentar</h1>
            </div>
        </div><!--pageheader-->
		<div class='maincontent'>
            <div class='maincontentinner'>
               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Edit Berita</h4>
                <div class='widgetcontent nopadding'>
	 
   <form class='stdform stdform2' method=POST action=$aksi?module=komentar&act=update>
   <input type=hidden name=id value=$r[id_komentar]>
    
    <p>
       <label>Nama</label>
	     <span class='field'><input type=text name='nama_komentar' size=30 value='$r[nama_komentar]' id='firstname2' class='input-xxlarge' /></span>
   </p> 	
		 
   <p> 
   <label>Website</label>
    <span class='field'><input type=text name='url' size=30 value='$r[url]' id='firstname2' class='input-xxlarge' /></span>
   </p> 	
		 		  
   <p> 
   <label>Komentar</label>
   <span class='field'><textarea name='isi_komentar' id='editor' style='width: 750px; height: 200px'>$r[isi_komentar]</textarea>
   </p>";

   
   if ($r[aktif]=='Y'){
   echo "
   <pl> 
   <label for=field4>Aktif</label>
   <span class='field'><input type=radio name='aktif' value='Y' checked>Ya 
   <input type=radio name='aktif' value='N'>Tidak</span>
   </p>";}
									  
   else{
   echo "
   <p> 
   <label for=field4>Aktif</label>
   <span class='field'><input type=radio name='aktif' value='Y'>Ya 
   <input type=radio name='aktif' value='N' checked>Tidak</span>
   </p>";}
									  

   echo  "<p class='stdformbutton'>
                                <button class='btn btn-primary'>Update</button>
								<input type=button value=Batal onclick=self.history.back() class='btn btn-warning btn-rounded'>
                                
                            </p>
   </form>";
   
   
    break;  
   }
   //kurawal akhir hak akses module
  
   }
    include "footer.php";
   ?>

   </div> 
   </div>
   </div>
   <div class='clear height-fix'></div> 
   </div></div>