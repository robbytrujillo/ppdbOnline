<div class="main-content-split">
    <div class="main-split-left">
 <!-- BEGIN .content-panel -->
								<div class="content-panel">
									<div class="panel-header">
										<b style="background:#6d8b13;"><span class="icon-text">&#9871;</span>Agenda</b>
										<div class="top-right"><a href="semua-agenda.html">Lihat Semua Agenda</a></div>
									</div>
									<div class="panel-content">
										
										<!-- BEGIN .article-big-block -->
										<?php
										$agenda=mysqli_query($koneksi, "SELECT * FROM agenda ORDER BY id_agenda DESC LIMIT 1");	
										while($t=mysqli_fetch_array($agenda)){
										$isi_agenda = htmlentities(strip_tags($t['isi_agenda'])); // membuat paragraf pada isi berita dan mengabaikan tag html
										$isi = substr($isi_agenda,0,200); // ambil sebanyak 150 karakter
										$isi = substr($isi_agenda,0,strrpos($isi," ")); // potong per spasi kalimat
										echo"<div class='article-big-block'>
											<div class='article-photo'>
												<span class='image-hover'>
												
													<img src='foto_agenda/$t[gambar]' class='setborder' alt='$t[tema]' />
												</span>
											</div>
											
											<div class='article-header'>
												<h2>$t[tema]</h2>
											</div>
											
											<div class='article-content'>
												<p>$isi...</p>
											</div>
											
											<div class='article-links'>
												
												
											</div>
										<!-- END .article-big-block -->
										</div>";
										}
										?>
										
										<!-- BEGIN .article-array -->
										<ul class="article-array content-category">
										<?php
										$agenda=mysqli_query($koneksi, "SELECT * FROM agenda ORDER BY id_agenda DESC LIMIT 1,3");	
										while($t=mysqli_fetch_array($agenda)){
										echo"<li>$t[tema]</li>";
										}
										?>
										</ul>

									</div>
								<!-- END .content-panel -->
								</div>                       
     
  	</div>
    
    
    
        <div class="main-split-right">
 <!-- BEGIN .content-panel -->
								<div class="content-panel">
									<div class="panel-header">
										<b style="background:#9f3819;"><span class="icon-text">&#9871;</span>Pengumuman</b>
										<div class="top-right"><a href="semua-pengumuman.html">Lihat Semua Pengumuman</a></div>
									</div>
									<div class="panel-content">
										
										<!-- BEGIN .article-big-block -->
										<?php
										$pengumuman=mysqli_query($koneksi, "SELECT * FROM pengumuman ORDER BY id_pengumuman DESC LIMIT 1");	
										while($t=mysqli_fetch_array($pengumuman)){
										$isi_pengumuman = htmlentities(strip_tags($t['isi_pengumuman'])); // membuat paragraf pada isi berita dan mengabaikan tag html
										$isi = substr($isi_pengumuman,0,200); // ambil sebanyak 150 karakter
										$isi = substr($isi_pengumuman,0,strrpos($isi," ")); // potong per spasi kalimat
										echo"<div class='article-big-block'>
											<div class='article-photo'>
												<span class='image-hover'>
													<span class='drop-icons'>
													<img src='foto_agenda/$t[gambar]' class='setborder' alt='$t[tema]' />
												</span>
											</div>
											
											<div class='article-header'>
												<h2>$t[tema]</h2>
											</div>
											
											<div class='article-content'>
												<p>$isi...</p>
											</div>
										<!-- END .article-big-block -->
										</div>";
										}
										?>
										
										<!-- BEGIN .article-array -->
										<ul class="article-array content-category">
										<?php
										$pengumuman=mysqli_query($koneksi, "SELECT * FROM pengumuman ORDER BY id_pengumuman DESC LIMIT 1,3");	
										while($t=mysqli_fetch_array($pengumuman)){
										echo"<li>$t[tema]</li>";
										}
										?>
										</ul>

									</div>
								<!-- END .content-panel -->
								</div>                       
     
  	</div>
    
</div>
   

					