
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

$aksi="modul/mod_users/aksi_users.php";
switch($_GET[act]){
  // Tampil Berita
  default:
  echo"<div class='rightpanel'>
        
        <ul class='breadcrumbs'>
            <li><a href='dashboard.html'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
           
            <li>Statistik</li>
            
           
        </ul>
        
        <div class='pageheader'>
            
            <div class='pageicon'><span class='iconfa-signal'></span></div>
            <div class='pagetitle'>
                <h5>Statistik Pengunjung</h5>
                <h1>Pemantauan Statistik Pengunjung</h1>
            </div>
        </div><!--pageheader-->
        
        <div class='maincontent'>
            <div class='maincontentinner'>

                
                
            	";
              $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
              $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
              $waktu   = time(); // 

              // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
              $s = mysqli_query($koneksi, "SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
              // Kalau belum ada, simpan data user tersebut ke database
              if(mysqli_num_rows($s) == 0){
                mysqli_query($koneksi, "INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
              } 
              else{
                mysqli_query($koneksi, "UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
              }

              $pengunjung       = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
              $totalpengunjung  = mysqli_result(mysqli_query($koneksi, "SELECT COUNT(hits) FROM statistik"),  0); 
              $hits             = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal")); 
              $totalhits        = mysqli_result(mysqli_query($koneksi, "SELECT SUM(hits) FROM statistik"),  0); 
              $tothitsgbr       = mysqli_result(mysqli_query($koneksi, "SELECT SUM(hits) FROM statistik"),  0); 
              $bataswaktu       = time() - 300;
              $pengunjungonline = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM statistik WHERE online > '$bataswaktu'"));

              $path = "counter/";
              $ext = ".png";

              $tothitsgbr = sprintf("%06d", $tothitsgbr);
              for ( $i = 0; $i <= 9; $i++ ){
	               $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
              }

              echo "<table id='dyntable' class='table table-bordered'>
				<thead> <tr>
                          	
                            <th class='head0'>Keterangan</th>
							 <th class='head0'>Jumlah</th>

                           
                        </tr>
                    </thead><tbody>
	
                    <tr class='gradeX'><td class='news-title'><img src=../counter/hariini.png> Pengunjung hari ini </td><td class='news-title'> : $pengunjung </td></tr>
                    <tr><td class='news-title'><img src=../counter/total.png> Total pengunjung </td><td class='news-title'> : $totalpengunjung </td></tr>
                    <tr><td class='news-title'><img src=../counter/hariini.png> Hits hari ini </td><td class='news-title'> : $hits[hitstoday] </td></tr>
                    <tr><td class='news-title'><img src=../counter/total.png> Total Hits </td><td class='news-title'> : $totalhits </td></tr>
                    <tr><td class='news-title'><img src=../counter/online.png> Pengunjung Online </td><td class='news-title'> : $pengunjungonline </td></tr>
                    </table>";
          
          
  }

  
   include "footer.php";
                   echo"
            
            </div><!--maincontentinner-->
        </div><!--maincontent-->
        
    </div><!--rightpanel-->";
  
  
    break;  

?>
