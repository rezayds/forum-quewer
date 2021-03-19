<?php include 'include/header.php'; ?>
<div class="form-kiri">
  <div class="container">
     <?php
     $sql="SELECT * FROM $tbl_name ORDER BY id DESC";
     // ORDER BY id DESC is order result by descending
     $result=mysql_query($sql);
     while($rows=mysql_fetch_array($result)){
     ?>
     <table class="post timeline">
        <tr>
           <td width="20%">
                <div class="name">
                  <a><?php echo $rows['name']; ?></a>
                </div>
           </td>
           <td align="right" width="80%">
              <?php
              $idsub=$rows['sub_id'];
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
                <a href="reply-post.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['topic'];?></a>
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
              View <?php echo $rows['view']; ?> | Reply <?php echo $rows['reply']; ?>
           </td>
           <td align="right">
              <?php echo $rows['datetime']; ?>
           </td>
        </tr>
        <br>
        <?php
        }
        ?>
     </table>
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

      <div class="br" >
         <input name="uname" type="text" style="background-color:transparent; border: none;margin-left: auto; width: 75%; margin-top: -25px">
      </div>
