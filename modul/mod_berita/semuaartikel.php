<link type="text/css" rel="stylesheet" href="css/font-awesome.css" />

<div class="main-content-left">
	<div class="content-article-title">
			<h2>Semua Artikel</h2>
		<div class="right-title-side">
			<a href="./><span class="icon-text">&#8962;</span>Back To Homepage</a>
		</div>
	</div>
    
    
    
<ol class="timeline" id="updates">
<?php
$sql=mysqli_query($koneksi, "select * from berita WHERE id_kategori=2 ORDER BY id_berita DESC LIMIT 12");
while($t=mysqli_fetch_array($sql))
{
$msg_id=$t['id_berita'];
$message=$t['judul'];
?>

<li>
<?php $isi_berita = htmlentities(strip_tags($t['isi_berita'])); // membuat paragraf pada isi berita dan mengabaikan tag html
  	$isi = substr($isi_berita,0,399); // ambil sebanyak 150 karakter
  	$isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat
	echo"<div class='main-content-left'>
			<div class='main-content-split'>
				<div class='main-split-left'>
					<div class='article-big-block'>
						<div class='article-photo'>
							<span class='image-hover'>
										<span class='image-hover'>
											<span class='drop-icons'>
												<span class='icon-block'><a href='#' title='Show Image' class='icon-loupe legatus-tooltip'>&nbsp;</a></span>
												<span class='icon-block'><a href='berita-$t[judul_seo].html' title='Read Article' class='icon-link legatus-tooltip'>&nbsp;</a></span>
											</span>
											<img src='foto_berita/small_$t[gambar]' class='setborder' alt='' />
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
    </div>";
	 ?>
</li>
<?php } ?>
</ol>
<div id="more<?php echo $msg_id; ?>" class="morebox">
 <span>
            <a href="" class="more" id="<?php echo $msg_id; ?>"><h2><i class="icon-spinner icon-spin icon-large"></i> Lihat Lebih Banyak</h2></a>
			</span>	
</div>

</div>