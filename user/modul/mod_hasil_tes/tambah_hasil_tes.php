
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
	   	    <div class='pageicon'><span class='iconfa-check'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Hasil Tes PPDB</h5>
                <h1>Tambah Hasil Tes Calon Siswa Baru</h1>
            </div>
        </div><!--pageheader-->
		<div class='maincontent'>
            <div class='maincontentinner'>
               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Tambah Hasil Tes</h4>
                <div class='widgetcontent nopadding'>

          <form class='stdform stdform2' method=POST action='$aksi?module=hasil_tes&act=input' enctype='multipart/form-data'>
		  
          <p> 
   		  <label> No Pendaftaran</label>
		  <div id='suggest'>
		   <span class='field'><input type='text' onKeyUp='suggest(this.value);' name='id_pendaftaran' class='input-small' onBlur='fill2();' id='kode' size='15'/> 
		  <div class='suggestionsBox' id='suggestions' style='display: none;'> <img src='images/arrow.png' style='position: relative; top: -12px; left: 30px;' alt='upArrow' />
		  <div class='suggestionList' id='suggestionsList'> &nbsp; </div> 
		  </div><input type='text'  name='nama' onBlur='fill();' id='nama'  disabled='disabled' size='30'/>
		  Masukkan No Pendaftaran/Nama Siswa</div>* </span></p>
		  <p> 
   		  <label>Nilai SKHUN</label>
		  <span class='field'><input type=text class='input-small' name='skhun' ></span></p>
		  <p> 
   		  <label>Nilai Tes Tulis</label>
		  <span class='field'><input type=text class='input-small' name='tulis' size=10></span></p>
		  <p> 
   		  <label>Nilai Tes Wawancara</label>
		   <span class='field'><input type='text' name='wawancara' class='input-small' ></span></p>
			<p class='stdformbutton'>
           <button class='btn btn-primary'>Update</button>
			<input type=button value=Batal onclick=self.history.back() class='btn btn-warning btn-rounded'>
           </p></form>";
     break;
    case "edithasil_tes":
    $edit = mysqli_query($koneksi, "SELECT * FROM hasil_tes,pendaftaran WHERE hasil_tes.id_pendaftaran=pendaftaran.id_pendaftaran AND hasil_tes.id_hasil='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);

    echo"<div class='rightpanel'>
  	   <ul class='breadcrumbs'>
       <li><a href='media.php?module=home'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Hasil Tes</li>
       </ul>
       <div class='pageheader'>
	   	    <div class='pageicon'><span class='iconfa-check'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Hasil Tes PPDB</h5>
                <h1>Edit Hasil Tes Calon Siswa Baru</h1>
            </div>
        </div><!--pageheader-->
		<div class='maincontent'>
            <div class='maincontentinner'>
               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Edit Hasil Tes</h4>
                <div class='widgetcontent nopadding'>
          <form class='stdform stdform2' method=POST enctype='multipart/form-data' action=$aksi?module=hasil_tes&act=update>
          <input type=hidden name=id value=$r[id_hasil]>
          <p> 
   		  <label> No Pendaftaran</label>
		  <span class='field'><input type=text name='id_pendaftaran' class='input-small' value='$r[id_pendaftaran]' disabled> *)No Pendaftaran Tidak Bisa Di Edit
		  </span></p>
		  <label>Nama Siswa</label>
		  <span class='field'><input type=text name='nama' size=30 value='$r[nama]' disabled> **)Nama Pendaftar Tidak Bisa Di Edit</span></p>
		  <label>Nilai SKHUN</label>
		  <span class='field'><input type=text name='skhun' class='input-small' value='$r[skhun]' >
		  </span></p>
		  <p>
		  <label>Nilai Tes Tulis</label>
		  <span class='field'><input type=text name='tulis' class='input-small' value='$r[tulis]' </span></p>
		 <p>
		  <label>Nilai Tes Wawancara</label>
		  <span class='field'><input type=text name='wawancara' class='input-small'size=10 value='$r[wawancara]' </span></p>
<p class='stdformbutton'>
                                <button class='btn btn-primary'>Update</button>
								<input type=button value=Batal onclick=self.history.back() class='btn btn-warning btn-rounded'>
                                
                            </p></form>";
    break; 
 
}

}
?>
