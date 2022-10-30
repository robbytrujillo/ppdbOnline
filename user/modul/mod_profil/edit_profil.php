<?php
function GetCheckboxes($table, $key, $Label, $Nilai='') {
  $s = "select * from $table order by nama_tag";
  $r = mysqli_query($koneksi, $s);
  $_arrNilai = explode(',', $Nilai);
  $str = '';
  while ($w = mysqli_fetch_array($r)) {
    $_ck = (array_search($w[$key], $_arrNilai) === false)? '' : 'checked';
    $str .= "<input type=checkbox name='".$key."[]' value='$w[$key]' $_ck>$w[$Label] ";
  }
  return $str;
}

$aksi="modul/mod_profil/aksi_profil.php";
switch($_GET[act]){
  // Tampil Berita
  default:
  $edit = mysqli_query($koneksi, "SELECT * FROM halamanstatis WHERE judul_seo='$_GET[judul]'");
    $r    = mysqli_fetch_array($edit);
   echo"<div class='rightpanel'>
        
        <ul class='breadcrumbs'>
            <li><a href='dashboard.html'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
            <li><a href='profil.html'>Profil</a> <span class='separator'></span></li>
             <li>Edit Profil Bapemas & Pemdes</li>
            
           
        </ul>
        
        <div class='pageheader'>
            
            <div class='pageicon'><span class='iconfa-pencil'></span></div>
            <div class='pagetitle'>
                <h5>Edit Profil Bapemas & Pemdes</h5>
                <h1>Edit $r[judul]</h1>
            </div>
        </div><!--pageheader-->
        
        <div class='maincontent'>
            <div class='maincontentinner'>
               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Edit Berita</h4>
                <div class='widgetcontent nopadding'>
				<form class='stdform stdform2' method=POST action='$aksi?module=profil&act=update' enctype='multipart/form-data'>
				<input type=hidden name=id value=$r[id_halaman]>
                    
					
                            <p>
                                <label>Judul Profil</label>
                                <span class='field'><input type='text' name='judul' value='$r[judul]' id='firstname2' class='input-xxlarge' /></span>
                            </p>
							
							
							
                                                       
                            <p>
                                <label>Isi Profil</label>
								 <span class='field'><textarea  name='isi_halaman' id='editor' style='width: 750px; height: 400px'>$r[isi_halaman]</textarea></span>
                            </p>
                            
                            <p>
                                <label>Gambar</label>";
  							 if ($r[gambar]!=''){
  							 echo "<span class='field'><img src='../foto_statis/small_$r[gambar]'>";} 	  
								echo"</span>
                            </p>
							 <p>
                                <label>Ganti Gambar</label>
                                <span class='field'>
								<input type=file name='fupload' size=40> 
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 400 px
								</span>
                            </p>
							<p class='stdformbutton'>
                                <button class='btn btn-primary'>Update</button>
								<input type=button value=Batal onclick=self.history.back() class='btn btn-warning btn-rounded'>
                                
                            </p>
                    </form>
                </div><!--widgetcontent-->
            </div><!--widget-->";					   
                    
               
                include "footer.php";
                echo"
                
            </div><!--maincontentinner-->
        </div><!--maincontent-->
        
    </div><!--rightpanel-->";
    

    
    break;  
}
?>
