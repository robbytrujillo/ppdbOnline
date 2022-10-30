                            <?php
                              $terkini2=mysqli_query($koneksi, "select * from berita WHERE youtube>'0' ORDER BY id_berita DESC LIMIT 1"); 
  while($d=mysqli_fetch_array($terkini2)){
								echo"
								<!-- BEGIN .main-nosplit -->
						<div class='main-nosplit'>
							
							<!-- BEGIN .banner --><div class='banner'>
								<div class='banner-block'>
								<iframe width='300' height='250' src='$d[youtube]' frameborder='0' allowfullscreen></iframe>
								
								</div>
								
								<!-- END .banner -->
							</div>
							<!-- END .main-nosplit -->
						</div>";
						}
								?>