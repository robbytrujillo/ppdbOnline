  <?php
   $aksi="modul/mod_cse/aksi_cse.php";
  switch($_GET[act]){
  // Tampil cse
  default:
    $sql  = mysqli_query($koneksi, "SELECT * FROM cse LIMIT 1");
    $r    = mysqli_fetch_array($sql);

  
   echo "<div class='rightpanel'>
        
        <ul class='breadcrumbs'>
            <li><a href='media.php?module=home'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
           
            <li>Google Custom Search</li>
            
            
        </ul>
        
        <div class='pageheader'>
                       <div class='pageicon'><span class=' iconfa-google-plus'></span></div>
            <div class='pagetitle'>
                <h5>Google Custom Search</h5>
                <h1>Google Custom Search</h1>
            </div>
        </div><!--pageheader-->
        
        <div class='maincontent'>
            <div class='maincontentinner'><div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Silahkan Melakukan Kustomisasi Melalui Form Dibawah ini</h4>
                <div class='widgetcontent wc1'>
				
                    <form id='form1' class='stdform' method=POST enctype='multipart/form-data' action=$aksi?module=cse&act=update>
					 <input type=hidden name=id value=$r[id_cse]>
						<p>
                          <label>Java Script Search Box</label>
                  <span class='field'><textarea id='autoResizeTA' name='search_box' cols='180' rows='15' class='span5' style='resize: vertical' value=$r[search_box]></textarea></span> 
                        </p>
							
						<p>
                          <label>Java Script Search Result</label>
                  <span class='field'><textarea id='autoResizeTA' name='search_result' cols='180' rows='15' class='span5' style='resize: vertical' value=$r[search_result]></textarea></span> 
                        </p>
                            
      
							
                                                    
                            <p class='stdformbutton'>
                                    <button class='btn btn-primary'>Simpan</button>
                            </p>
                    </form>
                </div><!--widgetcontent-->
            </div><!--widget-->";

  }
include "footer.php";
    ?>

   </div> 
   </div>
   </div>
   <div class='clear height-fix'></div> 
   </div></div>
