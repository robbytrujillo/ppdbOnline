<div class="main-content-left">
 
  <?php
    
  
  $nama=trim($_POST['nama']);
  $email=trim($_POST['email']);
  $subjek=trim($_POST['subjek']);
  $pesan=trim($_POST['pesan']);
  
  $iden=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM identitas"));

if(empty($nama)) {
			echo 'Anda belum mengisikan NAMA<br/>';
			$err = TRUE;
		}
		if(empty($email)) {
			echo 'Anda belum mengisikan EMAIL<br/>';
			$err = TRUE;
		}
		if(empty($subjek)) {
			echo 'Anda belum mengisikan SUBJEK<br/>';
			$err = TRUE;
		}
		if(empty($pesan)) {
			echo 'Anda belum mengisikan PESAN<br/>';
			$err = TRUE;
		}
		

  if(!empty($_POST['kode'])){
  if($_POST['kode']==$_SESSION['captcha_session']){

  mysqli_query($koneksi, "INSERT INTO hubungi(nama,
                                   email,
                                   subjek,
                                   pesan,
                                   tanggal) 
                        VALUES('$_POST[nama]',
                               '$_POST[email]',
                               '$_POST[subjek]',
                               '$_POST[pesan]',
                               '$tgl_sekarang')");
 
 
  echo "<p><img src='images/terimakasih.jpg'   border=0></p>";
  
   $kepada = "$iden[email]"; 
   $judul = "Ada Pesan di $iden[nama_website]";
   $pesan = "Baru saja ada yang kirim pesan di $iden[nama_website]\n"; 
   $pesan .= "kunjungi $iden[url]"; 
   mail($kepada,$judul,$pesan,"From: $iden[email]\n Content-type:text/html\r\n"); }
  
  else{
  echo "<span class='table8'>Kode yang Anda masukkan tidak cocok<br />
  <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";}}
  else{
  echo "<span class='table8'>Anda belum memasukkan kode<br />
  <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";}
      

	
   echo "</div>";            
  ?>

  