  <!-- BEGIN .main-content-left -->
  <!-- Social icon -->
  
  					<div class="main-content-left">

						<div class="content-article-title">
							<h2>Hasil Pencarian</h2>
							<div class="right-title-side">
								<a href="media.php?module=home"><span class="icon-text">&#8962;</span>Back To Homepage</a>
								<a href="#" class="orange"><span class="icon-text">&#59194;</span>Subscribe To RSS Feed</a>
							</div>
						</div>
						
				<!-- DETAIL BERITA -->
  <?php
            
  
  $kata = trim($_POST['kata']);
  $kata = htmlentities(htmlspecialchars($kata), ENT_QUOTES);
  $pisah_kata = explode(" ",$kata);
  $jml_katakan = (integer)count($pisah_kata);
  $jml_kata = $jml_katakan-1;

  $cari = "SELECT * FROM berita WHERE " ;
  for ($i=0; $i<=$jml_kata; $i++){
  $cari .= "isi_berita LIKE '%$pisah_kata[$i]%' or judul LIKE '%$pisah_kata[$i]%'";
  if ($i < $jml_kata ){
  $cari .= " OR "; } }
  
  $cari .= " ORDER BY id_berita DESC LIMIT 10";
  $hasil  = mysqli_query($koneksi, $cari);
  $ketemu = mysqli_num_rows($hasil);

  if ($ketemu > 0){
  echo "<h5>Ditemukan <span class style=\"color:#EA1C1C;\">$ketemu berita teratas </span>dengan kata <font style='background-color:#EA1C1C'>
  <class style=\"color:#fff;\">$kata</font>:</h5><br/>"; 
	
  while($t=mysqli_fetch_array($hasil)){
    $isi_berita = htmlentities(strip_tags($t['isi_berita'])); // membuat paragraf pada isi berita dan mengabaikan tag html
  $isi = substr($isi_berita,0,399); // ambil sebanyak 150 karakter
  $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat
	echo"<!-- BEGIN .main-content-left -->
					<div class='main-content-left'>

						<!-- BEGIN .main-content-split -->
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
											<img src='foto_berita/$t[gambar]' class='setborder' alt='' />
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
										<a href='post.html#comments' class='article-icon-link'><span class='icon-text'>&#59160;</span>91 comments</a>
										<a href='berita-$t[judul_seo].html' class='article-icon-link'><span class='icon-text'>&#59212;</span>Selengkapnya</a>
									</div>
								<!-- END .article-small-blocpost.htmlk -->
								</div>

								
							<!-- END .main-split-right -->
							</div>
							
							<div class='clear-float'></div>

						<!-- END .main-content-split -->
						</div>
                        	<!-- END .main-content-split -->
						</div>";
	}
	 }
  
  else{
  echo "<h5>Tidak ditemukan berita dengan kata <class style=\"color:#EA1C1C;\">$kata</h5>";}

  ?>


					<!-- END .main-content-left -->
					</div>