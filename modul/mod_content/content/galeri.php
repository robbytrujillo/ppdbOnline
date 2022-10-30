<div class="content-panel">
	<div class="panel-header">
	<b><span class="icon-text">&#128247;</span>Galleri Photo</b>
	<div class="top-right"><a href="galeri-photo.html">Lihat Semua Koleksi Photo</a></div>
	</div>
    <div class="shortcode-content"> 
     	<div class="gallery-preview">
									<a href="#gallery-left" class="gallery-preview-control icon-text">&#59229;</a>
									<a href="#gallery-right" class="gallery-preview-control icon-text">&#59230;</a>

									<div class="gallery-thumbs">
										<ul>
                                        <?php
										$tampil = mysqli_query($koneksi, "SELECT * FROM gallery ORDER BY id_gallery DESC LIMIT 1");
										 while($r=mysqli_fetch_array($tampil)){
											echo"<li class='active'>
											<a href='galeri-photo.html'><img src='img_galeri/kecil_$r[gbr_gallery]' height='60' width='80' class='setborder' alt='' /></a></li>";
											}?>
                                             <?php
										$tampil = mysqli_query($koneksi, "SELECT * FROM gallery ORDER BY id_gallery DESC LIMIT 1,5");
										 while($r=mysqli_fetch_array($tampil)){
											echo"<li><a href='galeri-photo.html'><img src='img_galeri/kecil_$r[gbr_gallery]' height='70' width='100' class='setborder' alt='' /></a></li>";
											}?>
											
										</ul>
										</div>
									<ul class="full-size">
										 <?php
										$tampil = mysqli_query($koneksi, "SELECT * FROM gallery ORDER BY id_gallery DESC LIMIT 1");
										 while($r=mysqli_fetch_array($tampil)){
											echo"<li class='active'>
											<a href='galeri-photo.html'><img src='img_galeri/$r[gbr_gallery]'  width='700' class='setborder' alt='' /></a></li>";
											}?>
                                             <?php
										$tampil = mysqli_query($koneksi, "SELECT * FROM gallery ORDER BY id_gallery DESC LIMIT 1,5");
										 while($r=mysqli_fetch_array($tampil)){
											echo"<li><a href='galeri-photo.html'><img src='img_galeri/$r[gbr_gallery]' height='570' width='700' class='setborder' alt='' /></a></li>";
											}?>
									
									</ul>
		</div>
     </div>
</div>
    