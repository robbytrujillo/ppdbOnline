<div class="main-content-left">
        <div class="content-article-title">
                <h2>Semua Pengumuman</h2>
            <div class="right-title-side">
                <a href="./><span class="icon-text">&#8962;</span>Back To Homepage</a>
            </div>
        </div>

        <div class="main-nosplit">
        <div id="scrollbar1">
       	 <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
        	<div class="viewport">
        	<div class="overview">

	<div class="shortcode-content">
	<?php
    $sql = mysqli_query($koneksi, "SELECT * FROM pengumuman ORDER BY id_pengumuman DESC ");		 
      while($d=mysqli_fetch_array($sql)){
      $tgl_posting = tgl_indo($d['tgl_posting']);
      echo"<div class='paragraph-double'>
            <div class='paragraph-block'>
                    
            <div class='article-photo'>
                <span class='image-hover'>
                    <span class='drop-icons'>
                        <span class='icon-block'><a href='#' title='View Gallery' class='icon-loupe legatus-tooltip'>&nbsp;</a></span>
                        </span>
                        <img src='foto_agenda/$d[gambar]' width='320' border='0'>
                        </span>
					</span>
				</span>
             
            </div>
           
            </div>
            <div class='paragraph-block'>
            <div class='article-header'>
            <h4><a href='#'>$d[tema]</a></h4>
            </div>
        
            <p>$d[isi_pengumuman]</p>
            </div>
        </div>
		<div class='spacer-break-4'></div>";
        }?>  
	
    
 		</div>    
    
    		</div>
            </div>
        </div>
       </div>
      </div>

						
                       
   

	<div class="main-content-right">
    <?php
	include "modul/mod_content/sidebar/cse.php";
	include "modul/mod_content/sidebar/facebook.php";
	?>
    </div> 
   