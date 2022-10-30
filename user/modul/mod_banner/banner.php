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

//cek hak akses user

if($_SESSION[leveluser]=='admin'){

$aksi="modul/mod_banner/aksi_banner.php";
switch($_GET[act]){
  // Tampil Banner
  default:
  
     echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='dashboard.html'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Banner</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-globe'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Banner</h5>
                <h1>Banner</h1>
            </div>
        </div><!--pageheader-->

        <div class='maincontent'>
            <div class='maincontentinner'>
			 <h4 class='widgettitle'>
				<a href='?module=banner&act=tambahbanner' class='btn btn-warning btn-rounded'><i class='icon-plus icon-white'></i>Tambah Banner</a>
				</h4>
				
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
   <th>Judul</th>
   <th>URL</th>
   <th>Tgl. Posting</th>
   <th>Aksi</th>
   
  </thead>
   <tbody>";
		  
	  if ($_SESSION[leveluser]=='admin'){
      $tampil = mysqli_query($koneksi, "SELECT * FROM banner ORDER BY id_banner DESC");
    }
    else{
      $tampil=mysqli_query($koneksi, "SELECT * FROM banner
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id_banner DESC");
    }
		
    $no=1;
    while ($r=mysqli_fetch_array($tampil)){
      $tgl=tgl_indo($r[tgl_posting]);
	  
	  
   echo "<tr class=gradeX>
   <td width=50><center>$no</center></td>
   <td>$r[judul]</td>
   <td><a href=$r[url] target=_blank>$r[url]</a></td>
   <td>$tgl</td>
				
   <td width=80>
   
   <a href=?module=banner&act=editbanner&id=$r[id_banner] title='Edit' class='btn btn-info btn-circle'><i class='iconfa-pencil'></i></a> 
   
   <a href=javascript:confirmdelete('$aksi?module=banner&act=hapus&id=$r[id_banner]&namafile=$r[gambar]') 
   title='Hapus' class='btn btn-danger btn-circle'><span class='iconfa-remove'></span></a>
	   
   </td></tr>";

				
				
    $no++;
    }
    echo "</table>";
    break;
  
  case "tambahbanner":

  	
  echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='dashboard.html'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Tambah Banner</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-globe'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Link Terkair</h5>
                <h1>Tambah Banner</h1>
            </div>
        </div><!--pageheader-->
		<div class='maincontent'>
            <div class='maincontentinner'>
               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Tambah Banner</h4>
                <div class='widgetcontent nopadding'>

   <form class='stdform stdform2' method=POST action='$aksi?module=banner&act=input' enctype='multipart/form-data'>
		  
   <p> 
   <label>Judul</label>
  <span class='field'><input type=text name='judul' size=30>
   </p>	  
   
   <p> 
   <label>URL</label>
   <span class='field'><input type=text name='url' size=50 value='http://'>
   </p>	  
		  
   <p> 
   <label>Gambar</label>
   <span class='field'><input type=file name='fupload' size=40>
   Ukuran gambar maksimal lebar 260px
   </p>	  
		  		  
	  
  </p>
    
									<p class='stdformbutton'>
                                <button class='btn btn-primary'>Simpan</button>
								<input type=button value=Batal onclick=self.history.back() class='btn btn-warning btn-rounded'>
                                
                            </p>
   </form></div>";
		  
  break;
  case "editbanner":
    $edit = mysqli_query($koneksi, "SELECT * FROM banner WHERE id_banner='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);

  
    echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='dashboard.html'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Edit Banner</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-globe'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Link Terkair</h5>
                <h1>Edit Banner</h1>
            </div>
        </div><!--pageheader-->
		<div class='maincontent'>
            <div class='maincontentinner'>
               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Edit Banner</h4>
                <div class='widgetcontent nopadding'>

   <form class='stdform stdform2' method=POST enctype='multipart/form-data' action=$aksi?module=banner&act=update>
    <input type=hidden name=id value=$r[id_banner]>
		  
   <p> 
   <label>Judul</label>
   <span class='field'><input type=text name='judul' size=30 value='$r[judul]'>
   </p>
   
    <p> 
   <label>URL</label>
  	<span class='field'><input type=text name='url' size=50 value='$r[url]'>
   </p>
   
   <p> 
   <label>Gambar</label>
   <span class='field'><img src='../foto_banner/$r[gambar]'width=200 >
   </p>
   
   <p> 
   <label>Ganti Gambar</label>
   <span class='field'><input type=file name='fupload' size=30>
   </p>
		  
</p>
    
									<p class='stdformbutton'>
                                <button class='btn btn-primary'>Upload</button>
								<input type=button value=Batal onclick=self.history.back() class='btn btn-warning btn-rounded'>
                                
                            </p>
   </form></div>";		  

    break;
	
   } include "footer.php";
    //kurawal akhir hak akses module
} else {

	echo"Anda Tidak Berhak Mengakses Halaman ini";
   } 
    }
	
    ?>

   </div> 
   </div>
   </div>
   <div class='clear height-fix'></div> 
   </div></div>