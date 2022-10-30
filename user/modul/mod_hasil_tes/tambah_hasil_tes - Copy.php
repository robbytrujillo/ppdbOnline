
<script>
function suggest(inputString){
	if(inputString.length == 0) {
		$('#suggestions').fadeOut();
	} else {
	$('#country').addClass('load');
		$.post("autosuggest.php", {queryString: ""+inputString+""}, function(data){
			if(data.length >0) {
				$('#suggestions').fadeIn();
				$('#suggestionsList').html(data);
				$('#country').removeClass('load');
			}
		});
	}
}

function fill(thisValue) {
	$('#nama').val(thisValue);
	setTimeout("$('#suggestions').fadeOut();", 100);
}

function fill2(thisValue) {
	$('#kode').val(thisValue);
	setTimeout("$('#suggestions').fadeOut();", 100);
}

</script>

<style>
#result {
	height:20px;
	font-size:12px;
	font-family:Arial, Helvetica, sans-serif;
	color:#333;
	padding:5px;
	margin-bottom:10px;
	background-color:#FFFF99;
}
#country{
	padding:3px;
	border:1px #CCC solid;
	font-size:12px;
}
.suggestionsBox {
	position: absolute;
	left: 0px;
	top:10px;
	margin: 26px 0px 0px 160px;
	width: 300px;
	padding:0px;
	background-color:#999999;
	border-top: 3px solid #999999;
	color: #fff;
}
.suggestionList {
	margin: 0px;
	padding: 0px;
}
.suggestionList ul li {
	list-style:none;
	margin: 0px;
	padding: 6px;
	border-bottom:1px dotted #666;
	cursor: pointer;
}
.suggestionList ul li:hover {
	background-color: #FC3;
	color:#000;
}
ul {
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	color:#FFF;
	padding:0;
	margin:0;
}

.load{
background-image:url(loader.gif);
background-position:right;
background-repeat:no-repeat;
}

#suggest {
	position:relative;
}
</style>
<script type="text/javascript" src="js/forms.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
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

//cek hak akses user
$aksi="modul/mod_hasil_tes/aksi_hasil_tes.php";
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
              <a target='_blank' href=../report/diterima.php' class='btn btn-primary'>Cetak Laporan Siswa Yang Diterima</a>
			  <a target='_blank' href=../report/tidakditerima.php' class='btn btn-primary'>Cetak Laporan Siswa Yang Tidak Diterima</a>
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
				<a href='?module=hasil_tes&act=tambahhasil_tes' class='btn btn-warning btn-rounded'><i class='icon-plus icon-white'></i>Tambah Hasil Tes</a>
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

$tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM hasil_tes,pendaftaran WHERE hasil_tes.id_pendaftaran=pendaftaran.id_pendaftaran ORDER BY(hasil_tes.total+0) desc");  
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
$tampung = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM daya_tampung");
 while($t=mysqli_fetch_array($tampung)){
 if ($total >$t[nilai_minimal ]){
	echo"<td><b>LULUS</b></td>";
	} 
  else
  		{
  echo"<td><b>TIDAK LULUS</b></td>";
				}
		
$kapasitas = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM daya_tampung");
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
				echo"<td class='center' width='85'><a href=?module=hasil_tes&act=edithasil_tes&id=$r[id_hasil]><img src='images/edit.png' border='0' title='edit' /></a>
		                <a href='$aksi?module=hasil_tes&act=hapus&id=$r[id_hasil]'><img src='images/del.png' border='0' title='hapus' /></a></td>
		        </tr>";
      $no++;
    }
    echo "</tbody></table>";
    break;

  case "tambahhasil_tes":
    echo "<h2>Tambah Hasil Tes</h2>
          <form method=POST action='$aksi?module=hasil_tes&act=input' enctype='multipart/form-data'>
          <table class='list'><tbody>
                   <tr><td class='left'>NO PENDAFTARAN </td> <td> <div id='suggest'>
		  <input type='text' onKeyUp='suggest(this.value);' name='id_pendaftaran' class='required' onBlur='fill2();' id='kode' size='15'/> 
		  <div class='suggestionsBox' id='suggestions' style='display: none;'> <img src='images/arrow.png' style='position: relative; top: -12px; left: 30px;' alt='upArrow' />
		  <div class='suggestionList' id='suggestionsList'> &nbsp; </div> 
		  </div><input type='text'  name='nama' onBlur='fill();' id='nama'  disabled='disabled' size='30'/>
		  </div>*masukkan No Pendaftaran dan pilih Nama serta Alamat pendaftar </td></tr>
		   <tr><td class='left'>Nilai SKHUN</td>     <td> : <input type=text name='skhun' size=10></td></tr>
		    <tr><td class='left'>NILAI TES TULIS</td>     <td> : <input type=text name='tulis' size=10></td></tr>
			 <tr><td class='left'>NILAI TES WAWANCARA</td>     <td> : <input type=text name='wawancara' size=10></td></tr>
           <tr><td class='left' colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </tbody></table></form>";
     break;
    
  case "edithasil_tes":
    $edit = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM hasil_tes,pendaftaran WHERE hasil_tes.id_pendaftaran=pendaftaran.id_pendaftaran AND hasil_tes.id_hasil='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);

    echo "<h2>Edit Hasil Tes</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=hasil_tes&act=update>
          <input type=hidden name=id value=$r[id_hasil]>
          <table class='list'><tbody>
          <tr><td class='left' width=120>No Pendaftaran</td>  <td> : <input type=text name='id_pendaftaran' size=10 value='$r[id_pendaftaran]' disabled> *)No Pendaftaran Tidak Bisa Di Edit</td></tr>
		   <tr><td class='left' width=90>Nama</td>  <td> : <input type=text name='nama' size=30 value='$r[nama]' disabled> **)Nama Pendaftar Tidak Bisa Di Edit</td></tr>
		  <tr><td class='left' width=70>Nilai SKHUN</td>  <td> : <input type=text name='skhun' size=10 value='$r[skhun]' </td></tr>
		  <tr><td class='left' width=70>Nilai Tes Tulis</td>  <td> : <input type=text name='tulis' size=10 value='$r[tulis]' </td></tr>
		  <tr><td class='left' width=70>Nilai Tes Wawancara</td>  <td> : <input type=text name='wawancara' size=10 value='$r[wawancara]' </td></tr>
         ";

    echo  "<tr><td class='left' colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
         </table></form>";
    break;  
}

}
?>
