<?php
if($_SESSION[leveluser]=='admin'){
?>
<div class="leftpanel">
        
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
            	<li class="nav-header">Navigation</li>
                <?php
				 //Menu Home
				if ($_GET['module']=='home'){
				echo"<li class='active'><a href='media.php?module=home'><span class='iconfa-laptop'></span> Dashboard</a></li>";
				}else{	
				echo"<li><a href='media.php?module=home'><span class='iconfa-laptop'></span> Dashboard</a></li>";
				}			
				 
					 
				//Menu Informasi		 
				 $module = $_GET['module'];
				 $a='berita';
				 $b='pengumuman'; 
				 $c='agenda';
				 $d='galerifoto';
				
				 
				 if( ($module==$a || $module==$b || $module==$c || $module==$d) ) 
					{
					echo"<li class='dropdown active'><a href=''><span class='iconfa-pencil'></span> Informasi </a>
                	 <ul style='display: block'>
                    	
                        <li class='active'><a href='media.php?module=berita'>Berita</a></li>
                        <li><a href='media.php?module=pengumuman'>Pengumuman</a></li>
                        <li><a href='media.php?module=agenda'>Agenda</a></li>
						<li><a href='media.php?module=galerifoto'>Gallery Photo</a></li>
                    </ul>
                	</li>";
				 }else
				 {
				 echo"<li class='dropdown'><a href=''><span class='iconfa-pencil'></span> Informasi </a>
                	<ul>
                    	<li><a href='media.php?module=berita'>Berita</a></li>
                        <li><a href='media.php?module=pengumuman'>Pengumuman</a></li>
                        <li><a href='media.php?module=agenda'>Agenda</a></li>
						<li><a href='media.php?module=galerifoto'>Gallery Photo</a></li>
                        
                    </ul>
					</li>";
					} 
					
					//Menu PPDB		 
				 $module = $_GET['module'];
				 $a='info';
				 $b='pendaftaran'; 
				 $c='daya_tampung';
				 $d='hasil_tes'; 
				 $e='sekolah'; 

				
				 
				 if( ($module==$a || $module==$b || $module==$c || $module==$d || $module==$e) ) 
					{
					echo"<li class='dropdown active'><a href=''><span class='iconfa-book'></span> PPDB</a>
                	 <ul style='display: block'>
                    	
                        <li class='active'><a href='media.php?module=info'>Informasi PPDB</a></li>
						<li><a href='media.php?module=daya_tampung'>Daya Tampung</a></li>
                        <li><a href='media.php?module=pendaftaran'>Pendaftaran</a></li>
						<li><a href='media.php?module=hasil_tes'>Hasil Tes</a></li>
						<li><a href='media.php?module=sekolah'>Sekolah Asal</a></li>
                    </ul>
                	</li>";
				 }else
				 {
				 echo"<li class='dropdown'><a href=''><span class='iconfa-book'></span> PPDB</a>
                	<ul>
                    	<li><a href='media.php?module=info'>Informasi PPDB</a></li>
						<li><a href='media.php?module=daya_tampung'>Daya Tampung</a></li>
                        <li><a href='media.php?module=pendaftaran'>Pendaftaran</a></li>
						<li><a href='media.php?module=hasil_tes'>Hasil Tes</a></li>
                        <li><a href='media.php?module=sekolah'>Sekolah Asal</a></li>
                    </ul>
					</li>";
					}       
					//Menu Halaman
				if ($_GET['module']=='halamanstatis'){
				echo"<li class='active'><a href='media.php?module=halamanstatis'><span class=' iconfa-bell'></span> Halaman</a></li>";
				}else{	
				echo"<li><a href='media.php?module=halamanstatis'><span class=' iconfa-bell'></span> Halaman</a></li>";
				}	
					//Menu Profil		 
				 $module = $_GET['module'];
				 $a='bukutamu';
				 $b='hubungi'; 

				 if( ($module==$a || $module==$b) ) 
					{
					echo"<li class='dropdown active'><a href=''><span class='iconfa-retweet'></span> Interaksi</a>
                	 <ul style='display: block'>
                    	
                        <li class='active'><a href='media.php?module=bukutamu'>Buku Tamu</a></li>
                        <li><a href='media.php?module=hubungi'>Hubungi</a></li>
                        
                    </ul>
                	</li>";
				 }else
				 {
				 echo"<li class='dropdown'><a href=''><span class='iconfa-retweet'></span> Interaksi </a>
                	<ul>
                    	<li><a href='media.php?module=bukutamu'>Buku Tamu</a></li>
                        <li><a href='media.php?module=hubungi'>Hubungi</a></li>

                        
                    </ul>
					</li>";
					} 
					?>  
                 <!--    //Menu Modul		 
				 $module = $_GET['module'];
				 
				 $a='kategori'; 
				  if( ($module==$a ) ) 
					{
					echo"<li class='dropdown active'><a href=''><span class='iconfa-random'></span>Modul Web </a>
                	 <ul style='display: block'>                    	
                        
                        <li class='active'><a href='media.php?module=kategori'>Kategori</a></li>
                        
                    </ul>
                	</li>";
				 }else
				 {
				 echo"<li class='dropdown'><a href=''><span class='iconfa-random'></span> Modul Web </a>
                	<ul>
                    	
                        <li><a href='media.php?module=kategori'>Kategori</a></li>
                        
                    </ul>
					</li>";
					}   
                    leftmenu-->
					 <?php
					//Menu Setting			 
				 $module = $_GET['module'];
				 $a='identitas';
				 $b='cse'; 
				 $c='menu';
				 $d='submenu';
				 $e='tagline';
				 $f='banner';
				 $g='blogsiswa';
				 if( ($module==$a || $module==$b || $module==$c || $module==$d || $module==$e || $module==$f || $module==$g) ) 
					{
					echo"<li class='dropdown active'><a href=''><span class='iconfa-wrench'></span> Setting </a>
                	 <ul style='display: block'>
                    	<li class='active'><a href='media.php?module=identitas'>Identitas</a></li>
                        <li><a href='media.php?module=tagline'>Tag Line</a></li>
						<li><a href='media.php?module=banner'>Banner</a></li>
						<li><a href='media.php?module=blogsiswa'>Blog Siswa</a></li>
                        <li><a href='media_non.php?module=cse'>Google Search</a></li>
                        <li><a href='media_non.php?module=menu'>Menu</a></li>
                        <li><a href='media_non.php?module=submenu'>Sub Menu</a></li>
                    </ul>
                	</li>";
				 }else
				 {
				 echo"<li class='dropdown'><a href=''><span class='iconfa-wrench'></span> Setting </a>
                	<ul>
                    	<li><a href='media.php?module=identitas'>Identitas</a></li>
                        <li><a href='media.php?module=tagline'>Tag Line</a></li>
						<li><a href='media.php?module=banner'>Banner</a></li>
						<li><a href='media.php?module=blogsiswa'>Blog Siswa</a></li>
                        <li><a href='media_non.php?module=cse'>Google Search</a></li>
                        <li><a href='media_non.php?module=menu'>Menu</a></li>
                        <li><a href='media_non.php?module=submenu'>Sub Menu</a></li>
                    </ul>
					</li>";
					}       
					 //Menu Lay out		 
				 $module = $_GET['module'];
				 $a='sidebar';
				 $b='content'; 
				 if( ($module==$a || $module==$b) ) 
					{
					echo"<li class='dropdown active'><a href=''><span class='iconfa-tasks'></span> Layout </a>
                	 <ul style='display: block'>
                    	<li class='active'><a href='media.php?module=sidebar'>Sidebar</a></li>
                        <li><a href='media.php?module=content'>Content</a></li>
                    </ul>
                	</li>";
				 }else
				 {
				 echo"<li class='dropdown'><a href=''><span class='iconfa-tasks'></span> Layout </a>
                	<ul>
                    	<li><a href='media.php?module=sidebar'>Sidebar</a></li>
                        <li><a href='media.php?module=content'>Content</a></li>
                    </ul>
					</li>";
					} 
				//Menu Halaman
				if ($_GET['module']=='users'){
				echo"<li class='active'><a href='media.php?module=users'><span class=' iconfa-user'></span> User</a></li>";
				}else{	
				echo"<li><a href='media.php?module=users'><span class=' iconfa-user'></span> User</a></li>";
				}	    
					?>
                 
               
                 <li><a href="media.php?module=komentar"><span class="iconfa-random"></span>Komentar</a></li>

                 
                <li><a href="logout.php"><span class="iconfa-share"></span> Log Out</a></li>
                
            </ul>
        </div><!--leftmenu-->
        
    </div><!-- leftpanel -->
    
    <?php
}else
{

?>
<div class="leftpanel">
        
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
            	<li class="nav-header">Navigation</li>
                <li><a href="dashboard.html"><span class="iconfa-laptop"></span> Dashboard</a></li>

                
                 <li><a href="media.php?module=komentar"><span class="iconfa-random"></span>Komentar</a></li>


                <li><a href="users.html"><span class="iconfa-user"></span> User</a></li>
                <li><a href="logout.php"><span class="iconfa-share"></span> Log Out</a></li>
                
                
            </ul>
        </div><!--leftmenu-->
        
    </div><!-- leftpanel -->
    
        <?php
}

?>