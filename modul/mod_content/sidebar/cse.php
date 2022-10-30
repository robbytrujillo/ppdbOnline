<div class="panel">
			<h3>Google Search</h3>
			<div class="banner">
		  	<?php
			$cse=mysqli_query($koneksi, "select * from cse"); 
  			$g=mysqli_fetch_array($cse);
				echo"$g[search_box]";
			
			?>
         </div>
      </div>