<div class="main-content-left">
						<div class="content-article-title">
							<h2>Form Pendaftaran PPDB</h2>
						</div>
 
  <?php
  if ($_POST['nama']!='')
  {
    $lahir=$_POST['thn_lahir'].'-'.$_POST['bln_lahir'].'-'.$_POST['tgl_lahir'];
  mysqli_query($koneksi, "INSERT INTO pendaftaran(nama,
                                   tempat,
                                   tgl_lahir,
                                   agama,
								   alamat,
								   jenis_kelamin,
								   asal_sekolah,
								   wali,
								   email,
								   telp,
								   tgl_pendaftaran) 
                        VALUES('$_POST[nama]',
                               '$_POST[tempatlahir]',
							  '$lahir',
                               '$_POST[agama]',
							   '$_POST[alamat]',
                               '$_POST[jenis_kelamin]',
							   '$_POST[sekolah]',
							   '$_POST[wali]',
							   '$_POST[email]',
							   '$_POST[telp]',
                               '$tgl_sekarang')");
 
  echo "<p><img src='images/sukses.jpg'  width='670px' border=0></p>
  <br/>
  <div class='shortcode-content'>
  <div class='spacer-break'></div>";
	 $tampil=mysqli_query($koneksi, "SELECT * FROM pendaftaran order by id_pendaftaran DESC limit 1"); 
	while($w=mysqli_fetch_array($tampil)){
 	echo"<a href='bukti_pendaftaran/bukti_pendaftaran_user.php?&no_pendaftaran=$w[id_pendaftaran]' target='_blank' class='button-big color-custom' style='background: #73af3e;'>
	<span class='icon-text'>&#128077;</span>Download Bukti Pendaftaran</a>
    <a href='bukti_pendaftaran/bukti_pendaftaran_user.php?&no_pendaftaran=$w[id_pendaftaran]' target='_blank' class='button-big color-custom' style='background: #3894ae;'>
	<span class='icon-text'>&#128077;</span>Cetak Bukti Pendaftaran</a>";
    }
	}
	else
	{
	echo"<div class='shortcode-content'>
 <div class='alert-box' style='background:#bf360b;'><span class='icon-text'>&#9888;</span><span class='alert-text'>Anda Tidak Berhak Mengakses Halaman Ini</span><a href='form-pendaftaran.html' class='closebutton'>&#10060;</a></div>
 ";
	}
   ?>
    <div class="spacer-break"></div>
    </div>
</div>