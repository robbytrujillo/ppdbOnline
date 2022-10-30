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



$aksi="modul/mod_agenda/aksi_agenda.php";
switch($_GET[act]){
  // Tampil Agenda
  default:
  
  echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='../'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Komentar</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-calendar'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Agenda</h5>
                <h1>Agenda</h1>
            </div>
        </div><!--pageheader-->

        <div class='maincontent'>
            <div class='maincontentinner'>
			
			 <h4 class='widgettitle'>
				<a href='?module=agenda&act=tambahagenda' class='btn btn-warning btn-rounded'><i class='icon-plus icon-white'></i>Tambah Agenda</a>
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
	<th>Tema</th>
	<th>Tgl. Mulai</th>
	<th>Tgl. Selesai</th>
	<th>Aksi</th>
	
   </thead>
   <tbody>";
    if ($_SESSION[leveluser]=='admin'){
    $tampil = mysqli_query($koneksi, "SELECT * FROM agenda ORDER BY id_agenda DESC");
	}
	else{
    $tampil=mysqli_query($koneksi, "SELECT * FROM agenda WHERE username='$_SESSION[namauser]' ORDER BY id_berita DESC");}
	 $no = $posisi+1;
    while ($r=mysqli_fetch_array($tampil)){
      $tgl_mulai   = tgl_indo($r[tgl_mulai]);
      $tgl_selesai = tgl_indo($r[tgl_selesai]);
    
   echo "<tr class=gradeX>
   <td width=50><center>$no</center></td>
    <td width=220>$r[tema]</td>
    <td>$tgl_mulai</td>
    <td>$tgl_selesai</td>
		
    <td width=80>
   
   <a href=?module=agenda&act=editagenda&id=$r[id_agenda] title='Edit' class='btn btn-info btn-circle'><i class='iconfa-pencil'></i></a>
   
   <a href=javascript:confirmdelete('$aksi?module=agenda&act=hapus&id=$r[id_agenda]&namafile=$r[gambar]') 
   title='Hapus' class='btn btn-danger btn-circle'><span class='iconfa-remove'></span></a>
	   
   </td></tr>";		
      $no++;
    }
    echo "</table>";



    break;

  
  case "tambahagenda":
  
   echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='media.php?module=home'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Agenda</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-calendar'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Agenda </h5>
                <h1>Tambah Agenda</h1>
            </div>
        </div><!--pageheader-->
		<div class='maincontent'>
            <div class='maincontentinner'>
               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Edit Agenda</h4>
                <div class='widgetcontent nopadding'>
	 
	
  <form class='stdform stdform2' method=POST action='$aksi?module=agenda&act=input' enctype='multipart/form-data'>
     
   <p> 
   <label>Tema</label>
  	<span class='field'><input type=text name='tema' size=60></span>
   </p> 		 
   
   <p> 
   <label>Isi Agenda</label>
  <span class='field'><textarea name='isi_agenda' id='editor' style='width: 720px; height: 350px;'></textarea></span>
   </p> 		 
   
   <p> 
   <label>Gambar</label>
   <span class='field'><input type=file name='fupload'></span>
   </p> 		 
   		  	
   <p> 
   <label>Tempat</label>
  <span class='field'><input type=text name='tempat' size=40></span>
   </p> 			
					 
   <p> 
   <label>Jam</label>
  <span class='field'><input type=text name='jam' size=40></span>
   </p> 			
			
			
  <p> 
  <label>Tgl Mulai</label>  <span class='field'>";        
  combotgl(1,31,'tgl_mulai',$tgl_skrg);
  combonamabln(1,12,'bln_mulai',$bln_sekarang);
  combothn(2000,$thn_sekarang,'thn_mulai',$thn_sekarang);

  echo "</p> </span><p> 
          <label>Tgl Selesai</label><span class='field'> ";        
          combotgl(1,31,'tgl_selesai',$tgl_skrg);
          combonamabln(1,12,'bln_selesai',$bln_sekarang);
          combothn(2000,$thn_sekarang,'thn_selesai',$thn_sekarang);

    echo "</span></p>
    
									<p class='stdformbutton'>
                                <button class='btn btn-primary'>Update</button>
								<input type=button value=Batal onclick=self.history.back() class='btn btn-warning btn-rounded'>
                                
                            </p>
   </form></div>";
   
    break;
  

  case "editagenda":
    $edit = mysqli_query($koneksi, "SELECT * FROM agenda WHERE id_agenda='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);

   echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='media.php?module=home'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Agenda</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-calendar'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Agenda</h5>
                <h1>Agenda</h1>
            </div>
        </div><!--pageheader-->
		<div class='maincontent'>
            <div class='maincontentinner'>
               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Edit Berita</h4>
                <div class='widgetcontent nopadding'>
	 
  <form class='stdform stdform2' method=POST action='$aksi?module=agenda&act=update' enctype='multipart/form-data'>
   <input type=hidden name=id value=$r[id_agenda]>
		  
   <p>
   <label>Tema</label>
   <span class='field'><input type=text name='tema' size=60 value='$r[tema]'></span>
   </p> 	
   
   		  
   <p> 
   <label>Isi Agenda</label>
  <span class='field'><textarea name='isi_agenda' id='editor' style='width: 720px; height: 350px;'>$r[isi_agenda]</textarea>
   </p> 	
   
     <p> 
   <label>Gambar</label>
  	 <span class='field'><img src='../foto_agenda/$r[gambar]'><br/></span>
   </p> 	
   
   <pl> 
   <label>Ganti Gambar</label>
  <span class='field'><input type=file name='fupload' size=30></span>
   </p> 
		  
   
   <p> 
   <label>Tempat</label>
  <span class='field'><input type=text name='tempat' size=40 value='$r[tempat]'></span>
   </p> 
   
      
   <p> 
   <label>Jam</label>
 <span class='field'>  <input type=text name='jam' size=40 value='$r[jam]'>
   </p> 
     	
   <p> 
   <label>Tgl Mulai</label><span class='field'> ";  
          $get_tgl=substr("$r[tgl_mulai]",8,2);
          combotgl(1,31,'tgl_mulai',$get_tgl);
          $get_bln=substr("$r[tgl_mulai]",5,2);
          combonamabln(1,12,'bln_mulai',$get_bln);
          $get_thn=substr("$r[tgl_mulai]",0,4);
          $thn_skrg=date("Y");
          combothn($thn_sekarang-2,$thn_sekarang+2,'thn_mulai',$get_thn);

   		 
		 
    echo "</p></span> <pl> 
          <label>Tgl Selesai</label><span class='field'>";   
          $get_tgl2=substr("$r[tgl_selesai]",8,2);
          combotgl(1,31,'tgl_selesai',$get_tgl2);
          $get_bln2=substr("$r[tgl_selesai]",5,2);
          combonamabln(1,12,'bln_selesai',$get_bln2);
          $get_thn2=substr("$r[tgl_selesai]",0,4);
          combothn($thn_sekarang-2,$thn_sekarang+2,'thn_selesai',$get_thn2);

    echo "</span></p>
    
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