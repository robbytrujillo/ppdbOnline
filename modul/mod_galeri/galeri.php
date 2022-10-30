<!-- BEGIN .content -->
			<div class="content">
				
				<!-- BEGIN .wrapper -->
				<div class="wrapper">
						
					<!-- BEGIN .main-content-full -->
					<div class="main-content-full">
						
						<div class="content-article-title">
							<h2>Photo Gallery</h2>
							<div class="right-title-side">
								<br/>
								<a href="media.php?module=home"><span class="icon-text">&#8962;</span>Back To Homepage</a>
							</div>
						</div>
						
						<!-- BEGIN .single-gallery -->
						<div class="single-gallery">
							<div class="panel-gallery">
                        	 <div class="gallery-header">
								</div>
							<div class="gallery-box">
                            	
							<div class="gallery-box-main-image">
                            
		         			<div class="gallery-images">
					<a href="#" class="gallery-navi-left icon-text">&#59229;</a>
					<a href="#" class="gallery-navi-right icon-text">&#59230;</a>

					<ul>
                    <?php
					$sql   = "SELECT * FROM gallery ORDER BY id_gallery DESC LIMIT 1";	
					$hasil = mysqli_query($koneksi, $sql);		
					while($r=mysqli_fetch_array($hasil)){
					echo"<li class='active'><img src='img_galeri/$r[gbr_gallery]' width='970px' height='500px' alt='' /></li>";
					}
					?>	
                    <?php
					$sql   = "SELECT * FROM gallery ORDER BY id_gallery DESC LIMIT 1,1000";	
					$hasil = mysqli_query($koneksi, $sql);		
					while($r=mysqli_fetch_array($hasil)){
					echo"<li><img src='img_galeri/$r[gbr_gallery]' width='970px' height='500px' alt='' /></li>";
					}
					?>	               
						
					</ul>
				</div>
             <img src="default.png" width='470px' height='380px'alt="" />
		</div>

								
							</div>

						<!-- END .single-gallery -->
						</div>

					<!-- END .main-content-full -->
					</div>
					
					<div class="clear-float"></div>
					
				<!-- END .wrapper -->
				</div>
				
			<!-- BEGIN .content -->
			</div>
            <!-- BEGIN .content -->