<?php
$getkat = mysql_query("SELECT * FROM kategori ORDER BY kategori_nama ASC");
if(mysql_num_rows($getkat) != 0){
  echo '<ul>';
  while($rowkat = mysql_fetch_assoc($getkat)){
     $kat_id = $rowkat['kategori_id'];
     $getsubkat = mysql_query("SELECT * FROM sub_kategori WHERE kategori_id='$kat_id'");

     echo '<li>'.$rowkat['kategori_nama'];
        echo '<ul>';
           while($getrowkat = mysql_fetch_assoc($getsubkat)){
              echo '<li><a href="kategori.php?sub_id='.$getrowkat['sub_id'].'">'.$getrowkat['sub_nama'].'</a></li>';
           }
        echo '</ul>';
     echo '</li>';
  }
  echo '</ul>';
}
?>
