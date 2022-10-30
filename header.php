<!-- BEGIN .header -->
			<div class="header">
				
				<?php
				$identitas = mysqli_query($koneksi, "select * from identitas WHERE id_identitas=1");
  				$i = mysqli_fetch_array($identitas); 
				echo"<!-- BEGIN .header-very-top -->
				<div class='header-very-top'>
					<div class='wrapper'>
						
						<div class='left'>
							<h3>$i[pembuka]</h3>
						</div>

						<div class='right'>
							
								<div class='shortcode-content'>
								<a href='$i[twitter]' target='_blank' class='icon-text social-icon'>&#62218;</a>
								<a href='$i[facebook]' target='_blank' class='icon-text social-icon'>&#62221;</a>
								<a href='$i[google]' target='_blank' class='icon-text social-icon'>&#62224;</a>
								</div>
						</div>

						<div class='clear-float'></div>
						
					</div>
					
				<!-- END .header-very-top -->
				</div>

				<!-- BEGIN .header-middle -->
				<div class='header-middle'>
					<div class='wrapper'>

						
						<div class='logo-image'>
								<a href='$i[url]'><img class='logo' src='images/$i[gambar]' alt='' /></a>
						</div>

						<div class='banner'>
							<div class='banner-block'>";
							 	$tagline=mysqli_query($koneksi, "SELECT * FROM tagline WHERE id_tagline='1'");
      							while ($t=mysqli_fetch_array($tagline)){
								echo"<img src='foto_tagline/$t[gambar]' alt='' /></a>";
								}
							echo"</div>
							
						</div>

						<div class='clear-float'></div>
						
					</div>
				<!-- END .header-middle -->
				</div>";
				?>
				<!-- BEGIN .header-menu -->
				<div class="header-menu thisisfixed">
					<div class="wrapper">
                    <ul class="main-menu">
						 <?php
							include "menu.php"; 
							?>
                            </ul>
						
						<div class="right menu-search">
							<form action="hasil-pencarian.html" method="post">
								<input type="text" placeholder="Search something.." value="" name="kata" />
								<input type="submit" class="search-button" value="&nbsp;" />
							</form>
						</div>
						
						<div class="clear-float"></div>

					</div>
				<!-- END .header-menu -->
				</div>
				

				
				
			<!-- END .header -->
			</div>
			