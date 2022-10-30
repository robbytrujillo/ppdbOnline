<script type="text/javascript" src="js/forms.js"></script>
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

$aksi="modul/mod_pendaftaran/aksi_pendaftaran.php";
switch($_GET[act]){
  // Tampil Pendaftaran
  default:
   echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='media.php?module=home'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Pendaftaran</li>
       </ul>
       <div class='pageheader'>
	    <form class='searchbar' />
              <a target='_blank' href='../laporan-pendaftaran.html' class='btn btn-primary'>Cetak Laporan Data Pendaftaran</a>
            </form>
        	<div class='pageicon'><span class='iconfa-book'></span></div>
            <div class='pagetitle'>
                <h5>Data Pendaftaran PPDB</h5>
                <h1>Pendaftaran PPDB</h1>
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
          <th>no</th>
          <th>No Pendaftaran</th>
          <th>Nama</th>
          <th>TTL</th>
		  <th>No Telp</th>
          <th>Tanggal Daftar</th>
		  <th>Aksi</th>
          </tr></thead><tbody>";



    $tampil=mysqli_query($koneksi, "SELECT * FROM pendaftaran ORDER BY id_pendaftaran");

    $no = $posisi+1;
    while ($r=mysqli_fetch_array($tampil)){
      $tgl=tgl_indo($r[tgl_lahir]);
	  $daftar=tgl_indo($r[tgl_pendaftaran]);
	  
      echo "<tr><td class='left' width='25'>$no</td>                
			<td>PSB/$r[id_pendaftaran]/2014</td>
			<td>$r[nama]</td>
            <td>$r[tempat],$tgl</a></td>
			<td>$r[telp]</td>
			<td>$daftar</a></td>
			<td class='center'><a href=?module=pendaftaran&act=editpendaftaran&id=$r[id_pendaftaran] title='Edit' class='btn btn-info btn-circle'><i class='iconfa-pencil'></i></a>
			<a href='../bukti-pendaftaran-$r[id_pendaftaran].html' target='_blank' title='Cetak' class='btn btn-warning btn-circle'><i class=' iconfa-download-alt'></i></a></td>
               </tr>";
    $no++;
    }

    echo "</tbody></table>";
    $jmldata=mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pendaftaran"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div class=pagination>Hal: $linkHalaman</div><br>";
    break;

 

  case "editpendaftaran":
   $edit = mysqli_query($koneksi, "SELECT *  FROM pendaftaran WHERE id_pendaftaran='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);

  echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='media.php?module=home'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Pendaftaran</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-book'></span></div>
            <div class='pagetitle'>
                <h5>Data Pendaftaran PPDB</h5>
                <h1>Pendaftaran PPDB</h1>
            </div>
        </div><!--pageheader-->

        <div class='maincontent'>
          <div class='maincontentinner'>
		  <div class='widgetbox box-inverse'>
          <h4 class='widgettitle'>Edit Calon Siswa</h4>
          <div class='widgetcontent nopadding'>
          <form class='stdform stdform2' method=POST enctype='multipart/form-data' action=$aksi?module=pendaftaran&act=update>
          <input type=hidden name=id value=$r[id_pendaftaran]>
 		  <p> 
   		  <label>Nama Calon Siswa</label>
		  <span class='field'><input type=text name='nama' size=40 value='$r[nama]'></span>
		  </p>
		  <p>
		   <p> 
   		  <label>Tempat Lahir</label>
		  <span class='field'><input type=text name='tempat' size=30 value='$r[tempat]'></span>
		  </p>
		  <div class='par'>
          <label>Tanggal Lahir</label>
          <span class='field'><input id='datepicker' type='text' name='tanggal_lahir' value='$r[tgl_lahir]' class='input-small' /></span>
          </div> 
		  
		  <p><label>Tanggal Lahir</label>
		  <span class='field'><select name='jenis_kelamin'>";
          if ($r[jenkel]=='P'){
		   echo "<option value='L'>Laki-laki</option>";
           echo "<option value='P' selected>Perempuan</option>";}
           else{
 		  echo "<option value='L' selected>Laki-laki</option>";
  		  echo "<option value='P' >Perempuan</option>";
          }
    	  echo "</select></span></p>
		  <p><label>Agama</label>
		  <span class='field'><select name='agama' id='select'>
			<option value='Islam'>Islam</option>
			<option value='Kristen'>Kristen</option>
			<option value='Katolik'>Katolik</option>
			<option value='Hindhu'>Hindhu</option>
			<option value='Budha'>Budha</option>
			</select></span></p>
			 <p>
		 <label>Asal Sekolah</label>
		 <span class='field'>
		 <select name='asal_sekolah' class='uniformselect'>";
		  $tampil=mysqli_query($koneksi, "SELECT * FROM sekolah WHERE aktif='Y' ORDER BY nama_sekolah DESC");
		   if ($r[asal_sekolah]==0){
		   echo "<option value=0 selected>- Pilih Sekolah -</option>"; }   
		  while($w=mysqli_fetch_array($tampil)){
		   if ($r[asal_sekolah]==$w[id_sekolah]){
		   echo "<option value=$w[id_sekolah] selected>$w[nama_sekolah]</option>";}
		   else{
		   echo "<option value=$w[id_sekolah]>$w[nama_sekolah]</option> </p> ";}}
		 echo"</select>
		 </span>
		 </p>
		  <p><label>Alamat</label>
		  <span class='field'><input type=text name='alamat' class='input-xxlarge' value='$r[alamat]'>
		  </span></p>

		  <p><label>Nama ayah/Wali</label>
		  <span class='field'><input type=text name='wali' size=40 value='$r[wali]'>
		  </span></p>
	      <p><label>No Telp</label>
		  <span class='field'><input type=text name='telp' size=20 value='$r[telp]'>
		  </span></p>
		  <p><label>Email</label>
		  <span class='field'><input type=text name='email' size=40 value='$r[email]'>
		  </span></p>
";	  
		      echo  "<p class='stdformbutton'>
                                <button class='btn btn-primary'>Update</button>
								<input type=button value=Batal onclick=self.history.back() class='btn btn-warning btn-rounded'>
                                
                            </p></form>";
    break;  
}
}
?>
