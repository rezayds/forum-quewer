<html>
   <head>
      <title>Forum QueWer</title>
      <link rel="stylesheet" type="text/css" href="inc/style.css">
   </head>
   <body>

<?php
session_start();
include_once 'inc/koneksi.php';

if(isset($_SESSION['admin'])!=""){
    $res=mysql_query("SELECT * FROM admin WHERE user_id=".$_SESSION['admin']);
    $userRow=mysql_fetch_array($res);
    ?>
   <header class="biru">
      <div class="navadmin">
          <h3>Welcome to Admin Panel, <?php echo $userRow['username']; ?></h3>
          <a href="inc/logout.php?logout" class="adminout">Logout</a>
      </div>
   </header>
   <?php
}else{
   ?>
   <header class="biru">
       <div class="navadmin">
           <h2>Admin Panel</h2>
       </div>
   </header>
   <?php
}
?>
