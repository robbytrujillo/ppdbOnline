    <!-- BEGIN .main-content-left -->
		<div class="main-content-left">
			<div class="content-article-title">
			<?php                    
   			$iklan=mysqli_query($koneksi, "select * from halamanstatis WHERE judul_seo = '$_GET[judul]'"); 
  			while($i=mysqli_fetch_array($iklan)){
			echo"
			<div class='banner'>
			<div class='banner-block'>
			<h2>$i[judul]</h2>
			</div>
			</div>";
			}?>
			<div class="right-title-side">
			<a href="media.php?module=home"><span class="icon-text">&#8962;</span>Back To Homepage</a>
			<a href="#" class="orange"><span class="icon-text">&#59194;</span>Subscribe To RSS Feed</a>
			</div>
			</div>
						
<!-- DETAIL BERITA -->
<?php

	$detail=mysqli_query($koneksi, "select * from halamanstatis WHERE judul_seo = '$_GET[judul]'"); 
	$d   = mysqli_fetch_array($detail);
	$tgl = tgl_indo($d['tgl_posting']);
	$baca = $d['dibaca']+1;
	if ($d['id_halaman']!=''){
	echo"<div class='main-article-content'>";
	mysqli_query($koneksi, "UPDATE halamanstatis SET dibaca=$d[dibaca]+1 WHERE judul_seo='$_GET[judul]'");
	  if ($d['gambar']!=''){
		echo"<div class='article-photo'>
								<img src='foto_statis/$d[gambar]' width=680 class='setborder' alt='' />
							</div>";
							}
							echo"<!-- BEGIN .article-controls -->
							<div class='article-controls'>

								<div class='date'>
									<div class='calendar-date'>$tgl</div>
									<div class='calendar-time'>
										<font>$d[jam] WIB</font>
										
									</div>
								</div>

								<div class='right-side'>
									<div class='colored'>
										<a href='javascript:printArticle();' class='icon-link'><span class='icon-text'>&#59158;</span>Print This Article</a>
										
									</div>

									<div>
										
										<a href='#' class='icon-link'><span class='icon-text'>&#59160;</span>Dibaca sebanyak $baca kali</a>
									</div>
								</div>

								<div class='clear-float'></div>

							<!-- END .article-controls -->
							</div>
							<!-- BEGIN .shortcode-content -->
							<div class='shortcode-content'>
							$d[isi_halaman]
							<!-- END .shortcode-content -->
							</div>";


  ?>
					</div>
						
                        
<?php
  // FB Comment//////////////////////////////////////////////////////////////////////////
  // FB Comment//////////////////////////////////////////////////////////////////////////
  echo"<div class='fb-comments' data-href='http://ppdb.imagomedia.co.id/hal-$d[judul_seo].html' data-width='470'></div>";
  					
  					
					
}else
	{
	 echo"<div class='main-article-content'>
	 <div class='huge-message'>
							<b class='big-title'>Error 404</b>
							<b class='small-title'>PAGE NOT FOUND</b>
							<p>Sorry, someone already have been here before You..<br/>And probably he broke this page :(</p>
							<a href='http://imagomedia.co.id' class='icon-link'><span class='icon-text'>&#8962;</span>Back to Homepage</a>
						</div>
							</div>";
	}				
						?>
						
						
						
					<!-- END .main-content-left -->
					</div>