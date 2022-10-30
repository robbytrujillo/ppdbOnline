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
$aksi="modul/mod_submenu/aksi_submenu.php";
switch($_GET[act]){
  // Tampil Submenu
  default:
  
  echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='media.php?module=home'><i class='iconfa-list'></i></a> <span class='separator'></span></li>
       <li>Submenu Website</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-list'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Submenu Website</h5>
                <h1>Submenu</h1>
            </div>
        </div><!--pageheader-->

        <div class='maincontent'>
            <div class='maincontentinner'>
			
			 <h4 class='widgettitle'>
				<a href='?module=submenu&act=tambahsubmenu' class='btn btn-warning btn-rounded'><i class='icon-plus icon-white'></i>Tambah Submenu</a>
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
	<th>Nama Submenu</th>
	<th>Link</th>
	<th>Menu Utama</th>
	<th>Aktif</th>
	<th>Aksi</th>
	
   </thead>
   <tbody>";

   

    if ($_SESSION[leveluser]=='admin'){
      $tampil=mysqli_query($koneksi, "SELECT * FROM submenu ORDER BY id_sub DESC");
    }
    else{
      $tampil=mysqli_query($koneksi, "SELECT * FROM submenu,menu 
                           WHERE  menu.id_menu=submenu.id_menu AND username='$_SESSION[namauser]'       
                           ORDER BY id_sub DESC");
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
    <td width=220>$r[nama_sub]</td>
	<td width=220>$r[link_sub]</td>";
	$menu=mysqli_query($koneksi, "SELECT * FROM menu WHERE id_menu=$r[id_menu]");
	while ($m=mysqli_fetch_array($menu)){ 
	echo"<td width=220>$m[nama_menu]</td>";
	}
	echo"<td width=220>$r[aktif]</td>
    <td width=80>   
   <a href=?module=submenu&act=editsubmenu&id=$r[id_sub] title='Edit' class='btn btn-info btn-circle'><i class='iconfa-pencil'></i></a>   
   <a href=javascript:confirmdelete('$aksi?module=submenu&act=hapus&id=$r[id_sub]') 
   title='Hapus' class='btn btn-danger btn-circle'><span class='iconfa-remove'></span></a>
	   
   </td></tr>";		
      $no++;
    }
    echo "</table>";

    
    break;

  
  case "tambahsubmenu":
  
   echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='media.php?module=home'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Submenu</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-list'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Submenu</h5>
                <h1>Tambah Submenu</h1>
            </div>
        </div><!--pageheader-->
		<div class='maincontent'>
            <div class='maincontentinner'>
               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Tambah Submenu</h4>
                <div class='widgetcontent nopadding'>
	 
	
  <form class='stdform stdform2' method=POST action='$aksi?module=submenu&act=input' enctype='multipart/form-data'>
     
   <p> 
   <label>Nama Submenu</label>
  	<span class='field'><input type=text name='nama_sub' class='input-xlarge'></span>
   </p> 
 <p>
 <label>Menu Utama</label>
 <span class='field'>
 <select name='id_menu' class='uniformselect'>
 <option value='' /><b>- Pilih Menu Utama- </b>";
  $menu=mysqli_query($koneksi, "SELECT * FROM menu ORDER BY nama_menu");
   while ($m=mysqli_fetch_array($menu)){
 echo"<option value='$m[id_menu]'/>$m[nama_menu]";
}
 echo"</select>
 </span>
 </p>	
   
   <p> 
   <label>Link Submenu</label>
  	<span class='field'><input type=text name='link' class='input-xlarge'></span>
   </p> 	
   
	 
   
   
    
									<p class='stdformbutton'>
                                <button class='btn btn-primary'>Simpan</button>
								<input type=button value=Batal onclick=self.history.back() class='btn btn-warning btn-rounded'>
                                
                            </p>
   </form></div>";
   
    break;
  

  case "editsubmenu":
    $edit = mysqli_query($koneksi, "SELECT * FROM submenu WHERE id_sub='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);

   echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='media.php?module=home'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Edit Submenu</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-list'></span></div>
            <div class='pagetitle'>
                <h5>Edit Submenu</h5>
                <h1>Edit Submenu</h1>
            </div>
        </div><!--pageheader-->
		<div class='maincontent'>
            <div class='maincontentinner'>
               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Edit Submenu</h4>
                <div class='widgetcontent nopadding'>
	 
  <form class='stdform stdform2' method=POST action='$aksi?module=submenu&act=update' enctype='multipart/form-data'>
   <input type=hidden name=id value=$r[id_sub]>
   
    <p> 
   <label>Nama Submenu</label>
  	<span class='field'><input type=text name='nama_sub' value='$r[nama_sub]' class='input-xlarge'></span>
   </p> 
   
    
       <p> 
   <label>Link Submenu</label>
  	<span class='field'><input type=text name='link_sub' value='$r[link_sub]' class='input-xlarge'></span>
   </p> 
		
		 <p>
 <label>Menu Utama</label>
 <span class='field'>
 <select name='id_menu' class='uniformselect'>";
  $tampil=mysqli_query($koneksi, "SELECT * FROM menu ORDER BY id_menu");
   if ($r[id_menu]==0){
   echo "<option value=0 selected>- Pilih Menu Utama -</option>"; }   
	 while($w=mysqli_fetch_array($tampil)){
   if ($r[id_menu]==$w[id_menu]){
   echo "<option value=$w[id_menu] selected>$w[nama_menu]</option>";}
   else{
   echo "<option value=$w[id_menu]>$w[nama_menu]</option> </p> ";}}


	
 echo"</select>
 </span>
 </p>";
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