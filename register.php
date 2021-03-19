<?php
include 'include/header.php';

if(isset($_POST['signup'])){
   $uname = mysql_real_escape_string($_POST['uname']);
   $email = mysql_real_escape_string($_POST['email']);
   $upass = (mysql_real_escape_string($_POST['pass']));

   if(mysql_query("INSERT INTO user (username, email, password)
   VALUES('$uname','$email','$upass')")){
      ?>
      <script>
      alert('SUKSES\nAnda Telah Terdaftar');
      </script>
      <?php
   }else{
      ?>
      <script>
      alert('GAGAL\nRegistrasi gagal');
      </script>
      <?php
   }
}
?>

<div class="form">
   <form method="post">   
      <span class="title" style="color: black; font-size: 40px; margin-left: 30%;"><strong> Daftar Akun Baru </strong></span>
      
      <div class="br" >
         <label for="username" style="padding-right: 20px"> Username </label>
         <input name="uname" type="text" placeholder="Masukkan Username" style="margin-left: auto; width: 75%; margin-top: 20px">
      </div>
      
      <div class="br" >
         <label for="username" style="padding-right: 47px"> Email </label>
         <input name="email" type="email" placeholder="Masukkan Email" style="margin-left: auto; width: 75%;">
      </div>
      
      <div class="br" >
         <label for="username" style="padding-right: 23px"> Password </label>
         <input name="pass" type="password" placeholder="Masukkan Password" style="margin-left: auto; width: 75%;">
      </div>

      <div class="br" style="margin-left: 42%;" width="100px">
         <button type="submit" name="signup" style="width: 30%"> Daftar </button>
      </div>
   </form>
</div>   

