<div class="main-content-left">
 
  <?php
    
  
  $nama=trim($_POST[nama]);
  $email=trim($_POST[email]);

  $pesan=trim($_POST[pesan]);
  
  $iden=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM identitas"));

if(empty($nama)) {
			echo 'Anda belum mengisikan NAMA<br/>';
			$err = TRUE;
		}
		if(empty($email)) {
			echo 'Anda belum mengisikan EMAIL<br/>';
			$err = TRUE;
		}
		
		if(empty($pesan)) {
			echo 'Anda belum mengisikan PESAN<br/>';
			$err = TRUE;
		}
		if($err) {
			echo'<a href="javascript:history.go(-1)"><b>Ulangi Lagi</b><br/>';
		} elseif(!$err) {
  if(!empty($_POST['kode'])){
  if($_POST['kode']==$_SESSION['captcha_session']){

  mysqli_query($koneksi, "INSERT INTO bukutamu(nama,
                                   email,
                                   pesan,
                                   tanggal) 
                        VALUES('$_POST[nama]',
                               '$_POST[email]',
                               '$_POST[pesan]',
                               '$tgl_sekarang')");
 
 
header('location:bukutamu.html');
  
  }
  
  else{
  echo "<span class='table8'>Kode yang Anda masukkan tidak cocok<br />
  <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";}}
  else{
  echo "<span class='table8'>Anda belum memasukkan kode<br />
  <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";}}
      

	
   echo "</div>";            
  ?>

  