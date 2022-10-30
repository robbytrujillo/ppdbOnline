 <?php
include("../../config/koneksi.php");
include "../../config/library.php";
include "../../config/fungsi_thumb.php";
include "../../config/fungsi_seo.php";
if(isSet($_POST['lastmsg']))
{
$lastmsg=$_POST['lastmsg'];
$result=mysqli_query($koneksi, "select * from berita,kategori WHERE berita.id_kategori=kategori.id_kategori AND berita.id_berita<'$lastmsg' order by id_berita desc limit 2");
$count=mysqli_num_rows($result);
while($t=mysqli_fetch_array($result))
{
$msg_id=$t['id_berita'];
$message=$t['judul'];
?>
 

<li>
<div class="container">
	<div class="row">
<?php 
$isi_berita = htmlentities(strip_tags($t['isi_berita'])); // membuat paragraf pada isi berita dan mengabaikan tag html
  	$isi = substr($isi_berita,0,399); // ambil sebanyak 150 karakter
  	$isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat
echo"<div class='main-content-left'>
			<div class='main-content-split'>
				<div class='main-split-left'>
					<div class='article-big-block'>
						<div class='article-photo'>
							<span class='image-hover'>
							<span class='drop-icons'>
								
								<span class='icon-block'><a href='berita-$t[judul_seo].html' title='Read Article' class='icon-link legatus-tooltip'>&nbsp;</a></span>
								</span>
								<img src='foto_berita/$t[gambar]' class='setborder' alt='' />
								</span>
							</div>
						</div>
					</div>
			<div class='main-split-right'>
				<div class='article-small-block'>
					<div class='article-header'>
					<h2><a href='berita-$t[judul_seo].html'>$t[judul]</a></h2>
					</div>
					<div class='article-content'>
						<p>$isi ...</p>
					</div>
					<div class='article-links'>
						<a href='#' class='article-icon-link'><span class='icon-text'>&#59160;</span>Dibaca $t[klik] Kali </a>
						<a href='berita-$t[judul_seo].html' class='article-icon-link'><span class='icon-text'>&#59212;</span>Selengkapnya</a>
					</div>
				</div>
			</div>
	<div class='clear-float'></div>
	</div>
    </div>"; ?>
            </div></div>
</li>


<?php
}


?>
<div class="container">
	<div class="row">
<div id="more<?php echo $msg_id; ?>" class="morebox">
<div class="span12">
			<div class="center-heading">
             <span>
            <a href="" class="more" id="<?php echo $msg_id; ?>"><h2><i class="icon-spinner icon-spin icon-large"></i> Lihat Lebih Banyak</h2></a>
			</span>	
 			</div>
			</div>
			<div class="clear"></div>
</div>
</div></div>

<?php
}
?>