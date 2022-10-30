<?php      
echo"<li><a href='media.php?module=home' class='icon-text'>&#8962;</a></li>";        
     $menu=mysqli_query($koneksi, "SELECT * FROM menu WHERE aktif='Y' ORDER BY id_menu ASC");
     while($r=mysqli_fetch_array($menu)){
     if ($r['parent']=='Y'){
	 echo "<li style='$r[atribut]'><a href='$r[link]'>$r[nama_menu]<span>&nbsp;</span></a>";
	}else
	{echo "<li style='$r[atribut]'><a href='$r[link]'>$r[nama_menu]</a>";	
	}	
	$sub=mysqli_query($koneksi, "SELECT * FROM submenu, menu  
    WHERE submenu.id_menu=menu.id_menu AND submenu.id_menu=$r[id_menu] AND submenu.id_submenu=0 AND submenu.aktif='Y' ORDER BY id_sub ASC");
     $jml=mysqli_num_rows($sub);							 
     // apabila sub menu ditemukan                
     if ($jml > 0){
     echo "<ul class='sub-menu'>";                 
	 while($w=mysqli_fetch_array($sub)){
	 if ($w['top']=='Y'){
	 echo "<li><a href='$w[link_sub]'><span> $w[nama_sub]</span></a>";
	 $sub2 = mysqli_query($koneksi, "SELECT * FROM submenu WHERE id_submenu=$w[id_sub] AND id_submenu!=0");
     $jml2=mysqli_num_rows($sub2);
     if ($jml2 > 0){
	 echo "<ul class='sub-menu'>";
	 while($s=mysqli_fetch_array($sub2)){
	 echo "<li><a href='$s[link_sub]'>$s[nama_sub]</a></li>";
	 }
	 echo "</ul></li>";
	}
	}
	 else
	{
	 echo "<li><a href='$w[link_sub]'> $w[nama_sub]</a>";	
	}	}           
	echo "</li></ul>
    </li>";
    }
      else{
     echo "</li>";
     }
     }        
     ?>