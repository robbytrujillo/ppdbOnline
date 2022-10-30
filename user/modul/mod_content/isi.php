<?php
echo"<div class='rightpanel'>
        
        <ul class='breadcrumbs'>
            <li><a href='dashboard.html'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
            <li>Dashboard</li>
            
        </ul>
        
        <div class='pageheader'>
           
            <div class='pageicon'><span class='iconfa-laptop'></span></div>
            <div class='pagetitle'>
			

                <h2>Dashboard</h2>
                <h1>$_SESSION[namalengkap]</h1>
            </div>
        </div><!--pageheader-->
        
        <div class='maincontent'>
            <div class='maincontentinner'>
                <div class='row-fluid'>
                    <div id='dashboard-left' class='span8'>
                        
                       
                        <ul class='shortcuts'>
                            <li class='events'>
                                <a href='media.php?module=halamanstatis'>
                                    <span class='shortcuts-icon iconsi-cart'></span>
                                    <span class='shortcuts-label'>Profil Sekolah</span>
                                </a>
                            </li>
                            <li class='products'>
                                <a href='media.php?module=berita'>
                                    <span class='shortcuts-icon iconsi-archive'></span>
                                    <span class='shortcuts-label'>Menu Berita</span>
                                </a>
                            </li>
							 <li class='help'>
                                <a href='media.php?module=info'>
                                    <span class='shortcuts-icon iconsi-help'></span>
                                    <span class='shortcuts-label'>Info PPDB</span>
                                </a>
                            </li>
                            <li class='archive'>
                                <a href='media.php?module=identitas'>
                                    <span class='shortcuts-icon iconsi-images'></span>
                                    <span class='shortcuts-label'>Setting Web</span>
                                </a>
                            </li>
                           
                            <li class='last images'>
                                <a href='media.php?module=content'>
                                    <span class='shortcuts-icon iconsi-event'></span>
                                    <span class='shortcuts-label'>Setting Layout</span>
                                </a>
                            </li>
                        </ul>
                        
                        <br />
                        
                        
                        
                        
                    </div><!--span8-->
                    
                    <div id='dashboard-right' class='span4'>
                        
                       
                       
       <section class='col-lg-5 connectedSortable'>";
      include "grafik.php";
    echo "</section>
                        
                        <br />
                                                
                    </div><!--span4-->";
               
               include "footer.php";
                
            echo"</div><!--maincontentinner-->
        </div><!--maincontent-->
        
    </div><!--rightpanel-->";
	?>