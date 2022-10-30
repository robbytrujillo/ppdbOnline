<!-- BEGIN .content-panel -->
							<div class="content-panel">
<div class="panel-header">
	<b><span class="icon-text">&#128247;</span>Video</b>
	<div class="top-right"><a href="semua-video.html">Lihat Semua Video</a></div>
	</div>
								<div class="panel-content">
									
									<div class="video-blocks">
     <?php
	$sql   = "SELECT * FROM berita WHERE youtube>'0' ORDER BY id_berita DESC LIMIT 2";	
	$hasil = mysqli_query($koneksi, $sql);		
	while($r=mysqli_fetch_array($hasil)){
	echo"<div class='video-left'>
			<div class='video-large'>
				<div class='video-image'>
				<iframe width='320' height='250' src='$r[youtube]' frameborder='0' allowfullscreen></iframe>
				</div>
				<h2><a href='berita-$r[judul_seo].html'>$r[judul]</a></h2>
				</div>
				</div>";

		}

		?>
        					

										<div class="clear-float"></div>

									</div>

								</div>
							<!-- END .content-panel -->
							</div>
							