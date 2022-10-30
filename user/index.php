<?php 
  error_reporting(0);
  session_start();
  include "../config/koneksi.php";
  include "../config/library.php";
  include "../config/fungsi_indotgl.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administrator &rsaquo; Log In</title>
    <meta name="author" content="imagomedia.co.id">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
    <script language="javascript">
    function validasi(form){
      if (form.username.value == ""){
        alert("Anda belum mengisikan Username.");
        form.username.focus();
        return (false);
      }
         
      if (form.password.value == ""){
        alert("Anda belum mengisikan Password.");
        form.password.focus();
        return (false);
      }
    </script>
  </head>
  <body OnLoad="document.login.username.focus();" class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>ADMIN</b> Login</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Silahkan Login Pada Form dibawah ini</p>

        <?php
          if (!empty($_SESSION['leveluser'])){
              echo "<script>document.location='media.php?module=home';</script>";
          }

            if (isset($_POST['submit'])){
              $username = anti_injection($_POST['username']);
              $data     = anti_injection(md5($_POST['password']));
              $pass=hash("sha512",$data);
                
                if (!ctype_alnum($username) OR !ctype_alnum($pass)){
                  echo "<div class='alert alert-danger'><center>Sekarang loginnya tidak bisa di injeksi lho</center></div>";
                }else{
                  $result = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$pass' AND blokir='N'");
                    if(mysqli_num_rows($result) > 0) {
                      $r= mysqli_fetch_array($result);
                      session_start();
                      $_SESSION['namauser']     = $r['username'];
                      $_SESSION['namalengkap']  = $r['nama_lengkap'];
                      $_SESSION['email']        = $r['email'];
                      $_SESSION['passuser']     = $r['password'];
                      $_SESSION['sessid']       = $r['id_session'];
                      $_SESSION['leveluser']    = $r['level'];
                      $_SESSION['upload_image_file_manager'] = true;
                      echo "<script>document.location='media.php?module=home';</script>";
                   }else{
                      echo "<div class='alert alert-danger'><center>Username atau Password anda tidak sesuai.<br>
                                                Atau akun anda sedang diblokir.</center></div>";
                   }
                  
                }
              }

              if (isset($_POST['lupa'])){
                $email = anti_injection($_POST['email']);
                $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
                if (mysqli_num_rows($cek) > 0){
                  $row = mysqli_fetch_array($cek);
                  $randompass = generateRandomString(10);
                  $pass=hash("sha512",md5($randompass));
                  mysqli_query($koneksi, "UPDATE users SET password='$pass' WHERE email='$email'");

                   $iden=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM identitas"));
                   $kepada = "$_POST[email]"; 
                   $judul = "Permintaan Reset Password anda di $iden[url]";
                   $header = "MIME-Version: 1.0" . "\r\n";
                   $header .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
                   $header .= 'From: '.$iden['url'].' <noreply@'.$_POST['url'].'>'. "\r\n";
                   $pesan = "Pada tanggal ".$hari_ini." tanggal ".tgl_indo(date('Y-m-d')).", ".date('H:i:s')." anda meminta reset password di $iden[url]\n"; 
                   $pesan .= "<table style='margin-left:25px'>
                                <tr><td style='background:green; color:#fff; pading:20px' cellpadding=6 colspan='2'><b>Silahkan login dengan : </b></td></tr>
                                <tr><td style='width:175px'><b>Username</b></td><td> : ".$row['username']."</td></tr>
                                <tr><td style='width:175px'><b>Password</b></td><td> : ".$randompass."</td></tr>
                              </table>"; 
                   mail($kepada,$judul,$pesan,$header); 
                    echo "<div class='alert alert-success'><center>Password baru telah dikirimkan ke : <br> $email</center></div>";
                }else{
                    echo "<div class='alert alert-danger'><center>Alamat email Tidak ditemukan!</center></div>";
                }
              }
          ?>

        <form action="" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name='username' placeholder="Username" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name='password' placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button name="submit" type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

        <hr>
        <a class='link' data-dismiss="modal" aria-hidden="true" data-toggle='modal' href='#lupapass' data-target='#lupapass'>Anda Lupa Password?</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="assets/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>

    <div class="modal fade" id="lupapass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h5 class="modal-title" id="myModalLabel">Lupa Password Login?</h5>
              </div><center>
              <div class="modal-body">
                          <form action="" class='form-horizontal' method="post">
                            <div class="form-group">
                                <center style='color:red'>Masukkan Email yang terkait dengan akun!</center><br>
                                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                <div style='background:#fff;' class="input-group col-sm-8">
                                    <span class="input-group-addon"><i class='fa fa-envelope fa-fw'></i></span>
                                    <input style='text-transform:lowercase;' type="email" class="required form-control" name="email">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-3">
                                    <button type="submit" name='lupa' class="btn btn-primary btn-sm">Kirimkan Permintaan</button>
                                    &nbsp; &nbsp; &nbsp;<a data-dismiss="modal" aria-hidden="true" data-toggle='modal' href='#login' data-target='#login' title="Lupa Password Members">Kembali Login?</a>
                                </div>
                            </div>

                        </form><div style='clear:both'></div>
              </div>
              </center>
            </div>
          </div>
        </div>
  </body>
</html>
