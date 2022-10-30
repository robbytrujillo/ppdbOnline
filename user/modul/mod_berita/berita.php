<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>
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

$aksi="modul/mod_berita/aksi_berita.php";
switch($_GET[act]){
  // Tampil Berita
  default:
  echo"<div class='rightpanel'>
        
        <ul class='breadcrumbs'>
            <li><a href='contributor.html'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
           
            <li>Berita</li>
            

        </ul>
        
        <div class='pageheader'>
           
            <div class='pageicon'><span class='iconfa-table'></span></div>
            <div class='pagetitle'>
                <h5>Berita</h5>
                <h1>Berita</h1>
            </div>
        </div><!--pageheader-->
        
        <div class='maincontent'>
            <div class='maincontentinner'>

                
                <h4 class='widgettitle'>
				<a href='?module=berita&act=tambahberita' class='btn btn-warning btn-rounded'><i class='icon-plus icon-white'></i>Tambah Berita</a>
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
                          	<th class='head0 nosort'>No</th>
                            <th class='head0'>Judul Berita</th>
							<th class='head1'>Kategori</th>
                            <th class='head0'>Tgl. Posting</th>
                            <th class='head1'>Dibaca</th><th class='head1'>Aksi</th>
                           
                        </tr>
                    </thead><tbody>";
					if ($_SESSION[leveluser]=='admin'){
     $tampil=mysqli_query($koneksi, "SELECT * FROM berita,kategori 
                           WHERE berita.id_kategori=kategori.id_kategori ORDER BY berita.id_berita DESC");}
	  
	  
    else{
     $tampil=mysqli_query($koneksi, "SELECT * FROM berita WHERE username='$_SESSION[namauser]' ORDER BY id_berita DESC");}
						   $no = 1;
   							 while($r=mysqli_fetch_array($tampil)){
     					 $tgl_posting=tgl_indo($r[tanggal]);
	 					
                    echo"<tr class='gradeX'>
                                                    <td class='aligncenter'><span class='center'>
                            <input type='checkbox' />
                          </span></td>
                			<td width='270'>$r[judul]</td>
							<td>$r[nama_kategori]</td>
                			<td>$tgl_posting</td>
							<td> $r[klik]</td>
							<td><a href='?module=berita&act=editberita&id=$r[id_berita]' class='btn btn-info btn-circle'><i class='iconfa-pencil'></i></a>  				  
							<a href=javascript:confirmdelete('$aksi?module=berita&act=hapus&id=$r[id_berita]&namafile=$r[gambar]') class='btn btn-danger btn-circle'><span class='iconfa-remove'></span></a>
							</td>
                        </tr>";
					}
                echo"</tbody></table>";					   
                    
               
                include "footer.php";
                echo"
            
            </div><!--maincontentinner-->
        </div><!--maincontent-->
        
    </div><!--rightpanel-->";
  
    break;  
	case "tambahberita":
	echo"<div class='rightpanel'>
        
        <ul class='breadcrumbs'>
            <li><a href='contributor.html'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
            <li><a href='berita.html'>Berita</a> <span class='separator'></span></li>
             <li>Tambah Berita</li>
            
           
        </ul>
        
        <div class='pageheader'>
            
            <div class='pageicon'><span class='iconfa-pencil'></span></div>
            <div class='pagetitle'>
                <h5>Forms</h5>
                <h1>Tambah Berita</h1>
            </div>
        </div><!--pageheader-->
        
        <div class='maincontent'>
            <div class='maincontentinner'>
               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Form Bordered</h4>
                <div class='widgetcontent nopadding'>
				<form class='stdform stdform2' method=POST action='$aksi?module=berita&act=input' enctype='multipart/form-data'>
                    
					
                            <p>
                                <label>Judul Berita</label>
                                <span class='field'><input type='text' name='judul' id='firstname2' class='input-xxlarge' /></span>
                            </p>
							
							<p>
                                <label>Video Youtube </label>
                                <span class='field'><input type='text' name='youtube' id='firstname2' class='input-xxlarge' /><small></br>contoh link: <span class style=\"color:#EA1C1C;\">http://www.youtube.com/embed/xbuEmoRWQHU</small></span>
								
                            </p>
                            
							<p>
                                <label>Select</label>
								<span class='field'><select name='kategori' id='selection2' class='uniformselect'>";
   								
								if ($_SESSION[leveluser]=='admin'){
								echo"<option value=0 selected>Pilih Kategori</option>";
   								 $tampil=mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY nama_kategori");
   								while($r=mysqli_fetch_array($tampil)){
		   						echo "<option value=$r[id_kategori]>$r[nama_kategori]</option></p>"; 
   								}
								echo "</select></p>";
								}else
								{
								 $tampil=mysqli_query($koneksi, "SELECT * FROM kategori WHERE username='$_SESSION[namauser]' ORDER BY nama_kategori");
   								while($r=mysqli_fetch_array($tampil)){
		   						echo "<option value=$r[id_kategori]>$r[nama_kategori]</option></p>"; 
   								}
								echo "</select></p>";
								}
																
   if ($r[headline]=='Y'){
   echo "
   <p> 
   <label>Headline</label>
   <span class='field'><input type=radio name='headline' value='Y' checked>Ya  
   <input type=radio name='headline' value='N'>Tidak</span>
   </p>";}
   
   else{
   echo "
   <p> 
   <label>Headline</label>
   <span class='field'><input type=radio name='headline' value='Y'>Ya  
   <input type=radio name='headline' value='N' checked>Tidak</span>
   </p>";}
										 
     ///////////////////////////////////////////////////////////////////////
   
   									 
   if ($r[breaking_news]=='Y'){
   echo "
   <p> 
   <label>Sekilas Info</label>
   <span class='field'><input type=radio name='breaking_news' value='Y' checked>Ya 
   <input type=radio name='breaking_news' value='N'>Tidak</span>
   </p>";}
									  
   else{
   echo "
   <p> 
   <label>Sekilas Info</label>
   <span class='field'><input type=radio name='breaking_news' value='Y'>Ya 
   <input type=radio name='breaking_news' value='N' checked>Tidak</span>
   </p>";}									 
   echo "<p>
                                <label>Isi Berita</label>
								 <span class='field'><textarea name='isi_berita'  id='editor'  placeholder='Enter text ...' style='width: 750px; height: 400px'></textarea></span>
                            </p>
                            
                            <p>
                                <label>Gambar</label>
                                <span class='field'>
								<input type=file name='fupload' size=40> 
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 400 px
								</span>
                            </p>
							<p>
                                <label>Tag</label>
                                <span class='field'>";
   $tag = mysqli_query($koneksi, "SELECT * FROM tag ORDER BY tag_seo"); 
   while ($t=mysqli_fetch_array($tag)){
   echo "<input type=checkbox value='$t[tag_seo]' name=tag_seo[]>$t[nama_tag]";
   }
   echo "
								</span>
                            </p>
							<p class='stdformbutton'>
                                <button class='btn btn-primary'>Simpan</button> | 
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
	case "editberita":
 $edit = mysqli_query($koneksi, "SELECT * FROM berita WHERE id_berita='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);
   echo"<div class='rightpanel'>
        
        <ul class='breadcrumbs'>
            <li><a href='contributor.html'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
            <li><a href='berita.html'>Berita</a> <span class='separator'></span></li>
             <li>Edit Berita</li>
            
           
        </ul>
        
        <div class='pageheader'>
            
            <div class='pageicon'><span class='iconfa-pencil'></span></div>
            <div class='pagetitle'>
                <h5>Forms</h5>
                <h1>Edit Berita</h1>
            </div>
        </div><!--pageheader-->
        
        <div class='maincontent'>
            <div class='maincontentinner'>
               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Edit Berita</h4>
                <div class='widgetcontent nopadding'>
				<form class='stdform stdform2' method=POST action='$aksi?module=berita&act=update' enctype='multipart/form-data'>
				<input type=hidden name=id value=$r[id_berita]>
				<p>
                <label>Judul Berita</label>
                <span class='field'><input type='text' name='judul' value='$r[judul]' id='firstname2' class='input-xxlarge' /></span>
                </p>
				<p>
                <label>Video Youtube </label>
                <span class='field'><input type='text' name='youtube' value='$r[youtube]' id='firstname2' class='input-xxlarge' /><small></br>contoh link: <span class style=\"color:#EA1C1C;\">http://www.youtube.com/embed/xbuEmoRWQHU</small></span>
				</p>
                            
							<p>
                                <label>Kategori</label>
								<span class='field'><select name='kategori' id='selection2' class='uniformselect'>";
    $tampil=mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id_kategori");
   if ($r[id_kategori]==0){
   echo "<option value=0 selected>- Pilih Kategori -</option>"; }   

   while($w=mysqli_fetch_array($tampil)){
   if ($r[id_kategori]==$w[id_kategori]){
   echo "<option value=$w[id_kategori] selected>$w[nama_kategori]</option>";}
   else{
   echo "<option value=$w[id_kategori]>$w[nama_kategori]</option> </p> ";}}

   echo "</select>";
   echo"</p>";
   if ($r[headline]=='Y'){
   echo "
   <p> 
   <label>Headline</label>
   <span class='field'><input type=radio name='headline' value='Y' checked>Ya  
   <input type=radio name='headline' value='N'>Tidak</span>
   </p>";}
   
   else{
   echo "
   <p> 
   <label>Headline</label>
   <span class='field'><input type=radio name='headline' value='Y'>Ya  
   <input type=radio name='headline' value='N' checked>Tidak</span>
   </p>";}
										 
     ///////////////////////////////////////////////////////////////////////
   
   									 
   if ($r[breaking_news]=='Y'){
   echo "
   <p> 
   <label>Sekilas Info</label>
   <span class='field'><input type=radio name='breaking_news' value='Y' checked>Ya 
   <input type=radio name='breaking_news' value='N'>Tidak</span>
   </p>";}
									  
   else{
   echo "
   <p> 
   <label>Sekilas Info</label>
   <span class='field'><input type=radio name='breaking_news' value='Y'>Ya 
   <input type=radio name='breaking_news' value='N' checked>Tidak</span>
   </p>";}
									  

					 
										 
   echo "
                                                       
                            <p>
                                <label>Isi Berita</label>
								 <span class='field'><textarea  name='isi_berita' id='editor' style='width: 750px; height: 400px'>$r[isi_berita]</textarea></span>
                            </p>
                            
                            <p>
                                <label>Gambar</label>";
  							 if ($r[gambar]!=''){
  							 echo "<span class='field'><img src='../foto_berita/small_$r[gambar]'>";} 	  
								echo"</span>
                            </p>
							 <p>
                                <label>Ganti Gambar</label>
                                <span class='field'>
								<input type=file name='fupload' size=40> 
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 400 px
								</span>
                            </p>
							<p>
                                <label>Tag</label>
                                <span class='field'>";
								$d = GetCheckboxes('tag', 'tag_seo', 'nama_tag', $r[tag]);
   							echo "$d
							
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
    
}
?>
