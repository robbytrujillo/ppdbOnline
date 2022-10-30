  <?php
    echo"<div class='main-content-left'>
	<div class='content-panel'>
	<div class='panel-header'>
	<b><span class='icon-text'>&#9733;</span>Artikel</b>
	<div class='top-right'><a href='semua-artikel.html'>Lihat Semua Artikel</a></div>
	</div>
	";
 	$terkini=mysqli_query($koneksi, "SELECT * FROM berita WHERE id_kategori=2 AND headline='N' AND breaking_news='N' ORDER BY id_berita DESC LIMIT 2");	
  	while($t=mysqli_fetch_array($terkini)){
   	$isi_berita = htmlentities(strip_tags($t['isi_berita'])); // membuat paragraf pada isi berita dan mengabaikan tag html
  	$isi = substr($isi_berita,0,399); // ambil sebanyak 150 karakter
  	$isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat

						echo"<!-- BEGIN .main-content-split -->
						<div class='main-content-split'>
							
							<!-- BEGIN .main-split-left -->
							<div class='main-split-left'>
								
								<!-- BEGIN .article-big-block -->
								<div class='article-big-block'>
									<div class='article-photo'>
										<span class='image-hover'>
											<span class='drop-icons'>
												<span class='icon-block'><a href='#' title='Show Image' class='icon-loupe legatus-tooltip'>&nbsp;</a></span>
												<span class='icon-block'><a href='berita-$t[judul_seo].html' title='Read Article' class='icon-link legatus-tooltip'>&nbsp;</a></span>
											</span>
											<img src='foto_berita/small_$t[gambar]' class='setborder' alt='' />
										</span>
									</div>
								
								<!-- END .article-big-block -->
								</div>

							<!-- END .main-split-left -->
							</div>
							
							<!-- BEGIN .main-split-right -->
							<div class='main-split-right'>

								<!-- BEGIN .article-small-block -->
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
								<!-- END .article-small-blocpost.htmlk -->
								</div>

								
							<!-- END .main-split-right -->
							</div>
							
							<div class='clear-float'></div>

						<!-- END .main-content-split -->
						</div>";
	}
echo"</div></div><br/>";

  ?>