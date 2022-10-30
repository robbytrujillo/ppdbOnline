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
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_halamanstatis/aksi_halamanstatis.php";
switch($_GET[act]){
  // Tampil Halaman Statis
  default:
     echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='media.php?module=home'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Menu Website</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-bell'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Halaman</h5>
                <h1>Halaman</h1>
            </div>
        </div><!--pageheader-->

       <div class='maincontent'>
            <div class='maincontentinner'>
			
			 <h4 class='widgettitle'>
				<a href='?module=halamanstatis&act=tambahhalamanstatis' class='btn btn-warning btn-rounded'><i class='icon-plus icon-white'></i>Tambah Halaman</a>
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
	<th>Judul Halaman</th>
	<th>Link</th>
	<th>Tanggal Posting</th>
	<th>Aksi</th>
	
   </thead>
   <tbody>";

    $tampil = mysqli_query($koneksi, "SELECT * FROM halamanstatis ORDER BY id_halaman DESC");
  
    $no = 1;
    while($r=mysqli_fetch_array($tampil)){
      $tgl_posting=tgl_indo($r[tgl_posting]);

      // membuat info link statis untuk halaman statis
      $huruf_kecil  = strtolower($r[judul]);
      $pisah_huruf  = explode(" ",$huruf_kecil);
      $gabung_huruf = implode("",$pisah_huruf);

      echo "<tr><td class='left' width='25'>$no</td>
                <td class='left'>$r[judul]</td>
                <td class='left'>hal-$r[judul_seo].html</td>
                <td class='left'>$tgl_posting</td>
		        <td width=80>   
   <a href=?module=halamanstatis&act=edithalamanstatis&id=$r[id_halaman] title='Edit' class='btn btn-info btn-circle'><i class='iconfa-pencil'></i></a>   
   <a href=javascript:confirmdelete('$aksi?module=halamanstatis&act=hapus&id=$r[id_halaman]') 
   title='Hapus' class='btn btn-danger btn-circle'><span class='iconfa-remove'></span></a>
	   
   </td>
		        </tr>";
      $no++;
    }
    echo "</tbody></table>";
    break;

  case "tambahhalamanstatis":
    echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='media.php?module=home'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Halaman PPDB</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-bell'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Halaman</h5>
                <h1>Halaman</h1>
            </div>
        </div><!--pageheader-->
       <div class='maincontent'>
            <div class='maincontentinner'>
			               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Tambah Halaman</h4>
                <div class='widgetcontent nopadding'>
          <form class='stdform stdform2' method=POST action='$aksi?module=halamanstatis&act=input' enctype='multipart/form-data'>
         <p> 
   		<label>Nama Halaman</label>
   		<span class='field'><input type=text name='judul'0></span>
		</p> 
		<p> 
         <label>Isi Halaman</label>
		 <span class='field'><textarea name='isi_halaman' id='editor'  placeholder='Enter text ...' style='width: 750px; height: 400px'></textarea></span>
		 </p>
         <p>
		 <label>Isi Halaman</label>
		  <span class='field'><input type=file name='fupload' size=40> 
          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 400 px</span>
		</P>								  
          <p class='stdformbutton'>
                                <button class='btn btn-primary'>Simpan</button>
								<input type=button value=Batal onclick=self.history.back() class='btn btn-warning btn-rounded'>
                                
                            </p></form>";
     break;
    
  case "edithalamanstatis":
    $edit = mysqli_query($koneksi, "SELECT * FROM halamanstatis WHERE id_halaman='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);

   echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='media.php?module=home'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Halaman PPDB</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-bell'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Halaman</h5>
                <h1>Halaman</h1>
            </div>
       </div>
       <div class='maincontent'>
            <div class='maincontentinner'>
			 <div class='maincontentinner'>
               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Edit Halaman</h4>
                <div class='widgetcontent nopadding'>
          <form class='stdform stdform2' method=POST enctype='multipart/form-data' action=$aksi?module=halamanstatis&act=update>
          <input type=hidden name=id value=$r[id_halaman]>
         
		  <p> 
   		<label>Nama Halaman</label>
   		<span class='field'><input type=text name='judul' value='$r[judul]'></span>
		</p> 
		<p>
		<p> 
         <label>Isi Halaman</label>
		 <span class='field'><textarea name='isi_halaman' id='editor'  placeholder='Enter text ...' style='width: 750px; height: 400px'>$r[isi_halaman]</textarea></span>
		 </p>";
          if ($r[gambar]!=''){
              echo "<p>
		 <label>Gambar</label>
		  <span class='field'><img src='../foto_statis/$r[gambar]'></span></p>";  
          }
    echo "<p>
		 <label> Ganti Gambar</label>
		 <span class='field'><input type=file name='fupload'></span>
		 </p>";

    echo"</p>	  
 		<p class='stdformbutton'>
                                <button class='btn btn-primary'>Update</button>
								<input type=button value=Batal onclick=self.history.back() class='btn btn-warning btn-rounded'>
                                
                            </p></form>";
    break;  
}

}
?>
