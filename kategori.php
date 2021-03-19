<?php
include 'include/header.php';
$sub_id=$_GET['sub_id'];
$kat="SELECT * FROM $tbl_name WHERE sub_id='$sub_id'";
$getkat=mysql_query($kat);
$judulhal=mysql_query("SELECT sub_nama FROM sub_kategori WHERE sub_id='$sub_id'");
$tarojudul=mysql_fetch_array($judulhal);
?>

<div class="form-kiri">
  <div class="container">
	<h2><?php echo "Kategori ".$tarojudul['sub_nama']; ?></h2>

	<?php
	while($rowkat=mysql_fetch_array($getkat)) {
		?>
		<table class="post timeline">
	   <tr>
	      <td width="20%">
          <div class="name">
            <a><?php echo $rowkat['name']; ?></a>
          </div>
	      </td>
	      <td align="right" width="80%">
	         <?php
					 $idsub=$rowkat['sub_id'];
					 $queryid=mysql_query("SELECT sub_nama FROM sub_kategori WHERE sub_id=$idsub");
					 $namasub=mysql_fetch_array($queryid);
					 echo $namasub['sub_nama'];
					 ?>
	      </td>
	   </tr>
	   <tr>
	      <td width="100%" colspan="2">
	         <hr>
	      </td>
	   </tr>
	   <tr>
	      <td width="100%" colspan="2">
          <div class="topic">
            <a href="reply-post.php?id=<?php echo $rowkat['id']; ?>"><?php echo $rowkat['topic'];?></a>
          </div>
	      </td>
	   </tr>
	   <tr>
	      <td width="100%" colspan="2">
	         <hr>
	      </td>
	   </tr>
	   <tr>
	      <td align="left">
	         View <?php echo $rowkat['view']; ?> | Reply <?php echo $rowkat['reply']; ?>
	      </td>
	      <td align="right">
					 <?php echo $rowkat['datetime']; ?>
	      </td>
	   </tr>
		 	</table>
			<br>
	<?php
	}
	?>
	</div>
</div>

<div class="form-kanan timeline">
  <div class="container">
       <hr>
    <h2 style="text-align:center">Kategori</h2>
    <hr>
    <?php include 'kategori-proses.php' ?>
    <hr>
    <h2 style="text-align:center">FAQ</h2>
    <hr>
    <?php include 'faq-proses.php' ?>

  </div>
</div>
