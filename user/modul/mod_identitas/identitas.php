  <?php
   $aksi="modul/mod_identitas/aksi_identitas.php";
  switch($_GET[act]){
  // Tampil identitas
  default:
    $sql  = mysqli_query($koneksi, "SELECT * FROM identitas LIMIT 1");
    $r    = mysqli_fetch_array($sql);

  
   echo "<div class='rightpanel'>
        
        <ul class='breadcrumbs'>
            <li><a href='media.php?module=home'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
           
            <li>Identitas</li>
            
            
        </ul>
        
        <div class='pageheader'>
                       <div class='pageicon'><span class='iconfa-star'></span></div>
            <div class='pagetitle'>
                <h5>Identitas</h5>
                <h1>Setting Identitas</h1>
            </div>
        </div><!--pageheader-->
        
        <div class='maincontent'>
            <div class='maincontentinner'><div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Silahkan Melakukan Kustomisasi Melalui Form Dibawah ini</h4>
                <div class='widgetcontent wc1'>
				
                    <form id='form1' class='stdform' method=POST enctype='multipart/form-data' action=$aksi?module=identitas&act=update>
					 <input type=hidden name=id value=$r[id_identitas]>
                            <div class='par control-group'>
                                    <label class='control-label' for='firstname'>Nama Website</label>
                               		<div class='controls'>
									<input type=text name='nama_website'  class='input-xlarge' value='$r[nama_website]'>
									</div>
                            </div>
							
							 <div class='par control-group'>
                                    <label class='control-label' for='firstname'>Pembuka</label>
                               		<div class='controls'>
									<input type=text name='pembuka'  class='input-xlarge' value='$r[pembuka]'>
									</div>
                            </div>
                            
      
							<div class='par control-group'>
                                    <label class='control-label' for='firstname'>Alamat Website</label>
                               		<div class='controls'>
									<input type=text name='url'  class='input-xlarge' value='$r[url]'>
									</div>
                            </div>
							
							<div class='par control-group'>
                                    <label class='control-label' for='firstname'>Facebook</label>
                               		<div class='controls'>
									<input type=text name='facebook'  class='input-xxlarge' value='$r[facebook]'>
									</div>
                            </div>
							
							<div class='par control-group'>
                                    <label class='control-label' for='firstname'>Google Plus</label>
                               		<div class='controls'>
									<input type=text name='google'  class='input-xxlarge' value='$r[google]'>
									</div>
                            </div>
							
							<div class='par control-group'>
                                    <label class='control-label' for='firstname'>Twitter</label>
                               		<div class='controls'>
									<input type=text name='twitter'  class='input-xxlarge' value='$r[twitter]'>
									</div>
                            </div>
									<div class='par control-group'>
                                    <label class='control-label' for='firstname'>WhatsApp</label>
                               		<div class='controls'>
									<input type=text name='no_wa'  class='input-xxlarge' value='$r[no_wa]'>
									</div>
                            </div>
							<div class='par control-group'>
                                    <label class='control-label' for='firstname'>Meta Deskripsi</label>
                               		<div class='controls'>
									<input type=text name='meta_deskripsi'  class='input-xxlarge' value='$r[meta_deskripsi]'>
									</div>
                            </div>
							
							<div class='par control-group'>
                                    <label class='control-label' for='firstname'>Meta Keyword</label>
                               		<div class='controls'>
									<input type=text name='meta_keyword'  class='input-xxlarge' value='$r[meta_keyword]'>
									</div>
                            </div>";
									if ($r[gambar]!=''){
    				echo "<div class='par control-group'>
                                    <label class='control-label' for='firstname'>Logo</label>
                               		<div class='controls'><img src=../images/$r[gambar] width=270></div>
                            </div>"; 
						}
						echo"
									
							<div class='par control-group'>
                                    <label class='control-label' for='firstname'>Jika Ganti Logo</label>
                               		<div class='controls'>
									<input type='file' name='fupload' />
									</div>
                            </div>
                                                    
                            <p class='stdformbutton'>
                                    <button class='btn btn-primary'>Simpan</button>
                            </p>
                    </form>
                </div><!--widgetcontent-->
            </div><!--widget-->";

  }
include "footer.php";
    ?>

   </div> 
   </div>
   </div>
   <div class='clear height-fix'></div> 
   </div></div>
