<html>
   <head>
      <title>Forum QueWer</title>
      <link rel="stylesheet" type="text/css" href="include/style.css">
      <link rel="stylesheet" type="text/css" href="include/dropdown.css">
   </head>
   <body>

<?php
session_start();
include_once 'include/koneksi.php';

if(isset($_POST['login'])){
   $user = mysql_real_escape_string($_POST['user']);
   $upass = mysql_real_escape_string($_POST['pass']);
   $res=mysql_query("SELECT * FROM user WHERE username='$user'");
   $row=mysql_fetch_array($res);

   if($row['password']== $upass && $row['username']== $user){
      $_SESSION['user'] = $row['user_id'];
      header("Location: index.php");
   }else{
      ?>
      <script>
         alert('Login Gagal!');
         window.Location.href="index.php";
      </script>
      <?php
   }
}

if(isset($_SESSION['user'])!=""){
   ?>
   <header class="header"  style="color: white">
      <a href="index.php">
         <target="index.php">
         <img src="image/quewer.png"/>
      </a>

      <div class="user">
         <a style="padding: 20px;font-size: 20px; top: -10; position: relative;" > Halo,
               <?php
               $res=mysql_query("SELECT * FROM user WHERE user_id=".$_SESSION['user']);
               $userRow=mysql_fetch_array($res);
               echo $userRow['username'];
               ?>
         </a>      
         <br>
         <br>
         <div class="logout">
            <a href="include/logout.php?logout">Logout</a> &nbsp;
            <a href="post-baru.php">Buat Post</a>
         </div>   
      </div>
   </header>
   <?php
}else {
   ?>
   <header class="header text-putih">
       <a href="index.php">
         <target="index.php">
         <img src="image/quewer.png"/>
      </a>
      <form class="login" method="post">
         <input type="text" name="user" placeholder="Username" required />
         <input type="password" name="pass" placeholder="Password" required />
         <button type="submit" name="login" class="btn">Login</button>
         <br>
         Belum punya akun? <a href="register.php">Daftar Disini!</a>
      </form>
   </header>
   <?php
}
?>
