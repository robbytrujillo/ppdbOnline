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
                $sub = mysql_query("SELECT * FROM submenu, menu 
                WHERE submenu.id_menu = menu.id_menu 
                AND submenu.id_menu = $r[id_menu] 
                AND submenu.id_submenu=0
                AND submenu.aktif='Y'
                ORDER BY id_sub ASC");
                $jml = mysql_num_rows($sub);
            }

            //apabila submenu ditemukan
            if ($jml > 0) {
                echo "<ul class='sub-menu'>";
                while ($w['top'] =='Y') {
                    echo "<ul class='sub-menu'>";
                    while($w ['top'] == 'Y') {
                        echo "<li><a href='$w[link_sub]'><span> $w[nama_sub]</span></a>";
                    }
                }
            }
    
?>