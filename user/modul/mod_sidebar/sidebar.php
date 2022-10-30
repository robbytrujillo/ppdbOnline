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



$aksi="modul/mod_sidebar/aksi_sidebar.php";
switch($_GET[act]){
  // Tampil Menu
  default:
  
  echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='media.php?module=home'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Layout Sidebar</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-columns'></span></div>
            <div class='pagetitle'>
                <h5>Atur Layout Sidebar</h5>
                <h1>Sidebar</h1>
            </div>
        </div><!--pageheader-->

        <div class='maincontent'>
            <div class='maincontentinner'>
			
			 <h4 class='widgettitle'>
				<a href='?module=sidebar&act=tambahsidebar' class='btn btn-warning btn-rounded'><i class='icon-plus icon-white'></i>Tambah Widget</a>
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
	<th>Nama Widget</th>
	<th>Script</th>
	<th>Posisi</th>
	<th>Aktif</th>
	<th>Aksi</th>
	
   </thead>
   <tbody>";

   

    if ($_SESSION[leveluser]=='admin'){
      $tampil=mysqli_query($koneksi, "SELECT * FROM sidebar ORDER BY id_sidebar DESC");
    }
    else{
      $tampil=mysqli_query($koneksi, "SELECT * FROM sidebar 
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id_sidebar DESC");
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
    <td width=220>$r[nama_sidebar]</td>
	<td width=220>$r[code]</td>
	<td width=220>$r[posisi]</td>
	<td width=220>$r[aktif]</td>
    <td class=center>   
   <a href=?module=sidebar&act=editsidebar&id=$r[id_sidebar] title='Edit' class='btn btn-info btn-circle'><i class='iconfa-pencil'></i></a>   
   
   </td></tr>";		
      $no++;
    }
    echo "</table>";

    
    break;

  
  case "tambahsidebar":
  
   echo"<div class='rightpanel'>
  	  <ul class='breadcrumbs'>
       <li><a href='media.php?module=home'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Layout Sidebar</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-columns'></span></div>
            <div class='pagetitle'>
                <h5>Atur Layout Sidebar</h5>
                <h1>Tambah Widget</h1>
            </div>
        </div><!--pageheader-->

		<div class='maincontent'>
            <div class='maincontentinner'>
               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Tambah Menu</h4>
                <div class='widgetcontent nopadding'>
	 
	
  <form class='stdform stdform2' method=POST action='$aksi?module=sidebar&act=input' enctype='multipart/form-data'>
     
   <p> 
   <label>Nama Widget</label>
  	<span class='field'><input type=text name='nama_sidebar' class='input-xlarge'></span>
   </p> 
     <p> 
   <label>Code Script</label>
  	<span class='field'><input type=text name='code' class='input-xlarge'></span>
   </p> 
   <p> 
   <label>Posisi</label>
  	<span class='field'><input type=text name='posisi' class='input-xlarge'></span>
   </p> 

   
	 <p>
	 <label>aktif</label>
	 <span class='field'>
	 <select name='aktif' class='uniformselect'>
	 <option value='' /><b>- Aktifkan - </b>
	 <option value='Y' />Aktif
	 <option value='N' />Non Aktif
	 </select>
	 </span>
	 </p>		
									<p class='stdformbutton'>
                                <button class='btn btn-primary'>Simpan</button>
								<input type=button value=Batal onclick=self.history.back() class='btn btn-warning btn-rounded'>
                                
                            </p>
   </form></div>";
   
    break;
  

  case "editsidebar":
    $edit = mysqli_query($koneksi, "SELECT * FROM sidebar WHERE id_sidebar='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);

   echo"<div class='rightpanel'>
  	    <ul class='breadcrumbs'>
       <li><a href='media.php?module=home'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Layout Sidebar</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-columns'></span></div>
            <div class='pagetitle'>
                <h5>Atur Layout Sidebar</h5>
                <h1>Edit Widget</h1>
            </div>
        </div><!--pageheader-->
		<div class='maincontent'>
            <div class='maincontentinner'>
               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Edit Widget</h4>
                <div class='widgetcontent nopadding'>
	 
  <form class='stdform stdform2' method=POST action='$aksi?module=sidebar&act=update' enctype='multipart/form-data'>
   <input type=hidden name=id value=$r[id_sidebar]>
   
    <p> 
   <label>Nama Menu</label>
  	<span class='field'><input type=text name='nama_sidebar' value='$r[nama_sidebar]' class='input-xlarge'></span>
   </p> 
   
       <p> 
   <label>Code Script</label>
  	<span class='field'><input type=text name='code' value='$r[code]' class='input-xlarge'></span>
   </p> 
   
    <p> 
   <label>Posisi</label>
  	<span class='field'><input type=text name='posisi' value='$r[posisi]' class='input-xlarge'></span>
   </p> 
     	
		 <p>
 <label>Aktif</label>
 <span class='field'>
 <select name='aktif' class='uniformselect'>";
	if ($r['aktif']=='Y'){
	echo"<option value='Y' />Aktif";
	echo"<option value='N' />Non Aktif";
	}else{
 	echo"<option value='N' />Non Aktif";
	echo"<option value='Y' />Aktif";
	 }
 echo"</select>
 </span>
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