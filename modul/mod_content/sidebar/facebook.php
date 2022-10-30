<!-- BEGIN .panel -->
	<div class="panel">
    <h3>Facebook Fanpage</h3>
    <div class="banner">
    <?php
	$facebook=mysqli_query($koneksi, "select * from identitas"); 
  	$f=mysqli_fetch_array($facebook);
	echo"<div class='fb-like-box' data-href='$f[facebook]' data-width='300' data-show-faces='true' data-header='true' data-stream='true' data-show-border='true'></div>"
	?>
	</div>  
	</div>   
	
                                							
