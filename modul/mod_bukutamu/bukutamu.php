<!-- BEGIN .content -->
			<div class="content">
				
				<!-- BEGIN .wrapper -->
				<div class="wrapper">
						
					<!-- BEGIN .main-content-full -->
					<div class="main-content-full">
						
						<div class="content-article-title">
							<h2>Buku Tamu</h2>
							<div class="right-title-side">
								<br/>
								<a href="media.php?module=home"><span class="icon-text">&#8962;</span>Back To Homepage</a>
							</div>
						</div>

						<div class="shortcode-content">
							
							<div class="paragraph-double">
								<div class="paragraph-block">
					
									<?php
                                    $sql = mysqli_query($koneksi, "SELECT * FROM bukutamu ORDER BY id_bukutamu DESC LIMIT 10");
                                    while ($s = mysqli_fetch_array($sql)){
									$isi_pesan = htmlentities(strip_tags($s['pesan'])); // membuat paragraf pada isi berita dan mengabaikan tag html
									$isi = substr($isi_pesan,0,200); // ambil sebanyak 220 karakter
									$isi = substr($isi_pesan,0,strrpos($isi," ")); // potong per spasi kalimat		
                                    $tanggal = tgl_indo($s['tanggal']);
									// Memamnggil Gambar dari Gravatar
									$email = $s['email'];
								 	$lowercase = strtolower($email);
  									$image = md5($lowercase);

                                      echo"<div class='team-member single'>
									<div class='member'>
										<div class='member-photo'><img src='http://www.gravatar.com/avatar/$image' height='50' /></div>
										<div class='member-info'>
											<b>$s[nama]</b>
											<span>$tanggal</span>
											<p>$s[pesan]</p>
											<div class='clear-float'></div>
										</div>
									</div>
								</div>";
                                      }
                                      ?>
  
									
						      </div>
                              
								<div class="paragraph-block">
									<h2 class="text-indent">Silahkan Masukkan Pesan anda :</h2>
									
									<div class="contact-form">
										<form action="bukutamu-aksi.html" method="post" onSubmit=\"return validasi(this)\" id="writemessage">
											<p class="comment-form-author">
												<label for="author">Name:<span class="required">*</span></label>
												<input type="text" placeholder="Nama anda" name="nama" id="author" />
											</p>
											<p class="comment-form-email">
												<label for="email">E-mail:<span class="required">*</span></label>
												<input type="text" placeholder="e.g. email@mail.me" type="text" name="email" id="email" />
												
											</p>
                                            
											<p class="comment-form-text">
												<label for="comment">Pesan Anda:</label>
												<textarea id="comment" name="pesan" placeholder="Tuliskan di sini.."></textarea>
												<!-- <font class="comment-error textarea-error"><span class="icon-text">&#9888;</span>ERROR: Field is Empty</font> -->
											
												<?php echo"<br/><img src='captcha.php'><br>";?>
												<input type="text" placeholder="masukkan 6 kode" name="kode" id="author" />
											</p>
											<p class="form-submit">
												<input name="submit" type="submit" id="submit" class="submit-button" value="Send a Message" />
											</p>
										</form>
									</div>

								</div>
							</div>
							
							
						</div>

					<!-- END .main-content-full -->
					</div>
					
					<div class="clear-float"></div>
					
				<!-- END .wrapper -->
				</div>
				
			<!-- BEGIN .content -->
			</div>
            <!-- BEGIN .content -->