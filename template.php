  <?php 
 // Menghindari error cannot modify header information
    ob_start(); // Initiate the output buffer
  ?>
  <!DOCTYPE HTML>
<!-- BEGIN html -->
<html lang = "en">
	<!-- BEGIN head -->
	<head>
		<title><?php include "imagomedia_title.php"; ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />  
  <meta name="robots" content="index, follow">
  <meta name="description" content="<?php include "imagomedia_metadeskripsi.php"; ?>">
  <meta name="keywords" content="<?php include "imagomedia_metakeyword.php"; ?>">  

	<!-- Facebook Open Graph --> 
    <meta property="og:type" content="profile"/> 
    <meta property="profile:first_name" content="Agus"/> 
    <meta property="profile:last_name" content="Hariyanto"/>
    <meta property="profile:username" content="agus.hariyanto.58555"/>
    <meta property="og:title" content="<?php include "imagomedia_title.php" ?>" />
    <meta property="og:description" content="<?php include "imagomedia_metadeskripsi.php" ?>" />
    <meta property="og:image" content="https://website.com/image250X250.png"/>
    <meta property="og:url" content="http://ppdb.imagomedia.co.id/"/>
    <meta property="og:site_name" content="Imago Media"/>
    <meta property="og:see_also" content="http://imagomedia.co.id"/>
    <meta property="fb:admins" content="100000961233670" />
    <meta property="fb:app_id" content="575253020038606" />
   
	

	<!-- Twitter Card -->  
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="<?php echo "$d[twitter]" ?>">
  <meta name="twitter:title" content="<?php include "imagomedia_title.php" ?>">
  <meta name="twitter:description" content="<?php include "imagomedia_metadeskripsi.php" ?>">
  <meta name="twitter:creator" content="<?php echo "$d[twitter]" ?>">
  <meta name="twitter:image" content="<?php echo "$d[alamat_website]" ?>/<?php include "imagomedia_image.php" ?>">
  <meta name="twitter:domain" content="<?php echo "$d[alamat_website]" ?>">
  <meta name="twitter:url" content="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>" />

  <!-- Google Plus Meta Tag -->  
 	<meta itemprop="name" content="<?php include "imagomedia_title.php" ?>" />
 	<meta itemprop="description" content="<?php include "imagomedia_metadeskripsi.php" ?>" />
 	<meta itemprop="image" content="<?php echo "$d[alamat_website]" ?>/<?php include "imagomedia_image.php" ?>" />

  <!-- Google Plus Photo -->  
	<link href='https://plus.google.com/<?php echo "$d[googleplus]" ?>' rel='author'/>
	<link href='https://plus.google.com/<?php echo "$d[googleplus]" ?>' rel='publisher'/>
  
  <meta http-equiv="Copyright" content="Imago Media">
  <meta name="author" content="Agus Hariyanto">
  <meta http-equiv="imagetoolbar" content="no">
  <meta name="language" content="Indonesia">
  <meta name="revisit-after" content="7">
  <meta name="webcrawlers" content="all">
  <meta name="rating" content="general">
  <meta name="spiders" content="all">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<link rel="shortcut icon" href="favicon.png" type="image/x-icon" />
		<!-- Stylesheets -->
		<link type="text/css" rel="stylesheet" href="css/reset.css" />
		<link type="text/css" rel="stylesheet" href="css/main-stylesheet.css" />
		<link type="text/css" rel="stylesheet" href="css/shortcode.css" />
		<link type="text/css" rel="stylesheet" href="css/fonts.css" />
		<link type="text/css" rel="stylesheet" href="css/retina.css" />
        <link type="text/css" rel="stylesheet" href="css/tinyscrollbar.css" />
		<!--[if lte IE 8]>
		<link type="text/css" rel="stylesheet" href="css/ie-transparecy.css" />
		<![endif]-->
		<link type="text/css" id="style-responsive" rel="stylesheet" media="screen" href="css/responsive/desktop.css" />
		<!-- Scripts -->
        
		<script type="text/javascript" src="jscript/jquery-1.7.2.min.js"></script>
		<script type="text/javascript">
			var iPhoneVertical = Array(null,320,"css/responsive/phoneverticald41d.css?"+Date());
			var iPhoneHorizontal = Array(321,767,"css/responsive/phonehorizontald41d.css?"+Date());
			var iPad = Array(768,1000,"css/responsive/ipadd41d.css?"+Date());
			var dekstop = Array(1001,null,"css/responsive/desktopd41d.css?"+Date());
			
			// Legatus Slider Options
			var _legatus_slider_autostart = true;	// Autostart Slider (false / true)
			var _legatus_slider_interval = 5000;	// Autoslide Interval (Def = 5000)
			var _legatus_slider_loading = true;		// Autoslide With Loading Bar (false / true)
		</script>
		<script type="text/javascript" src="jscript/orange-themes-responsive.js"></script>
        <script type="text/javascript" src="jscript/jquery.tinyscrollbar.js"></script>
		<script type="text/javascript" src="jscript/scripts.js"></script>
        <script type="text/javascript" src="jscript/load.js"></script>
		<!-- For Demo Only -->
		<script type="text/javascript" src="jscript/jquery-ui.min.js"></script>
		<script type="text/javascript" src="jscript/iris.min.js"></script>
		
		<!--Start FACEBOOK Chat Script-->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v7.0&appId=575253020038606&autoLogAppEvents=1"></script>
<script language="javascript" type="text/javascript">
<!--
function popitup(url) {
    newwindow=window.open(url,'foobar','height=575,width=950');
    if (window.focus) {newwindow.focus()}
    return false;
}// -->
</script>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '575253020038606',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v7.0'
    });
  };
</script>
<script async defer src="https://connect.facebook.net/en_US/sdk.js"></script>
<!--Akhir FACEBOOK Chat Script-->

<script type="text/javascript">
$(function() {
//More Button
$('.more').live("click",function() 
{
var ID = $(this).attr("id");
if(ID)
{
$("#more"+ID).html('<img src="moreajax.gif" />');

$.ajax({
type: "POST",
url: "modul/mod_berita/ajax_more.php",
data: "lastmsg="+ ID, 
cache: false,
success: function(html){
$("ol#updates").append(html);
$("#more"+ID).remove();
}
});
}
else
{
$(".morebox").html('The End');

}


return false;


});
});

</script>	
	<!-- END head -->
	</head>
	<!-- BEGIN body -->
	<body>
		<!-- BEGIN .boxed -->
		<!-- <div class="boxed active"> -->
		<div class="boxed">
			
			<?php include "header.php";?>
			<!-- BEGIN .content -->
			<div class="content">
				
				<!-- BEGIN .wrapper -->
				<div class="wrapper">
					
				       
		<?php	
		 // HUBUNGI KAMI////////////////////////////////////////////
  		if ($_GET['module']=='hubungikami'){
  		include "modul/mod_hubungi/hubungi.php";}
		 // BUKU Tamu///////////////////////////////////////////
  		elseif ($_GET['module']=='bukutamu'){
  		include "modul/mod_bukutamu/bukutamu.php";}
		
		  // SEMUA AGENDA ////////////////////////////////////////////
	  elseif ($_GET['module']=='semuaagenda'){
	  include "modul/mod_agenda/semuaagenda.php";}
  /////////////////////////////////////////////////////////////
  		// SEMUA PENGUMUMNAN ////////////////////////////////////////////
	  elseif ($_GET['module']=='semuapengumuman'){
	  include "modul/mod_pengumuman/pengumuman.php";}
  		/////////////////////////////////////////////////////////////
	  // BLOG SISWA ////////////////////////////////////////////
	  elseif ($_GET['module']=='blogsiswa'){
	  include "modul/mod_daftarblog/blogsiswa.php";}
  		/////////////////////////////////////////////////////////////
	 // Google ////////////////////////////////////////////
	  elseif ($_GET['module']=='google'){
	  include "modul/mod_google/google.php";}
  		/////////////////////////////////////////////////////////////	
	  // HASIL SELEKSI ////////////////////////////////////////////
	  elseif ($_GET['module']=='hasilseleksi'){
	  include "modul/mod_hasilseleksi/hasilseleksi.php";}
  		/////////////////////////////////////////////////////////////	
		// Form Pendaftaran ////////////////////////////////////////////
	  elseif ($_GET['module']=='pendaftaran'){
	  include "modul/mod_formpendaftaran/formpendaftaran.php";}
  		/////////////////////////////////////////////////////////////	
  
		// GALERI////////////////////////////////////////////
  		elseif ($_GET['module']=='galeri'){
  		include "modul/mod_galeri/galeri.php";}
		else {
 		/////////////////////////////////////////////////////////////		
		// Memanggil Bagian Isi 	
		include "modul/mod_content/isi.php";
		// Memanggil Bagian Widget Sidebar
		include "modul/mod_content/sidebar.php";
		}
		?>
					
					<div class="clear-float"></div>
					
				<!-- END .wrapper -->
				</div>
				
			<!-- BEGIN .content -->
			</div>
			
			<?php include "footer.php";?>
			
		<!-- END .boxed -->
		</div>
	<!-- END body -->
	</body>
<!-- END html -->
</html>
<!--Start Whats App Chat Script-->
	<?php
	//Pengaturan Layout Content Sebelah Kiri 
	$content=mysqli_query($koneksi, "SELECT * FROM identitas");  
	while($c=mysqli_fetch_array($content)){	
echo"<div style='position:fixed;right:10px;bottom:0px;'>
<a target=_Blank' href='https://api.whatsapp.com/send?phone=$c[no_wa]&text=Haloo Admin Imago Media....'>
<button style='background:#32C03C;color:#FBEDED;vertical-align:center;height:36px;border-radius:5px'>
<img src='https://web.whatsapp.com/img/favicon/1x/favicon.png'> Whatsapp Kami</button></a>
</div>";
}
	?>
<!--End of Zopim Live Chat Script-->
															  
<?php
    // penutup fungsi ob_start (lihat baris paling atas)
    ob_end_flush(); // Flush the output from the buffer
?>