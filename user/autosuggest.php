<?php
   $db = new mysqli('localhost', 'root' ,'', 'ppdb_online');	
	if(!$db) {
		echo 'Could not connect to the database.';
	} else {	
		if(isset($_POST['queryString'])) {
			$queryString = $db->real_escape_string($_POST['queryString']);
			if(strlen($queryString) >0) {
				$query = $db->query("SELECT id_pendaftaran,nama,alamat FROM pendaftaran WHERE status='B' AND (nama LIKE '$queryString%' OR id_pendaftaran LIKE '$queryString%')");				
				if($query) {
				echo '<ul>';
				while ($result = $query ->fetch_object()) 
				{
				echo '<li onClick="fill(\''.addslashes($result->nama).'\'); fill2(\''.addslashes($result->id_pendaftaran).'\');">'.$result->nama.'&nbsp;&nbsp;'.$result->alamat.'</li>';
	         	}
				echo '</ul>';
				} else {
				echo 'Waduh...! Bermasalah :(';
				}
			} else {
				// do nothing
			}
		} else {
			echo 'Anda Tidak Bisa Langsung Mengakses Script ini !';
		}
	}
?>