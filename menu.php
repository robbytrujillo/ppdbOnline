<?php
    echo "<li><a href='media.php?module.php?module=home'
    class='icon-text'>&#8962;<a><li>";
    $menu = mysql_query ("SELECT * FROM menu WHERE aktif='Y' ORDER BY id_menu ASC");
            while ($r = myslq_fetch_array($menu)) {
                if ($r['parent'] == 'Y') {
                    echo "<li style='$r[atribut]'><a href='$[link]'>$r[nama_menu]<span>&nbsp;</span></a>";
                }else {
                    echo "<li style='$r[atribut]'><a href='$[link]'>$r[nama_menu]</a>";
                }
                
            }
    
?>