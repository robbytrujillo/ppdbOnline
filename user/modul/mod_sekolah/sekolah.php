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

$aksi="modul/mod_sekolah/aksi_sekolah.php";
switch($_GET[act]){
  // Tampil Sekolah
  default:
    echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='../'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Komentar</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-calendar'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Sekolah</h5>
                <h1>Sekolah</h1>
            </div>
        </div><!--pageheader-->

        <div class='maincontent'>
            <div class='maincontentinner'>
			
			 <h4 class='widgettitle'>
				<a href='?module=sekolah&act=tambahsekolah' class='btn btn-warning btn-rounded'><i class='icon-plus icon-white'></i>TambahSekolah</a>
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
          <th>nama sekolah</th>
          <th>status</th>
          <th>aksi</th></tr></thead>"; 
    $tampil=mysqli_query($koneksi, "SELECT * FROM sekolah ORDER BY id_sekolah DESC");
    $no=1;
    while ($r=mysqli_fetch_array($tampil)){
       echo "<tr class=gradeX>
	    <td width=50><center>$no</center></td>
             <td class='left'>$r[nama_sekolah]</td>
             <td class='center'>$r[aktif]</td>
    <td width=80>
   
   <a href=?module=sekolah&act=editsekolah&id=$r[id_sekolah] title='Edit' class='btn btn-info btn-circle'><i class='iconfa-pencil'></i></a>
   
   <a href=javascript:confirmdelete('$aksi?module=sekolah&act=hapus&id=$r[id_sekolah]') 
   title='Hapus' class='btn btn-danger btn-circle'><span class='iconfa-remove'></span></a>
	   
   </td></tr>";		
      $no++;
    }
    echo "<tbody></table>";
    echo "<div id=paging>*) Data pada Sekolah tidak bisa dihapus, tapi bisa di non-aktifkan melalui Edit Sekolah.</div><br>";
    break;
  
  // Form Tambah Sekolah
  case "tambahsekolah":
   echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='media.php?module=home'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Sekolah</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-calendar'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Sekolah </h5>
                <h1>Tambah Sekolah</h1>
            </div>
        </div><!--pageheader-->
		<div class='maincontent'>
            <div class='maincontentinner'>
               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Edit Sekolah</h4>
                <div class='widgetcontent nopadding'>
	 
	
  <form class='stdform stdform2' method=POST action='$aksi?module=sekolah&act=input' enctype='multipart/form-data'>
          <p> 
   <label>Nama Sekolah</label>
  <span class='field'><input type=text name='nama_sekolah' size=40></span>
   </p> 
			<p class='stdformbutton'>
                                <button class='btn btn-primary'>Update</button>
								<input type=button value=Batal onclick=self.history.back() class='btn btn-warning btn-rounded'>
                                
                            </p>
   </form></div>";
     break;
  
  // Form Edit Sekolah  
  case "editsekolah":
    $edit=mysqli_query($koneksi, "SELECT * FROM sekolah WHERE id_sekolah='$_GET[id]'");
    $r=mysqli_fetch_array($edit);

    echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='media.php?module=home'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Sekolah</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-calendar'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Sekolah</h5>
                <h1>Sekolah</h1>
            </div>
        </div><!--pageheader-->
		<div class='maincontent'>
            <div class='maincontentinner'>
               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Edit Berita</h4>
                <div class='widgetcontent nopadding'>
	 
  <form class='stdform stdform2' method=POST action='$aksi?module=sekolah&act=update' enctype='multipart/form-data'>
          <input type=hidden name=id value='$r[id_sekolah]'>
    
            <p>
   <label>Nama Sekolah</label>
   <span class='field'><input type=text name='nama_sekolah' size=60 value='$r[nama_sekolah]'></span>
   </p> 	";
    if ($r[aktif]=='Y'){
      echo "            <p>
   <label>Aktif</label>  <span class='field'> <input type=radio name='aktif' value='Y' checked>Y  
                                      <input type=radio name='aktif' value='N'> N</span></tr>";
    }
    else{
      echo " <p>
   <label>Aktif</label> <span class='field'> <input type=radio name='aktif' value='Y'>Y  
                                      <input type=radio name='aktif' value='N' checked>N</span></p>";
    }

    echo "</span></p>
									<p class='stdformbutton'>
                                <button class='btn btn-primary'>Update</button>
								<input type=button value=Batal onclick=self.history.back() class='btn btn-warning btn-rounded'>
                                
                            </p>
   </form></div>";
    break;  
}
}
?>
