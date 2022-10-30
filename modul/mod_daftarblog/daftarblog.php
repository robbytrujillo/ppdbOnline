<!---- load jquery untuk tooltip <--->
<script type="text/javascript" src="jscript/js/main.js"></script>
<?php
echo"<div class='main-content-left'>
	<div class='content-article-title'>
    <h2>Blog Siswa</h2>
    <div class='right-title-side'>
    <a href='./><span class='icon-text'>&#8962;</span>Back To Homepage</a>
    </div>
    </div>
   <div class='shortcode-content'>     
     <table>
		<thead>
        	<tr>
				<th>Nama</th>
                <th>Kelas</th>
				<th>Homepage/Blog</th>											
                <th>Hit</th>
			</tr>
		</thead>
		<tbody>";
		$blog = mysqli_query($koneksi, "SELECT * FROM blogsiswa  ORDER BY id_blogsiswa DESC ");		 
      while($b=mysqli_fetch_array($blog)){
			echo"<tr>
			<td>$b[nama]</td>
			<td>$b[kelas]</td>
			<td><a href='blog-siswa-$b[id_blogsiswa].html' class='screenshot' rel='screenshoot/$b[screenshoot]'>$b[url]</a></td>
			<td>$b[hit]</td>
			</tr>";
			}
		echo"</tbody>
		</table>     
    </div>
</div>";
?>
   

					