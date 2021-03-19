<?php
include 'include/koneksi.php';
// get data that sent from form
$sub=$_POST['sub'];
$topic=$_POST['topic'];
$detail=$_POST['detail'];
$name=$_POST['name'];
$email=$_POST['email'];
$datetime=date("d/m/y h:i:s"); //create date time
$sql="INSERT INTO $tbl_name(sub_id, topic, detail, name, email, datetime)VALUES('$sub','$topic',
   '$detail', '$name', '$email', '$datetime')";
$result=mysql_query($sql);
if($result){
   ?>
   <script type="text/javascript">
      alert("SUKSES\nPost telah dibuat");
      window.location.href='index.php';
   </script>
   <?php
}else{
   ?>
   <script type="text/javascript">
      alert("GAGAL\nCek kembali post anda");
      window.location.href='index.php';
   </script>
   <?php
}
mysql_close();
?>
