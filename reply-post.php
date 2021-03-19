<?php
include 'include/header.php';
// get value of id that sent from address bar
$id=$_GET['id'];
$sql="SELECT * FROM $tbl_name WHERE id='$id'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);
if (isset($_SESSION['user'])!="") {
?>

<div style="width: 100%">
   <div class="form" style="padding-bottom: 86px; margin-left: 305px; width: 52%">
   <span class="title" style="color: black; font-size: 30px; margin-left: 38%; text-decoration: underline"><strong> Pertanyaan </strong></span>
  
      <div class="br" style="padding-top: 20px">
          <strong> <?php echo $rows['topic']; ?></strong>
      </div>

      <div class="br">
          <?php echo $rows['detail']; ?>    
      </div>

      <div class="br">
         <div class="kiri"> 
            <strong>Username</strong>
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
<hr width="55%" color="black"/>     
<hr width="55%" color="black" style="margin-bottom: 30px;" />   

<?php
   $tbl_name2="forum_answer"; // Switch to table "forum_answer"
   $sql2="SELECT * FROM $tbl_name2 WHERE question_id='$id'";
   $result2=mysql_query($sql2);
   $no=1;
   while($rows=mysql_fetch_array($result2)){
   ?>

   <div class="br form" style="margin-top: 0px; padding-left: 2.5%; padding-right: 2.5%;">
      <table style="width: 100%; ">
            <tr>
               <td style=" padding-bottom: 10px;" width="10%"> No </td>
               <td style=" padding-bottom: 10px;" width="2%"> : </td>
               <td style=" padding-bottom: 10px;" width="75%"> <?php echo $no; ?></td>
            </tr>
            <tr>
               <td style=" padding-bottom: 10px; vertical-align: top"> Username </th>
               <td style=" padding-bottom: 10px; vertical-align: top"> : </th>
               <td style=" padding-bottom: 10px; vertical-align: top"> <?php echo $rows['a_name']; ?></td>
            </tr>
            <tr>
               <td style=" padding-bottom: 10px; vertical-align: top"> Email </th>
               <td style=" padding-bottom: 10px; vertical-align: top"> : </th>
               <td style=" padding-bottom: 10px; vertical-align: top"> <?php echo $rows['a_email']; ?></td>
            </tr>
            <tr>
               <td style=" padding-bottom: 10px; vertical-align: top"> Answer </th>
               <td style=" padding-bottom: 10px; vertical-align: top"> : </th>
               <td style=" padding-bottom: 10px; vertical-align: top" align="justify"> <?php echo $rows['a_answer']; ?></td>
            </tr>
            <tr>
               <td style=" padding-bottom: 10px; vertical-align: top"> Date/Time </th>
               <td style=" padding-bottom: 10px; vertical-align: top"> : </th>
               <td style=" padding-bottom: 10px; vertical-align: top"> <?php echo $rows['a_datetime']; ?></td>
            </tr>
         </table>
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
   <span class="title" style="color: black; font-size: 40px; margin-left: 28%"><strong> Jawab Pertanyaan </strong></span>
   
   <form id="form1" name="form1" method="post" action="reply-post-proses.php">
         <input name="id" type="hidden" value="<?php echo $id; ?>">
       <div class="br">
            <label for="Name" style="padding-right: 20px; "> Name </label>
            <input name="a_name" type="text" id="name" style="margin-left: auto; width: 80%; margin-top: 20px" value="<?php echo $result6['username'] ?>" readonly/>
       </div>

       <div class="br">
            <label for="Email" style="padding-right: 20px"> Email </label>
            <input name="a_email" type="email" id="email" style="margin-left: auto; width: 80%" value="<?php echo $result6['email'] ?>" readonly/>
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