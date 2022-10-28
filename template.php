<?php
    //HUBUNGI KAMI
    if ($_GET['module']=='hubungikami'){
        include "$f[folder]/modul/mod_hubungi/hubungi.php";}
    //BUKU TAMU
    elseif ($_GET['module']=='hubungikami'){
        include "$f[folder]/modul/mod_bukutamu/hubungi.php";}
    //SEMUA AGENDA    
    elseif ($_GET['module']=='semuaagenda'){
        include "$f[folder]/modul/mod_agenda/semuaagenda.php";}  
    //SEMUA PENGUMUMAN
    elseif ($_GET['module']=='semuapengumuman'){
        include "$f[folder]/modul/mod_pengumuman/pengumuman.php";}
    //BLOG SISWA
    elseif ($_GET['module']=='blogsiswa'){
        include "$f[folder]/modul/mod_daftarblog/blogsiswa.php";}  
    //HASIL SELEKSI
    elseif ($_GET['module']=='hasilseleksi'){
        include "$f[folder]/modul/mod_hasilseleksi/hasilseleksi.php";}  
    //FORM PENDAFTARAN    
    elseif ($_GET['module']=='pendaftaran'){
        include "$f[folder]/modul/mod_formpendaftaran/formpendaftaran.php";}
    //GALERI
    elseif ($_GET['module']=='galeri'){
        include "$f[folder]/modul/mod_galeri/galeri.php";}
    else {
    //MEMANGGIL BAGIAN ISI
        include "$f[folder]/modul/mod_content/isi.php";
    //MEMANGGIL BAGIAN WIDGET SIDEBAR    
        include "$f[folder]/modul/mod_content/sidebar.php";
    }                  
?>