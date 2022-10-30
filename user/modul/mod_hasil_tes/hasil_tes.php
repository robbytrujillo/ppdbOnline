
<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
    echo "
  <link href='css/zalstyle.css' rel='stylesheet' type='text/css'>";

  echo "
  </head>
  <body class='special-page'>
  <div id='container'>
  <section id='error-number'>
  
  <img src='img/lock.png'>
  <h1>MODUL TIDAK DAPAT DIAKSES</h1>
  
  <p><span class style=\"font-size:14px; color:#ccc;\">Untuk mengakses modul, Anda harus login dahulu!</p></span><br/>
  
  </section>
  
  <section id='error-text'>
  <p><a class='button' href='index.php'>&nbsp;&nbsp; <b>ULANGI LAGI</b> &nbsp;&nbsp;</a></p>
  </section>
  </div>";
}
else{


switch($_GET[act]){
  // Tampil Hasil Tes
  default:
    echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='media.php?module=home'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Hasil Tes</li>
       </ul>
       <div class='pageheader'>
	   	    <form class='searchbar' />
              <a target='_blank' href=../pengumuman.html class='btn btn-primary'>Cetak Laporan Siswa Yang Diterima</a>
			  
            </form>
        	<div class='pageicon'><span class='iconfa-check'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Hasil Tes PPDB</h5>
                <h1>Hasil Tes Calon Siswa Baru</h1>
            </div>
        </div><!--pageheader-->

        <div class='maincontent'>
            <div class='maincontentinner'>
			<h4 class='widgettitle'>
				<a href='?module=tambah_hasil_tes' class='btn btn-warning btn-rounded'><i class='icon-plus icon-white'></i>Tambah Hasil Tes</a>
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
						  <th>No Pendaftaran</th>
						  <th>Nama Siswa</th>
						  <th>Alamat</th>
						  <th>Nilai SKHUN</th>
						  <th>Nilai Tes Tulis</th>
						  <th>Nilai Tes Wawancara</th>
						  <th>Total Nilai</th>
						  <th>Keterangan</th>
						  <th>Diterima/Tidak Diterima</th>
          				  <th>aksi</th>
						 </tr></thead>";

$tampil = mysqli_query($koneksi, "SELECT * FROM hasil_tes,pendaftaran WHERE hasil_tes.id_pendaftaran=pendaftaran.id_pendaftaran ORDER BY(hasil_tes.total+0) desc");  
    $no = 1;

    while($r=mysqli_fetch_array($tampil)){
		$total = $r[wawancara] + $r[tulis] + $r[skhun];
      echo "<tr><td>$no</td>
                <td>PSB/$r[id_pendaftaran]/2013</td>
				<td>$r[nama]</td>
                <td>$r[alamat]</td>
				<td>$r[skhun]</td>
				<td>$r[tulis]</td>
				<td>$r[wawancara]</td>
				<td>$r[total]</td>";
$tampung = mysqli_query($koneksi, "SELECT * FROM daya_tampung");
 while($t=mysqli_fetch_array($tampung)){
 if ($total >$t[nilai_minimal ]){
	echo"<td><b>LULUS</b></td>";
	} 
  else
  		{
  echo"<td><b>TIDAK LULUS</b></td>";
				}
		
$kapasitas = mysqli_query($koneksi, "SELECT * FROM daya_tampung");
 while($k=mysqli_fetch_array($kapasitas)){		
if ($no <=$k[kapasitas] AND $total >$t[nilai_minimal]){
	echo"<td><b>DITERIMA</b></td>";
	} 
  else
  		{			
				
	echo"<td>TIDAK DITERIMA</td>";
					}
			}
				}
				echo"<td class='center' width='85'><a href=?module=tambah_hasil_tes&act=edithasil_tes&id=$r[id_hasil] title='Edit' class='btn btn-info btn-circle'><i class='iconfa-pencil'></i></a>
		                <a href='$aksi?module=hasil_tes&act=hapus&id=$r[id_hasil]' title='Hapus' class='btn btn-danger btn-circle'><span class='iconfa-remove'></span></a></td>
		        </tr>";
      $no++;
    }
    echo "</tbody></table>";
    break;

  
}

}
?>
