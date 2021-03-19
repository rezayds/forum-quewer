<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "quewer";
$tbl_name="forum_question";
$tbl_name2="forum_answer";
mysql_connect("$host","$username","$password")or die("Koneksi ke database gagal");
mysql_select_db("$db")or die("Database tidak ada");
?>
