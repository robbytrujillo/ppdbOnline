    <!-- BEGIN .main-content-left -->
  <!-- Social icon -->
		<div class="main-content-left">
			<div class="content-article-title">
							    <?php                    
   $iklan=mysqli_query($koneksi, "select * from tagline WHERE id_tagline = '2'"); 
  while($i=mysqli_fetch_array($iklan)){
								echo"
						<div class='banner'>
							<div class='banner-block'>
								<img src='foto_tagline/$i[gambar]' width='468' height='50'alt='' />
							</div>
							
						</div>
";
						}?>
							<div class="right-title-side">
								<a href="media.php?module=home"><span class="icon-text">&#8962;</span>Back To Homepage</a>
								<a href="semua-berita.html" class="orange"><span class="icon-text">&#59194;</span>Semua Berita</a>
							</div>
						</div>
						
				<!-- DETAIL BERITA -->
<?php

	$detail=mysqli_query($koneksi, "SELECT * FROM berita,users,kategori    
                      WHERE users.username=berita.username 
                      AND kategori.id_kategori=berita.id_kategori 
                      AND judul_seo='$_GET[judul]'");
	$d   = mysqli_fetch_array($detail);
	$tgl = tgl_indo($d['tanggal']);
	$baca = $d['klik']+1;
	 if ($d['id_berita']!=''){

						echo"<div class='main-article-content'>
							<h2 class='article-title'>$d[judul]</h2>
";
mysqli_query($koneksi, "UPDATE berita SET klik=$d[klik]+1 WHERE judul_seo='$_GET[judul]'");
	  if ($d['gambar']!=''){
							echo"<div class='article-photo'>
								<img src='foto_berita/$d[gambar]' width=680 class='setborder' alt='' />
							</div>
							<!-- BEGIN .article-controls -->
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
										<a href='kategori-$d[id_kategori]-$d[kategori_seo].html' class='icon-link'><span class='icon-text'>&#59196;</span>$d[nama_kategori]</a>
									</div>

									<div>
										<a href='$d[google_link]' target='_blank' class='icon-link'><span class='icon-text'>&#128100;</span>by $d[nama_lengkap]</a>
										<a href='#' class='icon-link'><span class='icon-text'>&#59160;</span>Dibaca sebanyak $baca kali</a>
									</div>
								</div>

								<div class='clear-float'></div>

							<!-- END .article-controls -->
							</div>
							<!-- BEGIN .shortcode-content -->
							<div class='shortcode-content'>
							$d[isi_berita]
							<!-- END .shortcode-content -->
							</div>";
							  if ($d['youtube']!=''){
  echo "<div class='article-share-bottom'><div style='text-align:center;'><h4>Video Terkait:</h4>
  <iframe width='500' height='350' src='$d[youtube]' frameborder='0' allowfullscreen></iframe></div>
  <div class='clear-float'></div>
		</div>";
  }
    if ($d['download']!=''){
  echo "<div class='content-article-title'>
		<a href='redirect.php?link=$d[download]' target='_blank'><img src='images/download.png' height=40 alt='download file'/></a> 
		<div class='right-title-side'>
		<span class='icon-text'></span>Telah Didownload sebanyak <b>$d[download_time]</b> kali 
		<a href='hubungi-kami.html'><span class='icon-text'>&#9998;</span>Hubungi administrator jika link tidak berfungsi</a></br>
		</div>
	
		<div class='clear-float'></div>
		</div>";
		
  }
							
							
mysqli_query($koneksi, "UPDATE kategori SET diklik=$d[diklik]+1 where id_kategori='$d[id_kategori]'");

$tag = mysqli_query($koneksi, "SELECT * FROM tag ORDER BY id_tag");
$ambil = mysqli_num_rows(mysqli_query($koneksi, "SELECT id_berita FROM berita"));
echo"<!-- BEGIN .main-nosplit -->
						<div class='main-nosplit'>
						<div class='article-share-bottom'>
						<b>Tag</b>
						<div class='tag-block'>";
while ($var=mysqli_fetch_array($tag)) {
$an = mysqli_query($koneksi, "SELECT count(id_berita) as jml, tag FROM berita WHERE
tag LIKE '%$var[tag_seo]%'");
$kk = mysqli_fetch_array($an);
if ($kk['jml'] > 0) {
$px = (($kk['jml']*100)/$ambil)+100;


						 echo " <a href='tag-$var[tag_seo].html' 
style='font-size:".$px."%'>$var[nama_tag]</a>";
mysqli_query($koneksi, "UPDATE rdb_tag SET jumlah =$kk[jml]
WHERE id_tag = $var[id_tag]");
}
else {echo " ";}
}
echo "<br />";

									
								echo"</div>

								<div class='clear-float'></div>

							</div>
						<!-- END .main-nosplit -->
						</div>";


   $pisah_kata  = explode(",",$d['tag']);
  $jml_katakan = (integer)count($pisah_kata);

  $jml_kata = $jml_katakan-1; 
  $ambil_id = substr($d['id_berita'],0,4);

  
  $cari = "SELECT * FROM berita WHERE (id_berita<'$ambil_id') and (id_berita!='$ambil_id') and (" ;
  for ($i=0; $i<=$jml_kata; $i++){
  $cari .= "tag LIKE '%$pisah_kata[$i]%'";
  if ($i < $jml_kata ){
  $cari .= " OR ";}}
  $cari .= ") ORDER BY id_berita DESC LIMIT 5";

  $hasil  = mysqli_query($koneksi, $cari);
  
   echo"<!-- BEGIN .main-nosplit -->
						<div class='main-nosplit'>
						<div class='article-share-bottom'>
						<b>Artikel Terkait</b>
						<div class='tag-block'>";
						  while($h=mysqli_fetch_array($hasil)){

									echo"<a href='berita-$h[judul_seo].html'>$h[judul]</a>";
									}
								echo"</div>

								<div class='clear-float'></div>

							</div>
						<!-- END .main-nosplit -->
						</div>";
	}else{
							echo"<div class='article-photo'>
								<img src='images/imago.jpg' width=680 height=250  border=10 class='setborder' alt='' />
							</div>
							
							<!-- BEGIN .article-controls -->
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
										<a href='kategori-$d[id_kategori]-$d[kategori_seo].html' class='icon-link'><span class='icon-text'>&#59196;</span>$d[nama_kategori]</a>
									</div>

									<div>
										<a href='$d[google_link]' target='_blank' class='icon-link'><span class='icon-text'>&#128100;</span>by $d[nama_lengkap]</a>
										<a href='#' class='icon-link'><span class='icon-text'>&#59160;</span>$baca comments</a>
									</div>
								</div>

								<div class='clear-float'></div>

							<!-- END .article-controls -->
							</div>
							<!-- BEGIN .shortcode-content -->
							<div class='shortcode-content'>
							$d[isi_berita]
							<!-- END .shortcode-content -->
							</div>
							";
							}


  ?>
					</div>
						<!-- BEGIN .main-nosplit -->
						<div class="main-nosplit">
							
							<div class="article-share-bottom">
								
								<b>Share</b>

			<?php
            echo"<div class='share_this'>
<span class='st_facebook_hcount' displayText='Facebook'></span>
<span class='st_linkedin_hcount' displayText='LinkedIn'></span>
<span class='st_googleplus_hcount' displayText='Google +'></span>
</div>";
?>

								<div class="clear-float"></div>

							</div>

						<!-- END .main-nosplit -->
						</div>
                        
<?php
  // FB Comment//////////////////////////////////////////////////////////////////////////
  echo "<br/><img src='images/komen.jpg' width='683' height='43'/><br/><br/>
";  
  echo"<div class='fb-comments' data-href='http://ppdb.imagomedia.co.id/berita-$d[judul_seo].html' data-width='470'></div>";
  //////////////////////////////////////////////////////////////////////////////////////////////
  $komentar = mysqli_query($koneksi, "select count(komentar.id_komentar) as jml from komentar WHERE id_berita='$d[id_berita]' AND aktif='Y'");
  $k = mysqli_fetch_array($komentar); 
  
echo"<div class='content-article-title'>
							<h2>$k[jml] Komentar</h2>
							<div class='right-title-side'>
								<a href='#top'><span class='icon-text'>&#59231;</span>Scroll Back To Top</a>
								<a href='#writecomment'><span class='icon-text'>&#9998;</span>Write Comment</a>
							</div>
						</div>
				<div class='comment-block'>
						<ol class='comments'>";
						
						
						
  $p      = new Paging7;
  $batas  = 10;
  $posisi = $p->cariPosisi($batas);

  $sql = mysqli_query($koneksi, "SELECT * FROM komentar WHERE id_berita='$d[id_berita]' AND aktif='Y' LIMIT $posisi,$batas");
  $jml = mysqli_num_rows($sql);
 
  if ($jml > 0){
  while ($s = mysqli_fetch_array($sql)){
  $tanggal = tgl_indo($s['tgl']);
  $email = $s['email'];
  $lowercase = strtolower($email);
  $image = md5($lowercase);
 
	echo"<div class='team-member single'>
									<div class='member'>
										<div class='member-photo'><img src='http://www.gravatar.com/avatar/$image' height='50' /></div>
										<div class='member-info'>
											<b>$s[nama_komentar]</b>
											<span>$tanggal</span>
											<p>$s[isi_komentar]</p>
											<div class='clear-float'></div>
										</div>
									</div>
								</div>";
}

  $jmldata = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM komentar WHERE id_berita='$d[id_berita]' AND aktif='Y'"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET['halkomentar'], $jmlhalaman);
  echo"<div class='main-nosplit'><div class='page-pager'>";
  echo " $linkHalaman";
	echo"</div></div>";
	
   }
	
	echo"</ol></div>";
						
						echo"<div class='content-article-title'>
							<h2>Form Komentar</h2>
							<div class='right-title-side'>
								<a href='#top'><span class='icon-text'>&#59231;</span>Scroll Back To Top</a>
							</div>
						</div>";
						echo"<div class='comment-form'>
							<form action='simpankomentar.php' method='POST' id='writecomment'>
							<input type=hidden name=id value=$d[id_berita]>
							<p class='comment-form-author'>
												<label for='author'>Name:<span class='required'>*</span></label>
												<input type='text' placeholder='Nama anda' name='nama_komentar' id='author' />
											</p>
											<p class='comment-form-email'>
												<label for='email'>E-mail:<span class='required'>*</span></label>
												<input type='text' placeholder='e.g. email@mail.me' type='text' name='email' id='email' />
												
											</p>
                                           
											<p class='comment-form-text'>
												<label for='comment'>Pesan Anda:</label>
												<textarea id='comment' name='pesan' placeholder='Tuliskan di sini..'></textarea>
																						
											</p>
											<p class='form-submit'>
												<input name='submit' type='submit' id='submit' class='submit-button' value='Send a Message' />
											</p>
							";
							 
echo"</div>";							
					
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