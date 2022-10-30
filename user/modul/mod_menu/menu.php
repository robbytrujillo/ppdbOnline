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



$aksi="modul/mod_menu/aksi_menu.php";
switch($_GET[act]){
  // Tampil Menu
  default:
  
  echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='media.php?module=home'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Menu Website</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-list'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Menu Website</h5>
                <h1>Menu</h1>
            </div>
        </div><!--pageheader-->

        <div class='maincontent'>
            <div class='maincontentinner'>
			
			 <h4 class='widgettitle'>
				<a href='?module=menu&act=tambahmenu' class='btn btn-warning btn-rounded'><i class='icon-plus icon-white'></i>Tambah Menu</a>
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
	<th>Nama Menu</th>
	<th>Link</th>
	<th>Jenis Menu</th>
	<th>Aktif</th>
	<th>Aksi</th>
	
   </thead>
   <tbody>";

   

    if ($_SESSION[leveluser]=='admin'){
      $tampil=mysqli_query($koneksi, "SELECT * FROM menu ORDER BY id_menu DESC");
    }
    else{
      $tampil=mysqli_query($koneksi, "SELECT * FROM menu 
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id_menu DESC");
    }

    $no = $posisi+1;
    while ($r=mysqli_fetch_array($tampil)){
      
    $lebar=strlen($no);
    switch($lebar){
      case 1:
      {
        $g="0".$no;
        break;     
      }
      case 2:
      {
        $g=$no;
        break;     
      }      
    } 
    
   echo "<tr class=gradeX>
   <td width=50><center>$g</center></td>
    <td width=220>$r[nama_menu]</td>
	<td width=220>$r[link]</td>";
   if ($r['parent']=='Y'){
   echo" <td width=220>Menu Induk</td>";
   } else{
   echo"<td width=220>Single Menu</td>";
   }
   
    echo"<td width=220>$r[aktif]</td>				
    <td width=80>   
   <a href=?module=menu&act=editmenu&id=$r[id_menu] title='Edit' class='btn btn-info btn-circle'><i class='iconfa-pencil'></i></a>   
   <a href=javascript:confirmdelete('$aksi?module=menu&act=hapus&id=$r[id_menu]') 
   title='Hapus' class='btn btn-danger btn-circle'><span class='iconfa-remove'></span></a>
	   
   </td></tr>";		
      $no++;
    }
    echo "</table>";

    
    break;

  
  case "tambahmenu":
  
   echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='media.php?module=home'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Menu</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-list'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Menu</h5>
                <h1>Tambah Menu</h1>
            </div>
        </div><!--pageheader-->
		<div class='maincontent'>
            <div class='maincontentinner'>
               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Tambah Menu</h4>
                <div class='widgetcontent nopadding'>
	 
	
  <form class='stdform stdform2' method=POST action='$aksi?module=menu&act=input' enctype='multipart/form-data'>
     
   <p> 
   <label>Nama Menu</label>
  	<span class='field'><input type=text name='nama_menu' class='input-xlarge'></span>
   </p> 
   
    <p> 
   <label>Atribut</label>
  	<span class='field'><input type=text name='atribut' class='input-xxlarge'></span>
   </p> 
   
   <p> 
   <label>Link Menu</label>
  	<span class='field'><input type=text name='link' class='input-xlarge'></span>
   </p> 	
   
 <p>
 <label>Jenis Menu</label>
 <span class='field'>
 <select name='jenis' class='uniformselect'>
 <option value='' /><b>- Pilih Jenis Menu- </b>
 <option value='Y' />Menu Induk
 <option value='N' />Single Menu
 </select>
 </span>
 </p>		 
   
   
    
									<p class='stdformbutton'>
                                <button class='btn btn-primary'>Simpan</button>
								<input type=button value=Batal onclick=self.history.back() class='btn btn-warning btn-rounded'>
                                
                            </p>
   </form></div>";
   
    break;
  

  case "editmenu":
    $edit = mysqli_query($koneksi, "SELECT * FROM menu WHERE id_menu='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);

   echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='media.php?module=home'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Edit Menu</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-list'></span></div>
            <div class='pagetitle'>
                <h5>Edit Menu</h5>
                <h1>Edit Menu</h1>
            </div>
        </div><!--pageheader-->
		<div class='maincontent'>
            <div class='maincontentinner'>
               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Edit Menu</h4>
                <div class='widgetcontent nopadding'>
	 
  <form class='stdform stdform2' method=POST action='$aksi?module=menu&act=update' enctype='multipart/form-data'>
   <input type=hidden name=id value=$r[id_menu]>
   
    <p> 
   <label>Nama Menu</label>
  	<span class='field'><input type=text name='nama_menu' value='$r[nama_menu]' class='input-xlarge'></span>
   </p> 
   
    <p> 
   <label>Atribut</label>
  	<span class='field'><input type=text name='atribut' value='$r[atribut]' class='input-xlarge'></span>
   </p> 
       <p> 
   <label>Link Menu</label>
  	<span class='field'><input type=text name='link' value='$r[link]' class='input-xlarge'></span>
   </p> 
		
	<p>
 	<label>Jenis Menu</label>
 	<span class='field'>
 	<select name='jenis' class='uniformselect'>";
	if ($r['parent']=='Y'){
	echo"<option value='Y' />Menu Induk";
	echo"<option value='N' />Single Menu";
	}else{
 	echo"<option value='N' />Single Menu";
	echo"<option value='Y' />Menu Induk";
	 }
 	echo"</select>";
	if ($r[aktif]=='Y'){
   echo "
   <p> 
   <label>Aktif</label>
   <span class='field'><input type=radio name='aktif' value='Y' checked>Ya 
   <input type=radio name='aktif' value='N'>Tidak</span>
   </p>";}
									  
   else{
   echo "
   <p> 
   <label>Aktif</label>
   <span class='field'><input type=radio name='aktif' value='Y'>Ya 
   <input type=radio name='aktif' value='N' checked>Tidak</span>
   </p>";}
	echo"<p class='stdformbutton'>
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