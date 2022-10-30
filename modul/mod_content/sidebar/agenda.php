<!-- BEGIN .panel -->
								<div class="panel">
									<h3>Agenda</h3>
									<div>
										  <?php    
  $agenda=mysqli_query($koneksi, "SELECT * FROM agenda ORDER BY rand() DESC LIMIT 3");
  while($a=mysqli_fetch_array($agenda)){
  $tgl_mulai = tgl_indo($a['tgl_mulai']);
  $tgl_selesai = tgl_indo($a['tgl_selesai']);
  $isi_agenda = strip_tags($a['isi_agenda']);
  $isi = substr($isi_agenda,0,80);
  $isi = substr($isi_agenda,0,strrpos($isi," ")); 
  
										echo"<div class='panel-comment'>
											<div class='comment-header'>
												<b>$a[tema]</b>
											</div>
											<div class='comment-links'>
												<a href='#' class='comment-icon-link'><span class='icon-text'>&#59160;</span>$tgl_mulai - $tgl_selesai</a>
											</div>
											<div class='comment-content'>
												<p>'$isi ...'</p>
											</div>
											
										</div>";
										}
  ?>
										
										

									</div>
								<!-- END .panel -->
								</div>