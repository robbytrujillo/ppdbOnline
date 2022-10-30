<?php
      $sql = mysqli_query($koneksi, "select meta_keyword from identitas");
      $data   = mysqli_fetch_array($sql);

    echo "$data[meta_keyword]";
?>
