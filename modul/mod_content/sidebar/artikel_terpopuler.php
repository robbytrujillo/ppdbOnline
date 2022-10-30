<!-- END .panel -->
	<div class="panel">
	<h3>Artikel Terpopuler</h3>
	</div>
    <!-- BEGIN .main-content-split -->
	<div class="main-content-split">
	<!-- BEGIN .main-split-left -->
	<?php
   $sql=mysqli_query($koneksi, "SELECT * FROM berita WHERE id_kategori=2 ORDER BY klik DESC LIMIT 2");  
	while($p=mysqli_fetch_array($sql)){
	$isi_berita = htmlentities(strip_tags($p['isi_berita'])); // membuat paragraf pada isi berita dan mengabaikan tag html
  	$isi = substr($isi_berita,0,70); // ambil sebanyak 150 karakter
  	$isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat
 	echo"<div class='main-split-left'>
			<div class='panel'>
			<div>
				<!-- BEGIN .article-middle-block -->
				<div class='article-middle-block'>
				<div class='article-photo'>
					<a href='berita-$p[judul_seo].html'>
					<img src='foto_berita/small_$p[gambar]' width='145' height='100' class='setborder' alt='' />
					</a>
					</div>
				</div>
			</div>
			</div>
			<!-- END .main-split-left -->
		</div>
		
        <!-- BEGIN .main-split-right -->
		<div class='main-split-right'>
			<!-- BEGIN .panel -->
			<div class='panel'>
				<div class='panel-comment'>
				<div class='comment-header'>
				<b><a href='berita-$p[judul_seo].html'>$p[judul]</a></b>
				</div>
				<div class='comment-content'>
				$isi
				</div>
				
				</div>
			<!-- END .panel -->
			</div>
		<!-- END .main-split-right -->
		</div>";
		}
		?>
		
		<!-- END .main-content-split -->
		</div>