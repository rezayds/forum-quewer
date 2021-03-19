<?php
include 'include/header.php';
// get value of id that sent from address bar
$id=$_GET['id'];
$sql="SELECT * FROM $tbl_name WHERE id='$id'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);
if (isset($_SESSION['user'])!="") {
?>

   <table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
      <tr>
         <td>
            <table width="100%" border="0" cellpadding="3" cellspacing="1" bordercolor="1" bgcolor="#FFFFFF">
               <tr>
                  <td bgcolor="#F8F7F1">
                     <strong><?php echo $rows['topic']; ?></strong>
                  </td>
               </tr>
               <tr>
                  <td bgcolor="#F8F7F1"><?php echo $rows['detail']; ?></td>
               </tr>
               <tr>
                  <td bgcolor="#F8F7F1">
                     <strong>By :</strong> <?php echo $rows['name']; ?>
                     <strong>Email : </strong><?php echo $rows['email'];?>
                  </td>
               </tr>
               <tr>
                  <td bgcolor="#F8F7F1">
                     <strong>Date/time : </strong><?php echo $rows['datetime'];?>
                  </td>
               </tr>
            </table>
         </td>
      </tr>
   </table>
   <br>

   <?php
   $tbl_name2="forum_answer"; // Switch to table "forum_answer"
   $sql2="SELECT * FROM $tbl_name2 WHERE question_id='$id'";
   $result2=mysql_query($sql2);
   $no=1;
   while($rows=mysql_fetch_array($result2)){
   ?>

      <table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
         <tr>
            <td>
               <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                  <tr>
                     <td width="18%" bgcolor="#F8F7F1">
                        <strong>NO</strong>
                     </td>
                     <td width="5%" bgcolor="#F8F7F1">:</td>
                     <td width="77%" bgcolor="#F8F7F1"><?php echo $no; ?></td>
                  </tr>
                  <tr>
                     <td width="18%" bgcolor="#F8F7F1">
                        <strong>Name</strong>
                     </td>
                     <td width="5%" bgcolor="#F8F7F1">:</td>
                     <td width="77%" bgcolor="#F8F7F1"><?php echo $rows['a_name']; ?></td>
                  </tr>
                  <tr>
                     <td bgcolor="#F8F7F1">
                        <strong>Email</strong>
                     </td>
                     <td bgcolor="#F8F7F1">:</td>
                     <td bgcolor="#F8F7F1"><?php echo $rows['a_email']; ?></td>
                  </tr>
                  <tr>
                     <td bgcolor="#F8F7F1">
                        <strong>Answer</strong>
                     </td>
                     <td bgcolor="#F8F7F1">:</td>
                     <td bgcolor="#F8F7F1"><?php echo $rows['a_answer']; ?></td>
                  </tr>
                  <tr>
                     <td bgcolor="#F8F7F1">
                        <strong>Date/Time</strong>
                     </td>
                     <td bgcolor="#F8F7F1">:</td>
                     <td bgcolor="#F8F7F1"><?php echo $rows['a_datetime']; ?></td>
                  </tr>
               </table>
            </td>
         </tr>
      </table>
      <br>

      <?php
      $no=$no+1;
      }
      $sql3="SELECT view FROM $tbl_name WHERE id='$id'";
      $result3=mysql_query($sql3);
      $rows=mysql_fetch_array($result3);
      $view=$rows['view'];
      // if have no counter value set counter = 1
      if(empty($view)){
         $view=1;
         $sql4="INSERT INTO $tbl_name(view) VALUES('$view') WHERE id='$id'";
         $result4=mysql_query($sql4);
      }
      // count more value
      $addview=$view+1;
      $sql5="UPDATE $tbl_name SET view='$addview' WHERE id='$id'";
      $result5=mysql_query($sql5);
      //ajaib
      $sql6=mysql_query("SELECT * FROM user WHERE user_id=".$_SESSION['user']);
      $result6=mysql_fetch_array($sql6);
      ?>

      <br>

      <table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
         <tr>
            <form name="form1" method="post" action="reply-post-proses.php">
               <td>
                  <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                     <tr>
                        <td width="18%">
                           <strong>Name</strong>
                        </td>
                        <td width="3%">:</td>
                        <td width="79%">
                           <input name="a_name" type="text" id="a_name" size="45" value="<?php echo $result6['username']; ?>" readonly>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <strong>Email</strong>
                        </td>
                        <td>:</td>
                        <td>
                           <input name="a_email" type="text" id="a_email" size="45" value="<?php echo $result6['email']; ?>" readonly>
                        </td>
                     </tr>
                     <tr>
                        <td valign="top">
                           <strong>Answer</strong>
                        </td>
                        <td valign="top">:</td>
                        <td>
                           <textarea name="a_answer" cols="45" rows="3" id="a_answer"></textarea>
                        </td>
                     </tr>
                     <tr>
                        <td>&nbsp;</td>
                        <td>
                           <input name="id" type="hidden" value="<?php echo $id; ?>">
                        </td>
                        <td>
                           <input type="submit" name="Submit" value="Submit">
                        </td>
                     </tr>
                  </table>
               </td>
            </form>
         </tr>
      </table>


      <p align="center">
         <a href="index.php">Kembali</a>
      </p>


      <?php
      mysql_close();
      }else{
      ?>
      <script type="text/javascript">
         alert("Silahkan login terlebih dahulu");
         window.location.href="index.php"
      </script>
      <?php
      }
      ?>



========================

<?php
include 'include/header.php';
// get value of id that sent from address bar
$id=$_GET['id'];
$sql="SELECT * FROM $tbl_name WHERE id='$id'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);
if (isset($_SESSION['user'])!="") {
?>

<div style="margin-left:15%">
   <div class="form" style="padding-bottom: 86px; width:30%">
      <div class="br">
          <strong> <?php echo $rows['topic']; ?></strong>
      </div>

      <div class="br">
          <?php echo $rows['detail']; ?>    
      </div>

      <div class="br">
         <div class="kiri"> 
            <strong>By</strong>
          </div>
            <div class="kanan"> 
               <strong>:</strong> <?php echo $rows['name']; ?>
            </div>
      </div>

      <div class="br">
            <div class="kiri"> 
               <strong>Email</strong>
            </div>
         <div class="kanan"> 
               <strong>:</strong> <?php echo $rows['email']; ?>
            </div>
      </div>   

      <div class="br">
            <div class="kiri"> 
               <strong>Date/time</strong>
            </div>
            <div class="kanan"> 
               <strong>:</strong> <?php echo $rows['datetime']; ?>
            </div>
      </div>   
   </div>
</div>         

<?php
   $tbl_name2="forum_answer"; // Switch to table "forum_answer"
   $sql2="SELECT * FROM $tbl_name2 WHERE question_id='$id'";
   $result2=mysql_query($sql2);
   $no=1;
   while($rows=mysql_fetch_array($result2)){
   ?>

<div class="form" style="margin-left:15%; margin-bottom: -80px">
      <div class="br">
         <div class="kiri"> 
            <strong>NO</strong>
         </div>
         <div class="tengah"> 
            <strong>:</strong>
         </div>
         <div class="kanan"> 
             <?php echo $no; ?>
         </div>
      </div>  

      <div class="br ">
         <div class="kiri"> 
            <strong>Username</strong>
         </div>
         <div class="tengah"> 
            <strong>:</strong>
         </div>
         <div class="kanan"> 
             <?php echo $rows['a_name']; ?>
         </div>
       </div>  
       
      <div class="br ">
         <div class="kiri"> 
            <strong>Answer</strong>
         </div>
         <div class="tengah"> 
            <strong>:</strong>
         </div>
         <div class="kanan"> 
            <?php echo $rows['a_answer']; ?>
         </div>
       </div>
       
      <div class="br ">
         <div class="kiri"> 
            <strong>Answer</strong>
         </div>
         <div class="tengah"> 
            <strong>:</strong>
         </div>
         <div class="kanan"> 
            <?php echo $rows['a_answer']; ?>
         </div>
       </div>

      <div class="br ">
         <div class="kiri"> 
            <strong>Datetime</strong>
         </div>
         <div class="kanan"> 
            <?php echo $rows['a_datetime']; ?>
         </div>
       </div>

   </div>  

       <?php
      $no=$no+1;
      }
      $sql3="SELECT view FROM $tbl_name WHERE id='$id'";
      $result3=mysql_query($sql3);
      $rows=mysql_fetch_array($result3);
      $view=$rows['view'];
      // if have no counter value set counter = 1
      if(empty($view)){
         $view=1;
         $sql4="INSERT INTO $tbl_name(view) VALUES('$view') WHERE id='$id'";
         $result4=mysql_query($sql4);
      }
      // count more value
      $addview=$view+1;
      $sql5="UPDATE $tbl_name SET view='$addview' WHERE id='$id'";
      $result5=mysql_query($sql5);
      //ajaib
      $sql6=mysql_query("SELECT * FROM user WHERE user_id=".$_SESSION['user']);
      $result6=mysql_fetch_array($sql6);
      ?>

<div class="form">
   <span class="title" style="color: black; font-size: 40px; margin-left: 32.5%"><strong> Buat Pertanyaan </strong></span>
   
   <form id="form1" name="form1" method="post" action="reply-post-proses.php">
         <input name="id" type="hidden" value="<?php echo $id; ?>">
       <div class="br">
            <label for="Name" style="padding-right: 20px; "> Name </label>
            <input name="a_name" type="text" id="name" style="margin-left: auto; width: 80%; margin-top: 20px" value="<?php echo $result6['username'] ?>" readonly/>
       </div>

       <div class="br">
            <label for="Email" style="padding-right: 20px"> Email </label>
            <input name="email" type="email" id="email" style="margin-left: auto; width: 80%" value="<?php echo $result6['email'] ?>" readonly/>
       </div>

       <div class="br">
            <label for="Detail" style="padding-right: 18px"> Jawaban </label>
       </div>   
       <div class="br">
            <textarea name="a_answer" type="text" id="a_answer" placeholder="Masukkan Jawaban" style="margin-left: 18.5%; margin-top: -6%; width: 80% "></textarea>
       </div>  

       <div class="br" style="margin-left: 45%; padding-bottom: 70px">
            <button type="submit" name="Submit" style="width: 30%"> Submit </button>
         </div>

       <div class="kembali" style="margin-top: -20%;">
            <a href="index.php"> &nbsp; Kembali &nbsp;</a>
       </div> 

   </form>
</div>       

   <?php
      mysql_close();
      }else{
      ?>
      <script type="text/javascript">
         alert("Silahkan login terlebih dahulu");
         window.location.href="index.php"
      </script>
      <?php
      }
      ?>