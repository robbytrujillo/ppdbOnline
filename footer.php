<!-- BEGIN .footer -->
			<div class="footer">
				
				<!-- BEGIN .wrapper -->
				<div class="wrapper">
					

					<!-- BEGIN .breaking-news -->
					<div class="breaking-news">
						
						<div class="breaking-title"><span class="breaking-icon">&nbsp;</span><b>Sekilas Info</b><div class="the-corner"></div></div>

						<div class="breaking-block">
							<ul>
								<?php
	$sql   = "SELECT * FROM berita WHERE headline='N' AND breaking_news='Y' ORDER BY id_berita DESC LIMIT 5";	
	$hasil = mysqli_query($koneksi, $sql);		
		while($r=mysqli_fetch_array($hasil)){
		  $isi_berita = htmlentities(strip_tags($r['isi_berita'])); // membuat paragraf pada isi berita dan mengabaikan tag html
    $isi = substr($isi_berita,0,100); // ambil sebanyak 220 karakter
    $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat
		echo"<li><a href='berita-$r[judul_seo].html'>$r[judul]</a><span>$isi ...</span></li>";
		}

		?>
							</ul>
						</div>
						
						<div class="breaking-controls"><a href="#" class="breaking-arrow-left">&nbsp;</a><a href="#" class="breaking-arrow-right">&nbsp;</a><div class="clear-float"></div><div class="the-corner"></div></div>
						
					<!-- END .breaking-news -->
					</div>


					<!-- BEGIN .footer-content -->
					<div class="footer-content">
						
						<div class="footer-menu">
							<ul>
								 <?php    
		$sq = mysqli_query($koneksi, "SELECT id_parent from kategori where id_parent='$_GET[id]'");
  		$n = mysqli_fetch_array($sq);           
        $khusus=mysqli_query($koneksi, "SELECT * FROM kategori WHERE aktif='Y' AND id_parent='$n[id_parent]' Order By id_kategori DESC LIMIT 9");
		 while($k=mysqli_fetch_array($khusus)){
		echo"<li><a href='kategori-$k[id_kategori]-$k[kategori_seo].html'>$k[nama_kategori]</a></li>";
}
?>
							</ul>
						</div>
						
						<div class="left">&copy; 2014 Copyright <b>Imago Media</b>. All Rights reserved.</div>
						
						<div class="right">Developed by <a href="http://imagomedia.co.id/" target="_blank"><img src="images/logo_footer.png" width="200" height="48" alt="Imago Media" /></a></div>
						
						<div class="clear-float"></div>
						
					<!-- END .footer-content -->
					</div>

					
				<!-- END .wrapper -->
				</div>
				
			<!-- END .footer -->
			</div>