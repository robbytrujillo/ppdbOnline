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



$aksi="modul/mod_pengumuman/aksi_pengumuman.php";
switch($_GET[act]){
  // Tampil Pengumuman
  default:
  
  echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='dashboard.html'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Komentar</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-bullhorn'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Pengumuman</h5>
                <h1>Pengumuman</h1>
            </div>
        </div><!--pageheader-->

        <div class='maincontent'>
            <div class='maincontentinner'>
			
			 <h4 class='widgettitle'>
				<a href='?module=pengumuman&act=tambahpengumuman' class='btn btn-warning btn-rounded'><i class='icon-plus icon-white'></i>Tambah Pengumuman</a>
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
	<th>Tema Pengumuman</th>	
	<th>Aksi</th>
	
   </thead>
   <tbody>";
    if ($_SESSION[leveluser]=='admin'){
    $tampil = mysqli_query($koneksi, "SELECT * FROM pengumuman ORDER BY id_pengumuman DESC");
	}
	else{
    $tampil=mysqli_query($koneksi, "SELECT * FROM pengumuman WHERE username='$_SESSION[namauser]' ORDER BY id_berita DESC");}
	 $no = $posisi+1;
    while ($r=mysqli_fetch_array($tampil)){
      $tgl_mulai   = tgl_indo($r[tgl_mulai]);
      $tgl_selesai = tgl_indo($r[tgl_selesai]);
    
   echo "<tr class=gradeX>
   <td width=50><center>$no</center></td>
    <td width=220>$r[tema]</td>
   
		
    <td width=80>
   
   <a href=?module=pengumuman&act=editpengumuman&id=$r[id_pengumuman] title='Edit' class='btn btn-info btn-circle'><i class='iconfa-pencil'></i></a>
   
   <a href=javascript:confirmdelete('$aksi?module=pengumuman&act=hapus&id=$r[id_pengumuman]&namafile=$r[gambar]') 
   title='Hapus' class='btn btn-danger btn-circle'><span class='iconfa-remove'></span></a>
	   
   </td></tr>";		
      $no++;
    }
    echo "</table>";



    break;

  
  case "tambahpengumuman":
  
   echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='dashboard.html'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Pengumuman</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-bullhorn'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Pengumuman</h5>
                <h1>Tambah Pengumuman</h1>
            </div>
        </div><!--pageheader-->
		<div class='maincontent'>
            <div class='maincontentinner'>
               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Tambah Pengumuman</h4>
                <div class='widgetcontent nopadding'>
	 
	
  <form class='stdform stdform2' method=POST action='$aksi?module=pengumuman&act=input' enctype='multipart/form-data'>
     
   <p> 
   <label>Tema Pengumuman</label>
  	<span class='field'><input type=text name='tema' size=60></span>
   </p> 		 
   
   <p> 
   <label>Isi Pengumuman</label>
  <span class='field'><textarea id='editor' name='isi_pengumuman' id='editor' style='width: 720px; height: 350px;'></textarea></span>
   </p> 		 
   
   <p> 
   <label>Gambar</label>
   <span class='field'><input type=file name='fupload'></span>
   </p> 		 
   		  	
   
    
									<p class='stdformbutton'>
                                <button class='btn btn-primary'>Update</button>
								<input type=button value=Batal onclick=self.history.back() class='btn btn-warning btn-rounded'>
                                
                            </p>
   </form></div>";
   
    break;
  

  case "editpengumuman":
    $edit = mysqli_query($koneksi, "SELECT * FROM pengumuman WHERE id_pengumuman='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);

   echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='media.php?module=home'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Pengumuman</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-bullhorn'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Pengumuman</h5>
                <h1>Pengumuman</h1>
            </div>
        </div><!--pageheader-->
		<div class='maincontent'>
            <div class='maincontentinner'>
               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Edit Pengumuman</h4>
                <div class='widgetcontent nopadding'>
	 
  <form class='stdform stdform2' method=POST action='$aksi?module=pengumuman&act=update' enctype='multipart/form-data'>
   <input type=hidden name=id value=$r[id_pengumuman]>
		  
   <p>
   <label>Tema Pengumuman</label>
   <span class='field'><input type=text name='tema' size=60 value='$r[tema]'></span>
   </p> 	
   
   		  
   <p> 
   <label>Isi Pengumuman</label>
  <span class='field'><textarea name='isi_pengumuman' id='editor' style='width: 720px; height: 350px;'>$r[isi_pengumuman]</textarea>
   </p> 	
   
     <p> 
   <label>Gambar</label>
  	 <span class='field'><img src='../foto_agenda/$r[gambar]'><br/></span>
   </p> 	
   
   <pl> 
   <label>Ganti Gambar</label>
  <span class='field'><input type=file name='fupload' size=30></span>
   </p> 
		  
   
  
    
									<p class='stdformbutton'>
                                <button class='btn btn-primary'>Update</button>
								<input type=button value=Batal onclick=self.history.back() class='btn btn-warning btn-rounded'>
                                
                            </p>
   </form></div>";
   
   
   
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