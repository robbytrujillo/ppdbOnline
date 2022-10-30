<!-- BEGIN .panel -->
							<div class="panel">
								<h3>Tag Cloud</h3>
								<div class="tagcloud">
                                <?php
								$tag = mysqli_query($koneksi, "SELECT * FROM tag ORDER BY id_tag");
$ambil = mysqli_num_rows(mysqli_query($koneksi, "SELECT id_berita FROM berita"));
while ($var=mysqli_fetch_array($tag)) {
$an = mysqli_query($koneksi, "SELECT count(id_berita) as jml, tag FROM berita WHERE
tag LIKE '%$var[tag_seo]%'");
$kk = mysqli_fetch_array($an);
if ($kk['jml'] > 0) {
$px = (($kk['jml']*100)/$ambil)+100;
echo " <a href='tag-$var[tag_seo].html'>$var[nama_tag]</a>";
mysqli_query($koneksi, "UPDATE tag SET count =$kk[jml] WHERE id_tag = $var[id_tag]");
}
else {echo " ";}
}									
echo "<br />";

echo"</div>
<!-- END .panel -->
</div>";
?>