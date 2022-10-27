<?php
//input banner
if ($module == 'banner' AND $act == 'input') {
	$lokasi_file = $_FILES['fupload']['tmp_name'];
	$nama_file = $_FILES['fupload']['name'];
	//Apabila ada gambar yang diupload
	if (!empty($lokasi_file)) {
		Uploadbanner ($nama_file);
		mysql_query("INSERT INTO banner(judul, url, tgl_posting, gambar) VALUES ('$_POST[judul]', '$_POST[url]', '$tgl_sekarang', '$nama_file')");
	} else {
		mysql_query("INSERT INTO banner(judul, tgl_posting, url) VALUES ('$_POST[judul]', '$tgl_sekarang', $_POST[url]')");
	}
	header('location:../../media.php?module='.module);
}
?>