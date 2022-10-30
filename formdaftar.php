<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<script type="text/javascript" src="jscript/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="jscript/js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="jscript/js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="jscript/js/bootstrap.min.js"></script>
<script type="text/javascript" src="jscript/js/bootstrap-fileupload.min.js"></script>
<script type="text/javascript" src="jscript/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="jscript/js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="jscript/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="jscript/js/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="jscript/js/jquery.autogrow-textarea.js"></script>
<script type="text/javascript" src="jscript/js/charCount.js"></script>
<script type="text/javascript" src="jscript/js/ui.spinner.min.js"></script>
<script type="text/javascript" src="jscript/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="jscript/js/jquery.cookie.js"></script>
<script type="text/javascript" src="jscript/js/modernizr.min.js"></script>
<script type="text/javascript" src="jscript/js/custom.js"></script>
<script type="text/javascript" src="jscript/js/forms.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>

<div class="mainwrapper">


        <div class="maincontent">
            <div class="maincontentinner">
            
  <div class="widgetbox box-inverse">
                <h4 class="widgettitle">Isi Data Anda Melalui Form dibawah ini </h4>
                <div class="widgetcontent wc1">
                    <form id="form1" class="stdform" method="post" action="aksi-pendaftaran.html" />
                            <div class="par control-group">
                                    <label class="control-label" for="nama">Nama</label>
                                <div class="controls"><input type="text" name="nama" class="input-large" /></div>
                            </div>
                            
                            <div class="control-group">
                                    <label class="control-label" for="tempatlahir">Tempat Lahir</label>
                                <div class="controls"><input type="text" name="tempatlahir"  class="input-large" /></div>
                            </div>
                            
                            
                            <div class="control-group">
                            <?php
							echo"<label class='control-label' for='tanggal_lahir'>Tanggal Lahir</label>";    
 
 							 combotgl(1,31,'tgl_lahir',$tgl_sekarang);
  							 combonamabln(1,12,'bln_lahir',$bln_sekarang);
  							 combothn(1990,$thn_sekarang,'thn_lahir',$thn_sekarang);
							?>
                            </div>
                            
                            <div class="par control-group">
                                <label class="control-label" for="jenis_kelamin">Jenis Kelamin</label>
                                <div class="controls"><select name="jenis_kelamin"  class="uniformselect">
                                    <option value="" /> Pilih Jenis Kelamin
                                    <option value="L" />Laki - Laki
                                    <option value="P" />Perempuan                                   
                                </select></div>
                            </div>
                            <div class="par control-group">
                                <label class="control-label" for="agama">Agama</label>
                                <div class="controls"><select name="agama"  class="uniformselect">
                                    <option value="" /> Pilih Agama
                                    <option value="islam" />Islam
                                    <option value="katolik" />Katolik  
                                    <option value="protestan" />Protestan 
                                    <option value="hindu" />Hindu
                                    <option value="budha" />Budha                                   
                                </select></div>
                            </div>
                            
                            <div class="par control-group">
                                <label class="control-label" for="sekolah">Sekolah Asal</label>
                                <div class="controls"><select name="sekolah"  class="uniformselect">
                                    <option value="" /> Pilih Sekolah
                                    <?php
									$sekolah = mysqli_query($koneksi, "SELECT * FROM sekolah WHERE aktif='Y' ORDER BY nama_sekolah DESC ");
									while($r=mysqli_fetch_array($sekolah)){
									echo"<option value='$r[id_sekolah]'/>$r[nama_sekolah]";
									}
									?>
                                </select></div>
                            </div>
                                                 
                            <div class="par control-group">
                                    <label class="control-label" for="email">Email</label>
                                <div class="controls"><input type="text" name="email"  class="input-xlarge" /></div>
                            </div>
                            
                            <div class="par control-group">
                                    <label class="control-label" for="alamat">Alamat</label>
                                <div class="controls"><textarea cols="80" rows="2" name="alamat" class="input-xxlarge" id="location"></textarea></div> 
                            </div>
                            
                            
         					<div class="par control-group">
                                    <label class="control-label" for="wali">Nama Ayah/Wali</label>
                                <div class="controls"><input type="text" name="wali"  class="input-xlarge" /></div>
                            </div>
                            
                            <div class="par control-group">
                                    <label class="control-label" for="telp">Telp</label>
                                <div class="controls"><input type="text" name="telp"  class="input-xlarge" /></div>
                            </div>
                            
                            
                                                    
                            <p class="stdformbutton">
                                    <button class="btn btn-primary">Daftar</button>
                            </p>
                    </form>
                </div><!--widgetcontent-->
            </div><!--widget-->
                         
              
               
            </div><!--maincontentinner-->
        </div><!--maincontent-->
</div><!--mainwrapper-->
</body>
</html>
