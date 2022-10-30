<?php
include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
include "../config/fungsi_combobox.php";
include "../config/fungsi_rupiah.php";
include "class_paging.php";


// Bagian Home
if ($_GET['module']=='home'){
include "modul/mod_content/isi.php";
}


// Bagian Identitas
elseif ($_GET['module']=='identitas'){
include "modul/mod_identitas/identitas.php";
}


// Bagian Tagline
elseif ($_GET['module']=='tagline'){
include "modul/mod_tagline/tagline.php";
}

// Bagian Google Search
elseif ($_GET['module']=='cse'){
include "modul/mod_cse/cse.php";
}

// Bagian Menu
elseif ($_GET['module']=='menu'){
include "modul/mod_menu/menu.php";
}

// Bagian Sub Menu
elseif ($_GET['module']=='submenu'){
include "modul/mod_submenu/submenu.php";
}

// Bagian LAYOUT
// Bagian Sidebar
elseif ($_GET['module']=='sidebar'){
include "modul/mod_sidebar/sidebar.php";
}
// Bagian Content
elseif ($_GET['module']=='content'){
include "modul/mod_content/content.php";
}
// Bagian Banner
elseif ($_GET['module']=='banner'){
include "modul/mod_banner/banner.php";
}
// Bagian Blog Siswa
elseif ($_GET['module']=='blogsiswa'){
include "modul/mod_blogsiswa/blogsiswa.php";
}
// Bagian Halaman
elseif ($_GET['module']=='halamanstatis'){
include "modul/mod_halamanstatis/halamanstatis.php";
}
// Bagian INFORMASI
// Bagian Berita
elseif ($_GET['module']=='berita'){
include "modul/mod_berita/berita.php";
}
// Bagian Pengumuman
elseif ($_GET['module']=='pengumuman'){
include "modul/mod_pengumuman/pengumuman.php";
}
// Bagian Agenda
elseif ($_GET['module']=='agenda'){
include "modul/mod_agenda/agenda.php";
}
// Bagian Galerry Foto
elseif ($_GET['module']=='galerifoto'){
include "modul/mod_galerifoto/galerifoto.php";
}
// Bagian Hubungi
elseif ($_GET['module']=='hubungi'){
include "modul/mod_hubungi/hubungi.php";
}
// Bagian Buku Tamu
elseif ($_GET['module']=='bukutamu'){
include "modul/mod_bukutamu/bukutamu.php";
}
// Bagian Informasi PPDB
elseif ($_GET['module']=='info'){
   include "modul/mod_info/info.php";
}
// Daya Tampung
elseif ($_GET['module']=='daya_tampung'){
   include "modul/mod_daya_tampung/daya_tampung.php";
}
// Daya Pendaftaran
elseif ($_GET['module']=='pendaftaran'){
   include "modul/mod_pendaftaran/pendaftaran.php";
}
//Hasil Tes
elseif ($_GET['module']=='hasil_tes'){
   include "modul/mod_hasil_tes/hasil_tes.php";
}
//Hasil Tes
elseif ($_GET['module']=='sekolah'){
   include "modul/mod_sekolah/sekolah.php";
}
//Hasil Tes
elseif ($_GET['module']=='tambah_hasil_tes'){
   include "modul/mod_hasil_tes/tambah_hasil_tes.php";
}

// Bagian User
elseif ($_GET['module']=='users'){
include "modul/mod_users/users.php";
}


// Bagian Edit User
elseif ($_GET['module']=='komentar'){
include "modul/mod_komentar/komentar.php";
}


// Apabila modul tidak ditemukan
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}
?>
