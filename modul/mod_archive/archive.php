<!-- BEGIN .content -->
			<div class="content">
				
				<!-- BEGIN .wrapper -->
				<div class="wrapper">
						
					<!-- BEGIN .main-content-full -->
					<div class="main-content-full">
						
						<div class="content-article-title">
							<h2>Archive</h2>
							<div class="right-title-side">
								<a href="index-2.html"><span class="icon-text">&#8962;</span>Back To Homepage</a>
							</div>
						</div>
						
						<div class="archive">

							
								
  <?php
  $main=mysqli_query($koneksi, "SELECT * FROM kategori WHERE aktif='Y' order by id_kategori ASC limit 3");
  
  while($r=mysqli_fetch_array($main)){
									echo"<div class='archive-block'>

									<!-- BEGIN .content-panel -->
									<div class='content-panel'>
										<div class='panel-header'>
											<b style='background:#338aa6;'><span class='icon-text'>&#9871;</span>$r[nama_kategori]</b>
											<div class='top-right'><a href='kategori-$r[id_kategori]-$r[kategori_seo].html'>Semua Artikel</a></div>
										</div>
										<div class='panel-content'>"
										;
	  //jumlah dalam kategori
  $sub=mysqli_query($koneksi, "SELECT * FROM kategori, berita  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1,5");
							
							
  $sub2=mysqli_query($koneksi, "SELECT * FROM kategori, berita,users  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND users.username=berita.username 
                      AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1");
							
							
 					
  $t=mysqli_fetch_array($sub2);
										
											echo"
											
											<!-- BEGIN .article-big-block -->
											<div class='article-big-block'>
												<div class='article-photo'>
													<span class='image-hover'>
														<span class='drop-icons'>
															<span class='icon-block'><a href='#' title='Show Image' class='icon-loupe legatus-tooltip'>&nbsp;</a></span>
															<span class='icon-block'><a href='berita-$t[judul_seo].html' title='Read Article' class='icon-link legatus-tooltip'>&nbsp;</a></span>";
															  if ($t['gambar']!=''){
														echo"</span>
														<img src='foto_berita/small_$t[gambar]' class='setborder' alt='' />
													</span>";
													}
	  $isi_berita =(strip_tags($t['isi_berita']));
  $isi = substr($isi_berita,0,225); 
  $isi = substr($isi_berita,0,strrpos($isi," "));
	$tgl = tgl_indo($t[tanggal]);
  $judul = substr($t['judul'],0,60); 
  $judul = substr($t['judul'],0,strrpos($judul," ")); 												
												echo"
												</div>
												
												<div class='article-header'>
													<h2><a href='berita-$t[judul_seo].html'>$judul</a></h2>
												</div>
												
												<div class='article-content'>
													<p>$isi </p>
												</div>
												
												<div class='article-links'>
													<a href='#' class='icon-link'><span class='icon-text'>&#128100;</span>by $t[nama_lengkap]</a> | 
													<a href='berita-$t[judul_seo].html' class='article-icon-link'><span class='icon-text'>&#59212;</span>Selengkapnya</a>
												</div>
											<!-- END .article-big-block -->
											</div>";
											
		while($w=mysqli_fetch_array($sub)){
  
  $judul = substr($w['judul'],0,50); 
  $judul = substr($w['judul'],0,strrpos($judul," ")); 									
											
		  echo "<ul class='article-array content-category'>
		<li>
		<a href='berita-$w[judul_seo].html'>$judul ...</a><a href='#' class='comment-icon'><span class='icon-text'>&#59160;</span></a>
											</li>
		";
		}
  
  echo "</ul>

										</div>
									<!-- END .content-panel -->
									</div>
									
								</div>";    
								}
								echo"

								<div class='clear-float'></div>";    
  ?>  
 
								
							

							<div class="archive-row">
								 <?php
  $main=mysqli_query($koneksi, "SELECT * FROM kategori WHERE aktif='Y' order by id_kategori ASC limit 3,3");
  
  while($r=mysqli_fetch_array($main)){
									echo"<div class='archive-block'>

									<!-- BEGIN .content-panel -->
									<div class='content-panel'>
										<div class='panel-header'>
											<b style='background:#338aa6;'><span class='icon-text'>&#9871;</span>$r[nama_kategori]</b>
											<div class='top-right'><a href='kategori-$r[id_kategori]-$r[kategori_seo].html'>Semua Artikel</a></div>
										</div>
										<div class='panel-content'>"
										;
	  //jumlah dalam kategori
  $sub=mysqli_query($koneksi, "SELECT * FROM kategori, berita  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1,5");
							
							
  $sub2=mysqli_query($koneksi, "SELECT * FROM kategori, berita,users  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND users.username=berita.username 
                      AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1");
							
							
 					
  $t=mysqli_fetch_array($sub2);
										
											echo"
											
											<!-- BEGIN .article-big-block -->
											<div class='article-big-block'>
												<div class='article-photo'>
													<span class='image-hover'>
														<span class='drop-icons'>
															<span class='icon-block'><a href='#' title='Show Image' class='icon-loupe legatus-tooltip'>&nbsp;</a></span>
															<span class='icon-block'><a href='berita-$t[judul_seo].html' title='Read Article' class='icon-link legatus-tooltip'>&nbsp;</a></span>";
															  if ($t['gambar']!=''){
														echo"</span>
														<img src='foto_berita/small_$t[gambar]' class='setborder' alt='' />
													</span>";
													}
	  $isi_berita =(strip_tags($t['isi_berita']));
  $isi = substr($isi_berita,0,225); 
  $isi = substr($isi_berita,0,strrpos($isi," "));
	$tgl = tgl_indo($t[tanggal]);
  $judul = substr($t['judul'],0,60); 
  $judul = substr($t['judul'],0,strrpos($judul," ")); 												
												echo"
												</div>
												
												<div class='article-header'>
													<h2><a href='berita-$t[judul_seo].html'>$judul</a></h2>
												</div>
												
												<div class='article-content'>
													<p>$isi </p>
												</div>
												
												<div class='article-links'>
													<a href='#' class='icon-link'><span class='icon-text'>&#128100;</span>by $t[nama_lengkap]</a> | 
													<a href='berita-$t[judul_seo].html' class='article-icon-link'><span class='icon-text'>&#59212;</span>Selengkapnya</a>
												</div>
											<!-- END .article-big-block -->
											</div>";
											
		while($w=mysqli_fetch_array($sub)){
  
  $judul = substr($w['judul'],0,50); 
  $judul = substr($w['judul'],0,strrpos($judul," ")); 									
											
		  echo "<ul class='article-array content-category'>
		<li>
		<a href='berita-$w[judul_seo].html'>$judul ...</a><a href='#' class='comment-icon'><span class='icon-text'>&#59160;</span></a>
											</li>
		";
		}
  
  echo "</ul>

										</div>
									<!-- END .content-panel -->
									</div>
									
								</div>";    
								}
								echo"

								<div class='clear-float'></div>";    
  ?>  
							</div>



<div class="archive-row">
								 <?php
  $main=mysqli_query($koneksi, "SELECT * FROM kategori WHERE aktif='Y' order by id_kategori ASC limit 6,3");
  
  while($r=mysqli_fetch_array($main)){
									echo"<div class='archive-block'>

									<!-- BEGIN .content-panel -->
									<div class='content-panel'>
										<div class='panel-header'>
											<b style='background:#338aa6;'><span class='icon-text'>&#9871;</span>$r[nama_kategori]</b>
											<div class='top-right'><a href='kategori-$r[id_kategori]-$r[kategori_seo].html'>Semua Artikel</a></div>
										</div>
										<div class='panel-content'>"
										;
	  //jumlah dalam kategori
  $sub=mysqli_query($koneksi, "SELECT * FROM kategori, berita  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1,5");
							
							
  $sub2=mysqli_query($koneksi, "SELECT * FROM kategori, berita,users  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND users.username=berita.username 
                      AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1");
							
							
 					
  $t=mysqli_fetch_array($sub2);
										
											echo"
											
											<!-- BEGIN .article-big-block -->
											<div class='article-big-block'>
												<div class='article-photo'>
													<span class='image-hover'>
														<span class='drop-icons'>
															<span class='icon-block'><a href='#' title='Show Image' class='icon-loupe legatus-tooltip'>&nbsp;</a></span>
															<span class='icon-block'><a href='berita-$t[judul_seo].html' title='Read Article' class='icon-link legatus-tooltip'>&nbsp;</a></span>";
															  if ($t['gambar']!=''){
														echo"</span>
														<img src='foto_berita/small_$t[gambar]' class='setborder' alt='' />
													</span>";
													}
	  $isi_berita =(strip_tags($t['isi_berita']));
  $isi = substr($isi_berita,0,225); 
  $isi = substr($isi_berita,0,strrpos($isi," "));
	$tgl = tgl_indo($t[tanggal]);
  $judul = substr($t['judul'],0,60); 
  $judul = substr($t['judul'],0,strrpos($judul," ")); 												
												echo"
												</div>
												
												<div class='article-header'>
													<h2><a href='berita-$t[judul_seo].html'>$judul</a></h2>
												</div>
												
												<div class='article-content'>
													<p>$isi </p>
												</div>
												
												<div class='article-links'>
													<a href='#' class='icon-link'><span class='icon-text'>&#128100;</span>by $t[nama_lengkap]</a> | 
													<a href='berita-$t[judul_seo].html' class='article-icon-link'><span class='icon-text'>&#59212;</span>Selengkapnya</a>
												</div>
											<!-- END .article-big-block -->
											</div>";
											
		while($w=mysqli_fetch_array($sub)){
  
  $judul = substr($w['judul'],0,50); 
  $judul = substr($w['judul'],0,strrpos($judul," ")); 									
											
		  echo "<ul class='article-array content-category'>
		<li>
		<a href='berita-$w[judul_seo].html'>$judul ...</a><a href='#' class='comment-icon'><span class='icon-text'>&#59160;</span></a>
											</li>
		";
		}
  
  echo "</ul>

										</div>
									<!-- END .content-panel -->
									</div>
									
								</div>";    
								}
								echo"

								<div class='clear-float'></div>";    
  ?>  
							</div>



<div class="archive-row">
								 <?php
  $main=mysqli_query($koneksi, "SELECT * FROM kategori WHERE aktif='Y' order by id_kategori ASC limit 9,3");
  
  while($r=mysqli_fetch_array($main)){
									echo"<div class='archive-block'>

									<!-- BEGIN .content-panel -->
									<div class='content-panel'>
										<div class='panel-header'>
											<b style='background:#338aa6;'><span class='icon-text'>&#9871;</span>$r[nama_kategori]</b>
											<div class='top-right'><a href='kategori-$r[id_kategori]-$r[kategori_seo].html'>Semua Artikel</a></div>
										</div>
										<div class='panel-content'>"
										;
	  //jumlah dalam kategori
  $sub=mysqli_query($koneksi, "SELECT * FROM kategori, berita  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1,5");
							
							
  $sub2=mysqli_query($koneksi, "SELECT * FROM kategori, berita,users  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND users.username=berita.username 
                      AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1");
							
							
 					
  $t=mysqli_fetch_array($sub2);
										
											echo"
											
											<!-- BEGIN .article-big-block -->
											<div class='article-big-block'>
												<div class='article-photo'>
													<span class='image-hover'>
														<span class='drop-icons'>
															<span class='icon-block'><a href='#' title='Show Image' class='icon-loupe legatus-tooltip'>&nbsp;</a></span>
															<span class='icon-block'><a href='berita-$t[judul_seo].html' title='Read Article' class='icon-link legatus-tooltip'>&nbsp;</a></span>";
															  if ($t['gambar']!=''){
														echo"</span>
														<img src='foto_berita/small_$t[gambar]' class='setborder' alt='' />
													</span>";
													}
	  $isi_berita =(strip_tags($t['isi_berita']));
  $isi = substr($isi_berita,0,225); 
  $isi = substr($isi_berita,0,strrpos($isi," "));
	$tgl = tgl_indo($t[tanggal]);
  $judul = substr($t['judul'],0,60); 
  $judul = substr($t['judul'],0,strrpos($judul," ")); 												
												echo"
												</div>
												
												<div class='article-header'>
													<h2><a href='berita-$t[judul_seo].html'>$judul</a></h2>
												</div>
												
												<div class='article-content'>
													<p>$isi </p>
												</div>
												
												<div class='article-links'>
													<a href='#' class='icon-link'><span class='icon-text'>&#128100;</span>by $t[nama_lengkap]</a> | 
													<a href='berita-$t[judul_seo].html' class='article-icon-link'><span class='icon-text'>&#59212;</span>Selengkapnya</a>
												</div>
											<!-- END .article-big-block -->
											</div>";
											
		while($w=mysqli_fetch_array($sub)){
  
  $judul = substr($w['judul'],0,50); 
  $judul = substr($w['judul'],0,strrpos($judul," ")); 									
											
		  echo "<ul class='article-array content-category'>
		<li>
		<a href='berita-$w[judul_seo].html'>$judul ...</a><a href='#' class='comment-icon'><span class='icon-text'>&#59160;</span></a>
											</li>
		";
		}
  
  echo "</ul>

										</div>
									<!-- END .content-panel -->
									</div>
									
								</div>";    
								}
								echo"

								<div class='clear-float'></div>";    
  ?>  
							</div>



<div class="archive-row">
								 <?php
  $main=mysqli_query($koneksi, "SELECT * FROM kategori WHERE aktif='Y' order by id_kategori ASC limit 12,3");
  
  while($r=mysqli_fetch_array($main)){
									echo"<div class='archive-block'>

									<!-- BEGIN .content-panel -->
									<div class='content-panel'>
										<div class='panel-header'>
											<b style='background:#338aa6;'><span class='icon-text'>&#9871;</span>$r[nama_kategori]</b>
											<div class='top-right'><a href='kategori-$r[id_kategori]-$r[kategori_seo].html'>Semua Artikel</a></div>
										</div>
										<div class='panel-content'>"
										;
	  //jumlah dalam kategori
  $sub=mysqli_query($koneksi, "SELECT * FROM kategori, berita  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1,5");
							
							
  $sub2=mysqli_query($koneksi, "SELECT * FROM kategori, berita,users  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND users.username=berita.username 
                      AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1");
							
							
 					
  $t=mysqli_fetch_array($sub2);
										
											echo"
											
											<!-- BEGIN .article-big-block -->
											<div class='article-big-block'>
												<div class='article-photo'>
													<span class='image-hover'>
														<span class='drop-icons'>
															<span class='icon-block'><a href='#' title='Show Image' class='icon-loupe legatus-tooltip'>&nbsp;</a></span>
															<span class='icon-block'><a href='berita-$t[judul_seo].html' title='Read Article' class='icon-link legatus-tooltip'>&nbsp;</a></span>";
															  if ($t['gambar']!=''){
														echo"</span>
														<img src='foto_berita/small_$t[gambar]' class='setborder' alt='' />
													</span>";
													}
	  $isi_berita =(strip_tags($t['isi_berita']));
  $isi = substr($isi_berita,0,225); 
  $isi = substr($isi_berita,0,strrpos($isi," "));
	$tgl = tgl_indo($t[tanggal]);
  $judul = substr($t['judul'],0,60); 
  $judul = substr($t['judul'],0,strrpos($judul," ")); 												
												echo"
												</div>
												
												<div class='article-header'>
													<h2><a href='berita-$t[judul_seo].html'>$judul</a></h2>
												</div>
												
												<div class='article-content'>
													<p>$isi </p>
												</div>
												
												<div class='article-links'>
													<a href='#' class='icon-link'><span class='icon-text'>&#128100;</span>by $t[nama_lengkap]</a> | 
													<a href='berita-$t[judul_seo].html' class='article-icon-link'><span class='icon-text'>&#59212;</span>Selengkapnya</a>
												</div>
											<!-- END .article-big-block -->
											</div>";
											
		while($w=mysqli_fetch_array($sub)){
  
  $judul = substr($w['judul'],0,50); 
  $judul = substr($w['judul'],0,strrpos($judul," ")); 									
											
		  echo "<ul class='article-array content-category'>
		<li>
		<a href='berita-$w[judul_seo].html'>$judul ...</a><a href='#' class='comment-icon'><span class='icon-text'>&#59160;</span></a>
											</li>
		";
		}
  
  echo "</ul>

										</div>
									<!-- END .content-panel -->
									</div>
									
								</div>";    
								}
								echo"

								<div class='clear-float'></div>";    
  ?>  
							</div>



<div class="archive-row">
								 <?php
  $main=mysqli_query($koneksi, "SELECT * FROM kategori WHERE aktif='Y' order by id_kategori ASC limit 15,3");
  
  while($r=mysqli_fetch_array($main)){
									echo"<div class='archive-block'>

									<!-- BEGIN .content-panel -->
									<div class='content-panel'>
										<div class='panel-header'>
											<b style='background:#338aa6;'><span class='icon-text'>&#9871;</span>$r[nama_kategori]</b>
											<div class='top-right'><a href='kategori-$r[id_kategori]-$r[kategori_seo].html'>Semua Artikel</a></div>
										</div>
										<div class='panel-content'>"
										;
	  //jumlah dalam kategori
  $sub=mysqli_query($koneksi, "SELECT * FROM kategori, berita  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1,5");
							
							
  $sub2=mysqli_query($koneksi, "SELECT * FROM kategori, berita,users  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND users.username=berita.username 
                      AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1");
							
							
 					
  $t=mysqli_fetch_array($sub2);
										
											echo"
											
											<!-- BEGIN .article-big-block -->
											<div class='article-big-block'>
												<div class='article-photo'>
													<span class='image-hover'>
														<span class='drop-icons'>
															<span class='icon-block'><a href='#' title='Show Image' class='icon-loupe legatus-tooltip'>&nbsp;</a></span>
															<span class='icon-block'><a href='berita-$t[judul_seo].html' title='Read Article' class='icon-link legatus-tooltip'>&nbsp;</a></span>";
															  if ($t['gambar']!=''){
														echo"</span>
														<img src='foto_berita/small_$t[gambar]' class='setborder' alt='' />
													</span>";
													}
	  $isi_berita =(strip_tags($t['isi_berita']));
  $isi = substr($isi_berita,0,225); 
  $isi = substr($isi_berita,0,strrpos($isi," "));
	$tgl = tgl_indo($t[tanggal]);
  $judul = substr($t['judul'],0,60); 
  $judul = substr($t['judul'],0,strrpos($judul," ")); 												
												echo"
												</div>
												
												<div class='article-header'>
													<h2><a href='berita-$t[judul_seo].html'>$judul</a></h2>
												</div>
												
												<div class='article-content'>
													<p>$isi </p>
												</div>
												
												<div class='article-links'>
													<a href='#' class='icon-link'><span class='icon-text'>&#128100;</span>by $t[nama_lengkap]</a> | 
													<a href='berita-$t[judul_seo].html' class='article-icon-link'><span class='icon-text'>&#59212;</span>Selengkapnya</a>
												</div>
											<!-- END .article-big-block -->
											</div>";
											
		while($w=mysqli_fetch_array($sub)){
  
  $judul = substr($w['judul'],0,50); 
  $judul = substr($w['judul'],0,strrpos($judul," ")); 									
											
		  echo "<ul class='article-array content-category'>
		<li>
		<a href='berita-$w[judul_seo].html'>$judul ...</a><a href='#' class='comment-icon'><span class='icon-text'>&#59160;</span></a>
											</li>
		";
		}
  
  echo "</ul>

										</div>
									<!-- END .content-panel -->
									</div>
									
								</div>";    
								}
								echo"

								<div class='clear-float'></div>";    
  ?>  
							</div>


<div class="archive-row">
								 <?php
  $main=mysqli_query($koneksi, "SELECT * FROM kategori WHERE aktif='Y' order by id_kategori ASC limit 18,3");
  
  while($r=mysqli_fetch_array($main)){
									echo"<div class='archive-block'>

									<!-- BEGIN .content-panel -->
									<div class='content-panel'>
										<div class='panel-header'>
											<b style='background:#338aa6;'><span class='icon-text'>&#9871;</span>$r[nama_kategori]</b>
											<div class='top-right'><a href='kategori-$r[id_kategori]-$r[kategori_seo].html'>Semua Artikel</a></div>
										</div>
										<div class='panel-content'>"
										;
	  //jumlah dalam kategori
  $sub=mysqli_query($koneksi, "SELECT * FROM kategori, berita  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1,5");
							
							
  $sub2=mysqli_query($koneksi, "SELECT * FROM kategori, berita,users  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND users.username=berita.username 
                      AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1");
							
							
 					
  $t=mysqli_fetch_array($sub2);
										
											echo"
											
											<!-- BEGIN .article-big-block -->
											<div class='article-big-block'>
												<div class='article-photo'>
													<span class='image-hover'>
														<span class='drop-icons'>
															<span class='icon-block'><a href='#' title='Show Image' class='icon-loupe legatus-tooltip'>&nbsp;</a></span>
															<span class='icon-block'><a href='berita-$t[judul_seo].html' title='Read Article' class='icon-link legatus-tooltip'>&nbsp;</a></span>";
															  if ($t['gambar']!=''){
														echo"</span>
														<img src='foto_berita/small_$t[gambar]' class='setborder' alt='' />
													</span>";
													}
	  $isi_berita =(strip_tags($t['isi_berita']));
  $isi = substr($isi_berita,0,225); 
  $isi = substr($isi_berita,0,strrpos($isi," "));
	$tgl = tgl_indo($t[tanggal]);
  $judul = substr($t['judul'],0,60); 
  $judul = substr($t['judul'],0,strrpos($judul," ")); 												
												echo"
												</div>
												
												<div class='article-header'>
													<h2><a href='berita-$t[judul_seo].html'>$judul</a></h2>
												</div>
												
												<div class='article-content'>
													<p>$isi </p>
												</div>
												
												<div class='article-links'>
													<a href='#' class='icon-link'><span class='icon-text'>&#128100;</span>by $t[nama_lengkap]</a> | 
													<a href='berita-$t[judul_seo].html' class='article-icon-link'><span class='icon-text'>&#59212;</span>Selengkapnya</a>
												</div>
											<!-- END .article-big-block -->
											</div>";
											
		while($w=mysqli_fetch_array($sub)){
  
  $judul = substr($w['judul'],0,50); 
  $judul = substr($w['judul'],0,strrpos($judul," ")); 									
											
		  echo "<ul class='article-array content-category'>
		<li>
		<a href='berita-$w[judul_seo].html'>$judul ...</a><a href='#' class='comment-icon'><span class='icon-text'>&#59160;</span></a>
											</li>
		";
		}
  
  echo "</ul>

										</div>
									<!-- END .content-panel -->
									</div>
									
								</div>";    
								}
								echo"

								<div class='clear-float'></div>";    
  ?>  
							</div>



<div class="archive-row">
								 <?php
  $main=mysqli_query($koneksi, "SELECT * FROM kategori WHERE aktif='Y' order by id_kategori ASC limit 21,3");
  
  while($r=mysqli_fetch_array($main)){
									echo"<div class='archive-block'>

									<!-- BEGIN .content-panel -->
									<div class='content-panel'>
										<div class='panel-header'>
											<b style='background:#338aa6;'><span class='icon-text'>&#9871;</span>$r[nama_kategori]</b>
											<div class='top-right'><a href='kategori-$r[id_kategori]-$r[kategori_seo].html'>Semua Artikel</a></div>
										</div>
										<div class='panel-content'>"
										;
	  //jumlah dalam kategori
  $sub=mysqli_query($koneksi, "SELECT * FROM kategori, berita  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1,5");
							
							
  $sub2=mysqli_query($koneksi, "SELECT * FROM kategori, berita,users  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND users.username=berita.username 
                      AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1");
							
							
 					
  $t=mysqli_fetch_array($sub2);
										
											echo"
											
											<!-- BEGIN .article-big-block -->
											<div class='article-big-block'>
												<div class='article-photo'>
													<span class='image-hover'>
														<span class='drop-icons'>
															<span class='icon-block'><a href='#' title='Show Image' class='icon-loupe legatus-tooltip'>&nbsp;</a></span>
															<span class='icon-block'><a href='berita-$t[judul_seo].html' title='Read Article' class='icon-link legatus-tooltip'>&nbsp;</a></span>";
															  if ($t['gambar']!=''){
														echo"</span>
														<img src='foto_berita/small_$t[gambar]' class='setborder' alt='' />
													</span>";
													}
	  $isi_berita =(strip_tags($t['isi_berita']));
  $isi = substr($isi_berita,0,225); 
  $isi = substr($isi_berita,0,strrpos($isi," "));
	$tgl = tgl_indo($t[tanggal]);
  $judul = substr($t['judul'],0,60); 
  $judul = substr($t['judul'],0,strrpos($judul," ")); 												
												echo"
												</div>
												
												<div class='article-header'>
													<h2><a href='berita-$t[judul_seo].html'>$judul</a></h2>
												</div>
												
												<div class='article-content'>
													<p>$isi </p>
												</div>
												
												<div class='article-links'>
													<a href='#' class='icon-link'><span class='icon-text'>&#128100;</span>by $t[nama_lengkap]</a> | 
													<a href='berita-$t[judul_seo].html' class='article-icon-link'><span class='icon-text'>&#59212;</span>Selengkapnya</a>
												</div>
											<!-- END .article-big-block -->
											</div>";
											
		while($w=mysqli_fetch_array($sub)){
  
  $judul = substr($w['judul'],0,50); 
  $judul = substr($w['judul'],0,strrpos($judul," ")); 									
											
		  echo "<ul class='article-array content-category'>
		<li>
		<a href='berita-$w[judul_seo].html'>$judul ...</a><a href='#' class='comment-icon'><span class='icon-text'>&#59160;</span></a>
											</li>
		";
		}
  
  echo "</ul>

										</div>
									<!-- END .content-panel -->
									</div>
									
								</div>";    
								}
								echo"

								<div class='clear-float'></div>";    
  ?>  
							</div>


<div class="archive-row">
								 <?php
  $main=mysqli_query($koneksi, "SELECT * FROM kategori WHERE aktif='Y' order by id_kategori ASC limit 24,3");
  
  while($r=mysqli_fetch_array($main)){
									echo"<div class='archive-block'>

									<!-- BEGIN .content-panel -->
									<div class='content-panel'>
										<div class='panel-header'>
											<b style='background:#338aa6;'><span class='icon-text'>&#9871;</span>$r[nama_kategori]</b>
											<div class='top-right'><a href='kategori-$r[id_kategori]-$r[kategori_seo].html'>Semua Artikel</a></div>
										</div>
										<div class='panel-content'>"
										;
	  //jumlah dalam kategori
  $sub=mysqli_query($koneksi, "SELECT * FROM kategori, berita  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1,5");
							
							
  $sub2=mysqli_query($koneksi, "SELECT * FROM kategori, berita,users  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND users.username=berita.username 
                      AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1");
							
							
 					
  $t=mysqli_fetch_array($sub2);
										
											echo"
											
											<!-- BEGIN .article-big-block -->
											<div class='article-big-block'>
												<div class='article-photo'>
													<span class='image-hover'>
														<span class='drop-icons'>
															<span class='icon-block'><a href='#' title='Show Image' class='icon-loupe legatus-tooltip'>&nbsp;</a></span>
															<span class='icon-block'><a href='berita-$t[judul_seo].html' title='Read Article' class='icon-link legatus-tooltip'>&nbsp;</a></span>";
															  if ($t['gambar']!=''){
														echo"</span>
														<img src='foto_berita/small_$t[gambar]' class='setborder' alt='' />
													</span>";
													}
	  $isi_berita =(strip_tags($t['isi_berita']));
  $isi = substr($isi_berita,0,225); 
  $isi = substr($isi_berita,0,strrpos($isi," "));
	$tgl = tgl_indo($t[tanggal]);
  $judul = substr($t['judul'],0,60); 
  $judul = substr($t['judul'],0,strrpos($judul," ")); 												
												echo"
												</div>
												
												<div class='article-header'>
													<h2><a href='berita-$t[judul_seo].html'>$judul</a></h2>
												</div>
												
												<div class='article-content'>
													<p>$isi </p>
												</div>
												
												<div class='article-links'>
													<a href='#' class='icon-link'><span class='icon-text'>&#128100;</span>by $t[nama_lengkap]</a> | 
													<a href='berita-$t[judul_seo].html' class='article-icon-link'><span class='icon-text'>&#59212;</span>Selengkapnya</a>
												</div>
											<!-- END .article-big-block -->
											</div>";
											
		while($w=mysqli_fetch_array($sub)){
  
  $judul = substr($w['judul'],0,50); 
  $judul = substr($w['judul'],0,strrpos($judul," ")); 									
											
		  echo "<ul class='article-array content-category'>
		<li>
		<a href='berita-$w[judul_seo].html'>$judul ...</a><a href='#' class='comment-icon'><span class='icon-text'>&#59160;</span></a>
											</li>
		";
		}
  
  echo "</ul>

										</div>
									<!-- END .content-panel -->
									</div>
									
								</div>";    
								}
								echo"

								<div class='clear-float'></div>";    
  ?>  
							</div>

<div class="archive-row">
								 <?php
  $main=mysqli_query($koneksi, "SELECT * FROM kategori WHERE aktif='Y' order by id_kategori ASC limit 27,3");
  
  while($r=mysqli_fetch_array($main)){
									echo"<div class='archive-block'>

									<!-- BEGIN .content-panel -->
									<div class='content-panel'>
										<div class='panel-header'>
											<b style='background:#338aa6;'><span class='icon-text'>&#9871;</span>$r[nama_kategori]</b>
											<div class='top-right'><a href='kategori-$r[id_kategori]-$r[kategori_seo].html'>Semua Artikel</a></div>
										</div>
										<div class='panel-content'>"
										;
	  //jumlah dalam kategori
  $sub=mysqli_query($koneksi, "SELECT * FROM kategori, berita  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1,5");
							
							
  $sub2=mysqli_query($koneksi, "SELECT * FROM kategori, berita,users  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND users.username=berita.username 
                      AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1");
							
							
 					
  $t=mysqli_fetch_array($sub2);
										
											echo"
											
											<!-- BEGIN .article-big-block -->
											<div class='article-big-block'>
												<div class='article-photo'>
													<span class='image-hover'>
														<span class='drop-icons'>
															<span class='icon-block'><a href='#' title='Show Image' class='icon-loupe legatus-tooltip'>&nbsp;</a></span>
															<span class='icon-block'><a href='berita-$t[judul_seo].html' title='Read Article' class='icon-link legatus-tooltip'>&nbsp;</a></span>";
															  if ($t['gambar']!=''){
														echo"</span>
														<img src='foto_berita/small_$t[gambar]' class='setborder' alt='' />
													</span>";
													}
	  $isi_berita =(strip_tags($t['isi_berita']));
  $isi = substr($isi_berita,0,225); 
  $isi = substr($isi_berita,0,strrpos($isi," "));
	$tgl = tgl_indo($t[tanggal]);
  $judul = substr($t['judul'],0,60); 
  $judul = substr($t['judul'],0,strrpos($judul," ")); 												
												echo"
												</div>
												
												<div class='article-header'>
													<h2><a href='berita-$t[judul_seo].html'>$judul</a></h2>
												</div>
												
												<div class='article-content'>
													<p>$isi </p>
												</div>
												
												<div class='article-links'>
													<a href='#' class='icon-link'><span class='icon-text'>&#128100;</span>by $t[nama_lengkap]</a> | 
													<a href='berita-$t[judul_seo].html' class='article-icon-link'><span class='icon-text'>&#59212;</span>Selengkapnya</a>
												</div>
											<!-- END .article-big-block -->
											</div>";
											
		while($w=mysqli_fetch_array($sub)){
  
  $judul = substr($w['judul'],0,50); 
  $judul = substr($w['judul'],0,strrpos($judul," ")); 									
											
		  echo "<ul class='article-array content-category'>
		<li>
		<a href='berita-$w[judul_seo].html'>$judul ...</a><a href='#' class='comment-icon'><span class='icon-text'>&#59160;</span></a>
											</li>
		";
		}
  
  echo "</ul>

										</div>
									<!-- END .content-panel -->
									</div>
									
								</div>";    
								}
								echo"

								<div class='clear-float'></div>";    
  ?>  
							</div>

<div class="archive-row">
								 <?php
  $main=mysqli_query($koneksi, "SELECT * FROM kategori WHERE aktif='Y' order by id_kategori ASC limit 30,3");
  
  while($r=mysqli_fetch_array($main)){
									echo"<div class='archive-block'>

									<!-- BEGIN .content-panel -->
									<div class='content-panel'>
										<div class='panel-header'>
											<b style='background:#338aa6;'><span class='icon-text'>&#9871;</span>$r[nama_kategori]</b>
											<div class='top-right'><a href='kategori-$r[id_kategori]-$r[kategori_seo].html'>Semua Artikel</a></div>
										</div>
										<div class='panel-content'>"
										;
	  //jumlah dalam kategori
  $sub=mysqli_query($koneksi, "SELECT * FROM kategori, berita  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1,5");
							
							
  $sub2=mysqli_query($koneksi, "SELECT * FROM kategori, berita,users  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND users.username=berita.username 
                      AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1");
							
							
 					
  $t=mysqli_fetch_array($sub2);
										
											echo"
											
											<!-- BEGIN .article-big-block -->
											<div class='article-big-block'>
												<div class='article-photo'>
													<span class='image-hover'>
														<span class='drop-icons'>
															<span class='icon-block'><a href='#' title='Show Image' class='icon-loupe legatus-tooltip'>&nbsp;</a></span>
															<span class='icon-block'><a href='berita-$t[judul_seo].html' title='Read Article' class='icon-link legatus-tooltip'>&nbsp;</a></span>";
															  if ($t['gambar']!=''){
														echo"</span>
														<img src='foto_berita/small_$t[gambar]' class='setborder' alt='' />
													</span>";
													}
	  $isi_berita =(strip_tags($t['isi_berita']));
  $isi = substr($isi_berita,0,225); 
  $isi = substr($isi_berita,0,strrpos($isi," "));
	$tgl = tgl_indo($t[tanggal]);
  $judul = substr($t['judul'],0,60); 
  $judul = substr($t['judul'],0,strrpos($judul," ")); 												
												echo"
												</div>
												
												<div class='article-header'>
													<h2><a href='berita-$t[judul_seo].html'>$judul</a></h2>
												</div>
												
												<div class='article-content'>
													<p>$isi </p>
												</div>
												
												<div class='article-links'>
													<a href='#' class='icon-link'><span class='icon-text'>&#128100;</span>by $t[nama_lengkap]</a> | 
													<a href='berita-$t[judul_seo].html' class='article-icon-link'><span class='icon-text'>&#59212;</span>Selengkapnya</a>
												</div>
											<!-- END .article-big-block -->
											</div>";
											
		while($w=mysqli_fetch_array($sub)){
  
  $judul = substr($w['judul'],0,50); 
  $judul = substr($w['judul'],0,strrpos($judul," ")); 									
											
		  echo "<ul class='article-array content-category'>
		<li>
		<a href='berita-$w[judul_seo].html'>$judul ...</a><a href='#' class='comment-icon'><span class='icon-text'>&#59160;</span></a>
											</li>
		";
		}
  
  echo "</ul>

										</div>
									<!-- END .content-panel -->
									</div>
									
								</div>";    
								}
								echo"

								<div class='clear-float'></div>";    
  ?>  
							</div>

<div class="archive-row">
								 <?php
  $main=mysqli_query($koneksi, "SELECT * FROM kategori WHERE aktif='Y' order by id_kategori ASC limit 33,3");
  
  while($r=mysqli_fetch_array($main)){
									echo"<div class='archive-block'>

									<!-- BEGIN .content-panel -->
									<div class='content-panel'>
										<div class='panel-header'>
											<b style='background:#338aa6;'><span class='icon-text'>&#9871;</span>$r[nama_kategori]</b>
											<div class='top-right'><a href='kategori-$r[id_kategori]-$r[kategori_seo].html'>Semua Artikel</a></div>
										</div>
										<div class='panel-content'>"
										;
	  //jumlah dalam kategori
  $sub=mysqli_query($koneksi, "SELECT * FROM kategori, berita  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1,5");
							
							
  $sub2=mysqli_query($koneksi, "SELECT * FROM kategori, berita,users  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND users.username=berita.username 
                      AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1");
							
							
 					
  $t=mysqli_fetch_array($sub2);
										
											echo"
											
											<!-- BEGIN .article-big-block -->
											<div class='article-big-block'>
												<div class='article-photo'>
													<span class='image-hover'>
														<span class='drop-icons'>
															<span class='icon-block'><a href='#' title='Show Image' class='icon-loupe legatus-tooltip'>&nbsp;</a></span>
															<span class='icon-block'><a href='berita-$t[judul_seo].html' title='Read Article' class='icon-link legatus-tooltip'>&nbsp;</a></span>";
															  if ($t['gambar']!=''){
														echo"</span>
														<img src='foto_berita/small_$t[gambar]' class='setborder' alt='' />
													</span>";
													}
	  $isi_berita =(strip_tags($t['isi_berita']));
  $isi = substr($isi_berita,0,225); 
  $isi = substr($isi_berita,0,strrpos($isi," "));
	$tgl = tgl_indo($t[tanggal]);
  $judul = substr($t['judul'],0,60); 
  $judul = substr($t['judul'],0,strrpos($judul," ")); 												
												echo"
												</div>
												
												<div class='article-header'>
													<h2><a href='berita-$t[judul_seo].html'>$judul</a></h2>
												</div>
												
												<div class='article-content'>
													<p>$isi </p>
												</div>
												
												<div class='article-links'>
													<a href='#' class='icon-link'><span class='icon-text'>&#128100;</span>by $t[nama_lengkap]</a> | 
													<a href='berita-$t[judul_seo].html' class='article-icon-link'><span class='icon-text'>&#59212;</span>Selengkapnya</a>
												</div>
											<!-- END .article-big-block -->
											</div>";
											
		while($w=mysqli_fetch_array($sub)){
  
  $judul = substr($w['judul'],0,50); 
  $judul = substr($w['judul'],0,strrpos($judul," ")); 									
											
		  echo "<ul class='article-array content-category'>
		<li>
		<a href='berita-$w[judul_seo].html'>$judul ...</a><a href='#' class='comment-icon'><span class='icon-text'>&#59160;</span></a>
											</li>
		";
		}
  
  echo "</ul>

										</div>
									<!-- END .content-panel -->
									</div>
									
								</div>";    
								}
								echo"

								<div class='clear-float'></div>";    
  ?>  
							</div>


<div class="archive-row">
								 <?php
  $main=mysqli_query($koneksi, "SELECT * FROM kategori WHERE aktif='Y' order by id_kategori ASC limit 36,3");
  
  while($r=mysqli_fetch_array($main)){
									echo"<div class='archive-block'>

									<!-- BEGIN .content-panel -->
									<div class='content-panel'>
										<div class='panel-header'>
											<b style='background:#338aa6;'><span class='icon-text'>&#9871;</span>$r[nama_kategori]</b>
											<div class='top-right'><a href='kategori-$r[id_kategori]-$r[kategori_seo].html'>Semua Artikel</a></div>
										</div>
										<div class='panel-content'>"
										;
	  //jumlah dalam kategori
  $sub=mysqli_query($koneksi, "SELECT * FROM kategori, berita  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1,5");
							
							
  $sub2=mysqli_query($koneksi, "SELECT * FROM kategori, berita,users  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND users.username=berita.username 
                      AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1");
							
							
 					
  $t=mysqli_fetch_array($sub2);
										
											echo"
											
											<!-- BEGIN .article-big-block -->
											<div class='article-big-block'>
												<div class='article-photo'>
													<span class='image-hover'>
														<span class='drop-icons'>
															<span class='icon-block'><a href='#' title='Show Image' class='icon-loupe legatus-tooltip'>&nbsp;</a></span>
															<span class='icon-block'><a href='berita-$t[judul_seo].html' title='Read Article' class='icon-link legatus-tooltip'>&nbsp;</a></span>";
															  if ($t['gambar']!=''){
														echo"</span>
														<img src='foto_berita/small_$t[gambar]' class='setborder' alt='' />
													</span>";
													}
	  $isi_berita =(strip_tags($t['isi_berita']));
  $isi = substr($isi_berita,0,225); 
  $isi = substr($isi_berita,0,strrpos($isi," "));
	$tgl = tgl_indo($t[tanggal]);
  $judul = substr($t['judul'],0,60); 
  $judul = substr($t['judul'],0,strrpos($judul," ")); 												
												echo"
												</div>
												
												<div class='article-header'>
													<h2><a href='berita-$t[judul_seo].html'>$judul</a></h2>
												</div>
												
												<div class='article-content'>
													<p>$isi </p>
												</div>
												
												<div class='article-links'>
													<a href='#' class='icon-link'><span class='icon-text'>&#128100;</span>by $t[nama_lengkap]</a> | 
													<a href='berita-$t[judul_seo].html' class='article-icon-link'><span class='icon-text'>&#59212;</span>Selengkapnya</a>
												</div>
											<!-- END .article-big-block -->
											</div>";
											
		while($w=mysqli_fetch_array($sub)){
  
  $judul = substr($w['judul'],0,50); 
  $judul = substr($w['judul'],0,strrpos($judul," ")); 									
											
		  echo "<ul class='article-array content-category'>
		<li>
		<a href='berita-$w[judul_seo].html'>$judul ...</a><a href='#' class='comment-icon'><span class='icon-text'>&#59160;</span></a>
											</li>
		";
		}
  
  echo "</ul>

										</div>
									<!-- END .content-panel -->
									</div>
									
								</div>";    
								}
								echo"

								<div class='clear-float'></div>";    
  ?>  
							</div>



<div class="archive-row">
								 <?php
  $main=mysqli_query($koneksi, "SELECT * FROM kategori WHERE aktif='Y' order by id_kategori ASC limit 39,3");
  
  while($r=mysqli_fetch_array($main)){
									echo"<div class='archive-block'>

									<!-- BEGIN .content-panel -->
									<div class='content-panel'>
										<div class='panel-header'>
											<b style='background:#338aa6;'><span class='icon-text'>&#9871;</span>$r[nama_kategori]</b>
											<div class='top-right'><a href='kategori-$r[id_kategori]-$r[kategori_seo].html'>Semua Artikel</a></div>
										</div>
										<div class='panel-content'>"
										;
	  //jumlah dalam kategori
  $sub=mysqli_query($koneksi, "SELECT * FROM kategori, berita  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1,5");
							
							
  $sub2=mysqli_query($koneksi, "SELECT * FROM kategori, berita,users  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND users.username=berita.username 
                      AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1");
							
							
 					
  $t=mysqli_fetch_array($sub2);
										
											echo"
											
											<!-- BEGIN .article-big-block -->
											<div class='article-big-block'>
												<div class='article-photo'>
													<span class='image-hover'>
														<span class='drop-icons'>
															<span class='icon-block'><a href='#' title='Show Image' class='icon-loupe legatus-tooltip'>&nbsp;</a></span>
															<span class='icon-block'><a href='berita-$t[judul_seo].html' title='Read Article' class='icon-link legatus-tooltip'>&nbsp;</a></span>";
															  if ($t['gambar']!=''){
														echo"</span>
														<img src='foto_berita/small_$t[gambar]' class='setborder' alt='' />
													</span>";
													}
	  $isi_berita =(strip_tags($t['isi_berita']));
  $isi = substr($isi_berita,0,225); 
  $isi = substr($isi_berita,0,strrpos($isi," "));
	$tgl = tgl_indo($t[tanggal]);
  $judul = substr($t['judul'],0,60); 
  $judul = substr($t['judul'],0,strrpos($judul," ")); 												
												echo"
												</div>
												
												<div class='article-header'>
													<h2><a href='berita-$t[judul_seo].html'>$judul</a></h2>
												</div>
												
												<div class='article-content'>
													<p>$isi </p>
												</div>
												
												<div class='article-links'>
													<a href='#' class='icon-link'><span class='icon-text'>&#128100;</span>by $t[nama_lengkap]</a> | 
													<a href='berita-$t[judul_seo].html' class='article-icon-link'><span class='icon-text'>&#59212;</span>Selengkapnya</a>
												</div>
											<!-- END .article-big-block -->
											</div>";
											
		while($w=mysqli_fetch_array($sub)){
  
  $judul = substr($w['judul'],0,50); 
  $judul = substr($w['judul'],0,strrpos($judul," ")); 									
											
		  echo "<ul class='article-array content-category'>
		<li>
		<a href='berita-$w[judul_seo].html'>$judul ...</a><a href='#' class='comment-icon'><span class='icon-text'>&#59160;</span></a>
											</li>
		";
		}
  
  echo "</ul>

										</div>
									<!-- END .content-panel -->
									</div>
									
								</div>";    
								}
								echo"

								<div class='clear-float'></div>";    
  ?>  
							</div>

<div class="archive-row">
								 <?php
  $main=mysqli_query($koneksi, "SELECT * FROM kategori WHERE aktif='Y' order by id_kategori ASC limit 42,3");
  
  while($r=mysqli_fetch_array($main)){
									echo"<div class='archive-block'>

									<!-- BEGIN .content-panel -->
									<div class='content-panel'>
										<div class='panel-header'>
											<b style='background:#338aa6;'><span class='icon-text'>&#9871;</span>$r[nama_kategori]</b>
											<div class='top-right'><a href='kategori-$r[id_kategori]-$r[kategori_seo].html'>Semua Artikel</a></div>
										</div>
										<div class='panel-content'>"
										;
	  //jumlah dalam kategori
  $sub=mysqli_query($koneksi, "SELECT * FROM kategori, berita  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1,5");
							
							
  $sub2=mysqli_query($koneksi, "SELECT * FROM kategori, berita,users  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND users.username=berita.username 
                      AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1");
							
							
 					
  $t=mysqli_fetch_array($sub2);
										
											echo"
											
											<!-- BEGIN .article-big-block -->
											<div class='article-big-block'>
												<div class='article-photo'>
													<span class='image-hover'>
														<span class='drop-icons'>
															<span class='icon-block'><a href='#' title='Show Image' class='icon-loupe legatus-tooltip'>&nbsp;</a></span>
															<span class='icon-block'><a href='berita-$t[judul_seo].html' title='Read Article' class='icon-link legatus-tooltip'>&nbsp;</a></span>";
															  if ($t['gambar']!=''){
														echo"</span>
														<img src='foto_berita/small_$t[gambar]' class='setborder' alt='' />
													</span>";
													}
	  $isi_berita =(strip_tags($t['isi_berita']));
  $isi = substr($isi_berita,0,225); 
  $isi = substr($isi_berita,0,strrpos($isi," "));
	$tgl = tgl_indo($t[tanggal]);
  $judul = substr($t['judul'],0,60); 
  $judul = substr($t['judul'],0,strrpos($judul," ")); 												
												echo"
												</div>
												
												<div class='article-header'>
													<h2><a href='berita-$t[judul_seo].html'>$judul</a></h2>
												</div>
												
												<div class='article-content'>
													<p>$isi </p>
												</div>
												
												<div class='article-links'>
													<a href='#' class='icon-link'><span class='icon-text'>&#128100;</span>by $t[nama_lengkap]</a> | 
													<a href='berita-$t[judul_seo].html' class='article-icon-link'><span class='icon-text'>&#59212;</span>Selengkapnya</a>
												</div>
											<!-- END .article-big-block -->
											</div>";
											
		while($w=mysqli_fetch_array($sub)){
  
  $judul = substr($w['judul'],0,50); 
  $judul = substr($w['judul'],0,strrpos($judul," ")); 									
											
		  echo "<ul class='article-array content-category'>
		<li>
		<a href='berita-$w[judul_seo].html'>$judul ...</a><a href='#' class='comment-icon'><span class='icon-text'>&#59160;</span></a>
											</li>
		";
		}
  
  echo "</ul>

										</div>
									<!-- END .content-panel -->
									</div>
									
								</div>";    
								}
								echo"

								<div class='clear-float'></div>";    
  ?>  
							</div>


<div class="archive-row">
								 <?php
  $main=mysqli_query($koneksi, "SELECT * FROM kategori WHERE aktif='Y' order by id_kategori ASC limit 45,3");
  
  while($r=mysqli_fetch_array($main)){
									echo"<div class='archive-block'>

									<!-- BEGIN .content-panel -->
									<div class='content-panel'>
										<div class='panel-header'>
											<b style='background:#338aa6;'><span class='icon-text'>&#9871;</span>$r[nama_kategori]</b>
											<div class='top-right'><a href='kategori-$r[id_kategori]-$r[kategori_seo].html'>Semua Artikel</a></div>
										</div>
										<div class='panel-content'>"
										;
	  //jumlah dalam kategori
  $sub=mysqli_query($koneksi, "SELECT * FROM kategori, berita  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1,5");
							
							
  $sub2=mysqli_query($koneksi, "SELECT * FROM kategori, berita,users  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND users.username=berita.username 
                      AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1");
							
							
 					
  $t=mysqli_fetch_array($sub2);
										
											echo"
											
											<!-- BEGIN .article-big-block -->
											<div class='article-big-block'>
												<div class='article-photo'>
													<span class='image-hover'>
														<span class='drop-icons'>
															<span class='icon-block'><a href='#' title='Show Image' class='icon-loupe legatus-tooltip'>&nbsp;</a></span>
															<span class='icon-block'><a href='berita-$t[judul_seo].html' title='Read Article' class='icon-link legatus-tooltip'>&nbsp;</a></span>";
															  if ($t['gambar']!=''){
														echo"</span>
														<img src='foto_berita/small_$t[gambar]' class='setborder' alt='' />
													</span>";
													}
	  $isi_berita =(strip_tags($t['isi_berita']));
  $isi = substr($isi_berita,0,225); 
  $isi = substr($isi_berita,0,strrpos($isi," "));
	$tgl = tgl_indo($t[tanggal]);
  $judul = substr($t['judul'],0,60); 
  $judul = substr($t['judul'],0,strrpos($judul," ")); 												
												echo"
												</div>
												
												<div class='article-header'>
													<h2><a href='berita-$t[judul_seo].html'>$judul</a></h2>
												</div>
												
												<div class='article-content'>
													<p>$isi </p>
												</div>
												
												<div class='article-links'>
													<a href='#' class='icon-link'><span class='icon-text'>&#128100;</span>by $t[nama_lengkap]</a> | 
													<a href='berita-$t[judul_seo].html' class='article-icon-link'><span class='icon-text'>&#59212;</span>Selengkapnya</a>
												</div>
											<!-- END .article-big-block -->
											</div>";
											
		while($w=mysqli_fetch_array($sub)){
  
  $judul = substr($w['judul'],0,50); 
  $judul = substr($w['judul'],0,strrpos($judul," ")); 									
											
		  echo "<ul class='article-array content-category'>
		<li>
		<a href='berita-$w[judul_seo].html'>$judul ...</a><a href='#' class='comment-icon'><span class='icon-text'>&#59160;</span></a>
											</li>
		";
		}
  
  echo "</ul>

										</div>
									<!-- END .content-panel -->
									</div>
									
								</div>";    
								}
								echo"

								<div class='clear-float'></div>";    
  ?>  
							</div>











						</div>

					<!-- END .main-content-full -->
					</div>
					
					<div class="clear-float"></div>
					
				<!-- END .wrapper -->
				</div>
				
			<!-- BEGIN .content -->
			</div>