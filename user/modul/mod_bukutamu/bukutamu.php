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



$aksi="modul/mod_bukutamu/aksi_bukutamu.php";
switch($_GET[act]){

  // Tampil Hubungi Kami
  default:
echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='media.php?module=home'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Buku Tamu</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-book'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Buku Tamu</h5>
                <h1>Buku Tamu</h1>
            </div>
        </div><!--pageheader-->

        <div class='maincontent'>
            <div class='maincontentinner'>
			

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
	<th>Email</th>
	<th>Pesan</th>
	<th>Tanggal</th>
	<th>Aksi</th>
	
   </thead>
   <tbody>";
    $tampil=mysqli_query($koneksi,  "SELECT * FROM bukutamu ORDER BY id_bukutamu DESC");
    $no = $posisi+1;
    while ($r=mysqli_fetch_array($tampil)){
      $tgl=tgl_indo($r[tanggal]);
      echo "<tr><td>$no</td>
                <td>$r[nama]</td>
                <td><a href=?module=bukutamu&act=balasemail&id=$r[id_bukutamu]>$r[email]</a></td>
                <td>$r[pesan]</td>
                <td>$tgl</a></td>
				<td width=80>   
				<a href=javascript:confirmdelete('$aksi?module=bukutamu&act=hapus&id=$r[id_bukutamu]')  title='Hapus' class='btn btn-danger btn-circle'><span class='iconfa-remove'></span></a>
               
                </td></tr>";
    $no++;
    }
    echo "</tbody></table>";
    $jmldata=mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM bukutamu"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div class=pagination>Hal: $linkHalaman</div><br>";
    break;

  case "balasemail":
    $tampil = mysqli_query($koneksi, "SELECT * FROM bukutamu WHERE id_bukutamu='$_GET[id]'");
    $r      = mysqli_fetch_array($tampil);
echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='media.php?module=home'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Reply Email</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-book'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Buku Tamu</h5>
                <h1>Reply Email</h1>
            </div>
        </div>
		<div class='maincontent'>
            <div class='maincontentinner'>
               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Reply Email</h4>
                <div class='widgetcontent nopadding'>
	           <form class='stdform stdform2' method=POST action='?module=bukutamu&act=kirimemail'>
        
          <p>
		  <label>Kepada</label>
		  <span class='field'><input type=text name='email'  value='$r[email]'></span>
		  </p>
		  
          <p>
		  <label>Subjek</label>
		  <span class='field'><input type=text name='subjek' class='input-xxlarge' value='Re: $r[subjek]'></span>
		  </p>
           <p>
		  <label>Pesan</label>
		  <span class='field'><textarea name='pesan' id='loko'  style='width: 750px; height: 200px''><br><br><br><br>     
  ---------------------------------------------------------------------------------------------------------------------
  $r[pesan]</textarea></span>
  </p>
        <p class='stdformbutton'>
                                <button class='btn btn-primary'>Kirim</button>
								<input type=button value=Batal onclick=self.history.back() class='btn btn-warning btn-rounded'>
                                
                            </p></form>";
     break;
    
  case "kirimemail":
    mail($_POST[email],$_POST[subjek],$_POST[pesan],"From: agus_pacitan@yahoo.co.id");
    echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='media.php?module=home'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Reply Email</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-book'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Buku Tamu</h5>
                <h1>Reply Email</h1>
            </div>
        </div>
		<div class='maincontent'>
            <div class='maincontentinner'>
               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Status Email</h4>
                <div class='widgetcontent nopadding'>
		
          <p>Email telah sukses terkirim ke tujuan</p>
          <p>[ <a href=javascript:history.go(-2)>Kembali</a> ]</p>";	 		  
    break;  
}
}
?>
