<div class="main-content-left">
        <div class="content-article-title">
                <h2>Semua Agenda</h2>
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
    $sql = mysqli_query($koneksi, "SELECT * FROM agenda  ORDER BY id_agenda DESC ");		 
      while($d=mysqli_fetch_array($sql)){
      $tgl_posting = tgl_indo($d['tgl_posting']);
      $tgl_mulai   = tgl_indo($d['tgl_mulai']);
      $tgl_selesai = tgl_indo($d['tgl_selesai']);
      $isi_agenda  = nl2br($d['isi_agenda']);
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
                 <p>                    
										<ul>
										<li class='styled'><span class='icon-text'>&#59172;</span><b>$d[tempat]</b></li>
										<li class='styled'><span class='icon-text'>&#9733;</span><b>$tgl_mulai - $tgl_selesai</b></li>
										</ul>
                   </p>                     
            </div>
           
            </div>
            <div class='paragraph-block'>
            <div class='article-header'>
            <h4><a href='#'>$d[tema]</a></h4>
            </div>
        
            <p>$d[isi_agenda]</p>
            </div>
        </div><div class='spacer-break-4'></div>";
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
   