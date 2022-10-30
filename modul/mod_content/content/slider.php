<!-- BEGIN .slider-container -->
		<div class="slider-container">
			<!-- SLIDER -->
			<div class="slider-content">
			<ul>
     		<?php
  			$terkini=mysqli_query($koneksi, "SELECT * FROM berita WHERE headline='Y' ORDER BY id_berita DESC LIMIT 6");
  			$no=1;
  			while($t=mysqli_fetch_array($terkini)){      
            if ($t['gambar']!=''){
			echo"<li>
				<a href='berita-$t[judul_seo].html'>
				<span class='slider-info'>$t[judul]</span>
				<img src='foto_berita/$t[gambar]' width=680 height=250 class='setborder' alt='' />
				</a>
				</li>";
			}else
			{
			echo"<li>
				<a href='berita-$t[judul_seo].html'>
				<span class='slider-info'>$t[judul]</span>
				<img src='images/imago.jpg' width=680 height=250 class='setborder' alt='' />
				</a>
				</li>";
				}
			}
			?>
									
		</ul>
		<!-- END .slider-content -->
		</div>
		<ul class="slider-controls"></ul>
		<!-- END .slider-container -->
		</div>