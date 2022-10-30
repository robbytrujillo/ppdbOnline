<div class="main-content-left">
<?php
echo"<div id='user'></div>";	
?>
</div>





<!-- BEGIN .main-content-right -->
					<div class="main-content-right">
						
						
							
                            <?php
                              $terkini2=mysqli_query($koneksi, "select * from video ORDER BY id_video DESC LIMIT 1"); 
  while($d=mysqli_fetch_array($terkini2)){
								echo"
								<!-- BEGIN .main-nosplit -->
						<div class='main-nosplit'>
							
							<!-- BEGIN .banner --><div class='banner'>
								<div class='banner-block'>
								<iframe width='300' height='250' src='$d[youtube]' frameborder='0' allowfullscreen></iframe>
								
								</div>
								<div class='banner-info'>
									<a href='contact-us.html' class='sponsored'><span class='icon-default'>&nbsp;</span>Video Anda<span class='icon-default'>&nbsp;</span></a>
								</div>
								<!-- END .banner -->
							</div>
							<!-- END .main-nosplit -->
						</div>";
						}
								?>


						<!-- BEGIN .main-nosplit -->
						<div class="main-nosplit">
							
    <?php                    
   $iklan=mysqli_query($koneksi, "select * from iklantengah WHERE id_iklantengah = '2'"); 
  while($i=mysqli_fetch_array($iklan)){
								echo"<div class='banner'>
								<div class='banner-block'>
									<a href='$i[url]' target='_blank' title='$i[judul]'><img src='foto_iklantengah/$i[gambar]' alt='' /></a>
								</div>
								<div class='banner-info'>
									<a href='#' class='sponsored'><span class='icon-default'>&nbsp;</span>Sponsored Advert<span class='icon-default'>&nbsp;</span></a>
								</div>
							<!-- END .banner -->
							</div>
";
						}
								?>

							

							
						<!-- END .main-nosplit -->
						</div>
						
					<!-- END .main-content-right -->
					</div>