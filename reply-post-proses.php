<?php
include 'include/header.php';
// Get value of id that sent from hidden field
$id=$_POST['id'];
// Find highest answer number.
$sql="SELECT MAX(a_id) AS Maxa_id FROM $tbl_name2 WHERE question_id='$id'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);
// add + 1 to highest answer number and keep it in variable name "$Max_id". if there no answer yet set it = 1
if ($rows) {
   $Max_id = $rows['Maxa_id']+1;
}else{
   $Max_id = 1;
}
// get values that sent from form
$a_name=$_POST['a_name'];
$a_email=$_POST['a_email'];
$a_answer=$_POST['a_answer'];
$datetime=date("d/m/y H:i:s"); // create date and time
// Insert answer
$sql2="INSERT INTO $tbl_name2(question_id, a_id, a_name, a_email, a_answer,
   a_datetime)VALUES('$id', '$Max_id', '$a_name', '$a_email', '$a_answer', '$datetime')";
$result2=mysql_query($sql2);
if($result2){
   ?>

   <script type="text/javascript">
      alert("SUKSES\nReply telah dibuat");
      window.location.href='reply-post.php?id=<?php echo $id; ?>';
   </script>

   <?php
   // If added new answer, add value +1 in reply column
   $sql3="UPDATE $tbl_name SET reply='$Max_id' WHERE id='$id'";
   $result3=mysql_query($sql3);
   }else{
   ?>

   <script type="text/javascript">
      alert("GAGAL\nCek kembali reply anda");
      window.location.href('reply-post.php?id=<?php echo $id; ?>');
   </script>

<?php
}
mysql_close();
?>
