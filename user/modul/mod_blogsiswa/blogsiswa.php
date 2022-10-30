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

$aksi="modul/mod_blogsiswa/aksi_blogsiswa.php";
switch($_GET[act]){
  // Tampil Blog Siswa
  default:
  
     echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='dashboard.html'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Blog Siswa</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-globe'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Blog Siswa</h5>
                <h1>Blog Siswa</h1>
            </div>
        </div><!--pageheader-->

        <div class='maincontent'>
            <div class='maincontentinner'>
			 <h4 class='widgettitle'>
				<a href='?module=blogsiswa&act=tambahblogsiswa' class='btn btn-warning btn-rounded'><i class='icon-plus icon-white'></i>Tambah Blog Siswa</a>
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
   <th>Nama</th>
   <th>Kelas</th>
   <th>URL</th>  
   <th>Hit</th> 
   <th>Aksi</th>
   
  </thead>
   <tbody>";
		  
	  if ($_SESSION[leveluser]=='admin'){
      $tampil = mysqli_query($koneksi, "SELECT * FROM blogsiswa ORDER BY id_blogsiswa DESC");
    }
    else{
      $tampil=mysqli_query($koneksi, "SELECT * FROM blogsiswa
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id_blogsiswa DESC");
    }
		
    $no=1;
    while ($r=mysqli_fetch_array($tampil)){

   echo "<tr class=gradeX>
   <td width=50><center>$no</center></td>
   <td>$r[nama]</td>   
   <td>$r[kelas]</td>  
   <td><a href=$r[url] target=_blank>$r[url]</a></td>
	<td>$r[hit]</td>			
   <td width=80>
   
   <a href=?module=blogsiswa&act=editblogsiswa&id=$r[id_blogsiswa] title='Edit' class='btn btn-info btn-circle'><i class='iconfa-pencil'></i></a> 
   
   <a href=javascript:confirmdelete('$aksi?module=blogsiswa&act=hapus&id=$r[id_blogsiswa]&namafile=$r[gambar]') 
   title='Hapus' class='btn btn-danger btn-circle'><span class='iconfa-remove'></span></a>
	   
   </td></tr>";

				
				
    $no++;
    }
    echo "</table>";
    break;
  
  case "tambahblogsiswa":

  	
  echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='dashboard.html'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Tambah Blog Siswa</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-globe'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Link Terkair</h5>
                <h1>Tambah Blog Siswa</h1>
            </div>
        </div><!--pageheader-->
		<div class='maincontent'>
            <div class='maincontentinner'>
               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Tambah Blog Siswa</h4>
                <div class='widgetcontent nopadding'>

   <form class='stdform stdform2' method=POST action='$aksi?module=blogsiswa&act=input' enctype='multipart/form-data'>
		  
   <p> 
   <label>Nama</label>
  <span class='field'><input type=text name='nama' size=30>
   </p>	  
      <p> 
   <label>Kelas</label>
  <span class='field'><input type=text name='kelas' size=30>
   </p>	  
   
   <p> 
   <label>URL</label>
   <span class='field'><input type=text name='url' size=50 value='http://'>
   </p>	  
		  
   <p> 
   <label>Gambar</label>
   <span class='field'><input type=file name='fupload'></span>
   </p> 
		  		  
	  
  </p>
    
									<p class='stdformbutton'>
                                <button class='btn btn-primary'>Simpan</button>
								<input type=button value=Batal onclick=self.history.back() class='btn btn-warning btn-rounded'>
                                
                            </p>
   </form></div>";
		  
  break;
  case "editblogsiswa":
    $edit = mysqli_query($koneksi, "SELECT * FROM blogsiswa WHERE id_blogsiswa='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);  
    echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='dashboard.html'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Edit Blog Siswa</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-globe'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Link Terkair</h5>
                <h1>Edit Blog Siswa</h1>
            </div>
        </div><!--pageheader-->
		<div class='maincontent'>
            <div class='maincontentinner'>
               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Edit Blog Siswa</h4>
                <div class='widgetcontent nopadding'>

   <form class='stdform stdform2' method=POST enctype='multipart/form-data' action=$aksi?module=blogsiswa&act=update>
    <input type=hidden name=id value=$r[id_blogsiswa]>
		  
   <p> 
   <label>Nama</label>
   <span class='field'><input type=text name='nama' size=30 value='$r[nama]'>
   </p>
   
      <p> 
   <label>Kelas</label>
   <span class='field'><input type=text name='kelas' size=30 value='$r[kelas]'>
   </p>
   
    <p> 
   <label>URL</label>
  	<span class='field'><input type=text name='url' size=50 value='$r[url]'>
   </p>
   <p>
   <label>Gambar</label>";
  	if ($r[screenshoot]!=''){
  	echo "<span class='field'><img src='../screenshoot/$r[screenshoot]'>";} 	  
	echo"</span>
    </p>
	<p>
    <label>Ganti Gambar</label>
    <span class='field'>
	<input type=file name='fupload' size=40> 
    <br>Tipe gambar harus JPG/JPEG dan ukuran lebar harus: 350 px
	</span>
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