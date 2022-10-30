
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
//cek hak akses user

if($_SESSION[leveluser]=='admin'){
$aksi="modul/mod_berita/aksi_berita.php";
switch($_GET[act]){
  // Tampil Berita
  default:
  echo"<div class='rightpanel'>
        
        <ul class='breadcrumbs'>
            <li><a href='dashboard.html'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
           
            <li>Profil Bapemas & Pemdes</li>
            
           
        </ul>
        
        <div class='pageheader'>
            
            <div class='pageicon'><span class='iconfa-th-large'></span></div>
            <div class='pagetitle'>
                <h5>Profil Bapemas & Pemdes</h5>
                <h1>Halaman Profil Bapemas & Pemdes</h1>
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
                          	<th class='head0 nosort'>No</th>
                            <th class='head0'>Judul Berita</th>
							<th class='head0'></th>
							<th class='head0'>Isi Halaman</th>
                            <th class='head1'>Tgl. Posting</th>                            
                            <th class='head1'>Aksi</th>
                           
                        </tr>
                    </thead><tbody>";
					 $tampil=mysqli_query($koneksi, "SELECT * FROM halamanstatis WHERE username='$_SESSION[namauser]' ORDER BY id_halaman ASC");
						   $no = 1;
   							 while($r=mysqli_fetch_array($tampil)){
     					 	$tgl_posting=tgl_indo($r[tgl_posting]);
	 					 	
                   			echo"<tr class='gradeX'>
                            		<td class='aligncenter'><span class='center'>
                            <input type='checkbox' />
                          </span></td>
                			<td><b>$r[judul]</b>";
							 if ($r[gambar]!=''){
							 echo"<p><img src='../foto_statis/small_$r[gambar]' width=300px alt=''></p>";
							 }
							 echo"</td>
							 <td></td>
							<td width=650px>$r[isi_halaman] </td>
                			<td>$tgl_posting</td>
							
		         			<td><a href='edit-profil-$r[judul_seo].html' class='btn btn-info btn-circle'><i class='iconfa-pencil'></i></a>  				  
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
	
}
} else {
	echo"Anda Tidak Berhak Mengakses Halaman ini";
   } 
?>
