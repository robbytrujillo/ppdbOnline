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


$aksi="modul/mod_galerifoto/aksi_galerifoto.php";
switch($_GET[act]){

  // AWAL TAMPIL //////////////////////////
   default:
  
  echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='dashboard.html'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Gallery</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-picture'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Gallery Foto</h5>
                <h1>Gallery</h1>
            </div>
        </div><!--pageheader-->
        
        <div class='maincontent'>
            <div class='maincontentinner'>
						 <h4 class='widgettitle'>
				<a href='?module=galerifoto&act=tambahgalerifoto' class='btn btn-warning btn-rounded'><i class='icon-plus icon-white'></i>Tambah Photo</a>
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
                    <thead><tr>	
	<th class='head0 nosort'>No</th>
   <th><center>Foto</center></th>
   <th>Judul Foto</th>
   <th>Keterangan Foto</th>
   <th>Aksi</th>
   
    </thead>
    <tbody>";
	
    if ($_SESSION['leveluser']=='admin'){
    $tampil = mysqli_query($koneksi, "SELECT * FROM gallery ORDER BY id_gallery DESC");}
	
    else{
    
    echo "<span class style=\"color:#FAFAFA;\">$_SESSION[namauser]</span>";
    $tampil = mysqli_query($koneksi, "SELECT * FROM gallery,album WHERE gallery.id_album=album.id_album AND  
	gallery.username='$_SESSION[namauser]' ORDER BY id_gallery DESC");}
   
   while($r=mysqli_fetch_array($tampil)){
 
   echo "
   <tr class=gradeX> 
    <td class='aligncenter'><span class='center'>
                            <input type='checkbox' />
                          </span></td>
   <td><img src='../img_galeri/kecil_$r[gbr_gallery]' width=150px></td>
   <td>$r[jdl_gallery]</td>
   <td>$r[keterangan]</td>
				
   <td width=80>
   
   <a href=?module=galerifoto&act=editgalerifoto&id=$r[id_gallery] class='btn btn-info btn-circle'><i class='iconfa-pencil'></i></a>
   
   <a href=javascript:confirmdelete('$aksi?module=galerifoto&act=hapus&id=$r[id_gallery]&namafile=$r[gbr_gallery]') 
   class='btn btn-danger btn-circle'><span class='iconfa-remove'></span></a>
	   
   </td></tr>";
   }
   
   echo "</tbody></table> ";
 
    break;    

  //TAMBAH//////////////////////////

   case "tambahgalerifoto":
 
  echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='dashboard.html'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Gallery</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-picture'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Gallery Foto</h5>
                <h1>Gallery</h1>
            </div>
        </div><!--pageheader-->
		<div class='maincontent'>
            <div class='maincontentinner'>
               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Tambah Photo</h4>
                <div class='widgetcontent nopadding'>
	 
	
   <form class='stdform stdform2' method=POST action='$aksi?module=galerifoto&act=input' enctype='multipart/form-data'>

   <p> 
   <label>Judul Foto</label>
   	<span class='field'><input type=text name='jdl_gallery'></span>
   </p> 	

			
   <p> 
   <label>Keterangan</label>
   	<span class='field'><textarea name='keterangan' id='editor' style='width: 720px; height: 200px;'></textarea></span>
   </p> 	
   

   <p> 
   <label>Gambar</label>
   	<span class='field'><input type=file name='fupload' size=40></span> 
   </p> 	
		  
 <p class='stdformbutton'>
                                <button class='btn btn-primary'>Simpan</button>
								<input type=button value=Batal onclick=self.history.back() class='btn btn-warning btn-rounded'>
                                
                            </p>
  </form>";
   
   break;
    
	// EDIT //////////////////////////
	
    case "editgalerifoto":
	
    $edit = mysqli_query($koneksi, "SELECT * FROM gallery WHERE id_gallery='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);


    echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='dashboard.html'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Gallery</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-picture'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Gallery Foto</h5>
                <h1>Gallery</h1>
            </div>
        </div><!--pageheader-->
		<div class='maincontent'>
            <div class='maincontentinner'>
               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Edit Photo</h4>
                <div class='widgetcontent nopadding'>
	
    <form class='stdform stdform2' method=POST enctype='multipart/form-data' action=$aksi?module=galerifoto&act=update>
    <input type=hidden name=id value=$r[id_gallery]>
	
   <p> 
   <label>Judul Foto</label>
   <span class='field'><input type=text name='jdl_gallery' size=60 value='$r[jdl_gallery]'></span>
   </p> 
	   
	   
    
   <label>Keterangan Foto</label>
  <span class='field'><textarea name='keterangan' id='editor' style='width: 720px; height: 200px;'>$r[keterangan]</textarea></span>
   </p>		  
		  
		  
   <p> 
   <label>Foto</label> ";
    if ($r[gbr_gallery]!=''){
    echo "<span class='field'><img src='../img_galeri/kecil_$r[gbr_gallery]'></span></p>";  }
		  
   echo "
   <p> 
   <label>Ganti Foto</label>
   <span class='field'><input type=file name='fupload'></span>  
   </p>		  
<p class='stdformbutton'>
                                <button class='btn btn-primary'>Update</button>
								<input type=button value=Batal onclick=self.history.back() class='btn btn-warning btn-rounded'>
                                
                            </p>
	  </form>";
	  
    break;  
   }
   //kurawal akhir hak akses module
   
   }
   ?>


   </div> 
   </div>
   </div>
   <div class='clear height-fix'></div> 
   </div></div>