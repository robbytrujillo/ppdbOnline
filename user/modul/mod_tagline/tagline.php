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



$aksi="modul/mod_tagline/aksi_tagline.php";
switch($_GET[act]){
  // Tampil Agenda
  default:
  
  echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='media.php?module=home'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Taglline</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-bullhorn'></span></div>
            <div class='pagetitle'>
                <h5>Tag Line</h5>
                <h1>Tag Line</h1>
            </div>
        </div><!--pageheader-->

        <div class='maincontent'>
            <div class='maincontentinner'>
			<table id='dyntable' class='table table-bordered'>
            <thead>
            <tr>
		     	<th>Judul</th>
				
				<th>Gambar</th>
				
				<th>Aksi</th>
				</thead>
   				<tbody>";
	  $tampil=mysqli_query($koneksi, "SELECT * FROM tagline ORDER BY id_tagline DESC");
      $no = $posisi+1;
	  while ($r=mysqli_fetch_array($tampil)){

	echo "<tr class=gradeX>
   	<td><center>$r[judul]</center></td>

    <td><img src='../foto_tagline/$r[gambar]' width=250></td>
    
    <td width=80>
   <a href=?module=tagline&act=edittagline&id=$r[id_tagline] title='Edit' class='btn btn-info btn-circle'><i class='iconfa-pencil'></i></a>   
   </td></tr>";		
     }
    echo "</table>";
  
    break;
  

  case "edittagline":
    $edit = mysqli_query($koneksi, "SELECT * FROM tagline WHERE id_tagline='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);

   echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='media.php?module=home'><i class='iconfa-bullhorn'></i></a> <span class='separator'></span></li>
       <li>Taglline</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-user'></span></div>
            <div class='pagetitle'>
                <h5>Tag Line</h5>
                <h1>Tag Line</h1>
            </div>
        </div><!--pageheader-->
		<div class='maincontent'>
            <div class='maincontentinner'>
               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Edit Tagline</h4>
                <div class='widgetcontent nopadding'>
	 
  <form class='stdform stdform2' method=POST action='$aksi?module=tagline&act=update' enctype='multipart/form-data'>
   <input type=hidden name=id value=$r[id_tagline]>
		  
   <p>
   <label>Judul</label>
   <span class='field'><input type=text name='judul' size=60 value='$r[judul]'></span>
   </p> 	
	
   
     <p> 
   <label>Gambar</label>
  	 <span class='field'><img src='../foto_tagline/$r[gambar]'><br/></span>
   </p> 	
   
   <pl> 
   <label>Ganti Gambar</label>
  <span class='field'><input type=file name='fupload' size=30></span>
   </p> 
		  
   
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