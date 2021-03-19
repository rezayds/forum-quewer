<?php
include 'inc/header.php';

if(isset($_GET['delete_id']))
{
	$sql_query="DELETE FROM forum_question WHERE id=".$_GET['delete_id'];
	mysql_query($sql_query);
	header("Location: $_SERVER[PHP_SELF]");
}

if(isset($_POST['login'])){
   $user = mysql_real_escape_string($_POST['user']);
   $upass = mysql_real_escape_string($_POST['pass']);
   $res=mysql_query("SELECT * FROM admin WHERE username='$user'");
   $row=mysql_fetch_array($res);

   if($row['password']== $upass && $row['username']== $user){
      $_SESSION['admin'] = $row['user_id'];
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

if (isset($_SESSION['admin'])!="") {
    ?>
    <script type="text/javascript">
        function edit_id(id){
            if(confirm('Anda ingin merubah topik ini?')){
                window.location.href='edit.php?edit_id='+id;
            }
        }
        function delete_id(id){
            if(confirm('Anda ingin menhapus topik ini?')){
                window.location.href='index.php?delete_id='+id;
            }
        }
    </script>
    <table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
		<tr>
			<th>No.</th>
			<th>Topic</th>
			<th>Detail</th>
			<th colspan="2">Operations</th>
    	</tr>
        <?php
        $sql_query="SELECT * FROM forum_question";
        $result_set=mysql_query($sql_query);
		$no=1;
        if(mysql_num_rows($result_set)>0){
        	while($row=mysql_fetch_row($result_set)){
                ?>
        		<tr>
					<td bgcolor="#E6E6E6" width="4%" align="center"><?php echo $no; ?></td>
		            <td bgcolor="#E6E6E6" width="25%"><?php echo $row[1]; ?></td>
		            <td bgcolor="#E6E6E6"><?php echo $row[2]; ?></td>
            		<td bgcolor="#E6E6E6" width="5%" align="center">
						<a href="javascript:edit_id('<?php echo $row[0]; ?>')">
							<img src="img/b_edit.png" align="EDIT" />
						</a>
					</td>
            		<td bgcolor="#E6E6E6"  width="5%" align="center">
						<a href="javascript:delete_id('<?php echo $row[0]; ?>')">
							<img src="img/b_drop.png" align="DELETE" />
						</a>
					</td>
            	</tr>
                <?php
				$no++;
	        }
        }else{
		?>
		<tr>
			<td colspan="5">No Data Found !</td>
		</tr>
        <?php
    }
    ?>
    </table>
    <?php
}else{
    ?>
    <div class="loginadmin">
        <form action="" method="post">
            <table>
                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="user" placeholder="Username" required />
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>:</td>
                    <td>
                        <input type="password" name="pass" placeholder="Password" required />
                    </td>
                </tr>
                <tr>
                    <td class="center" colspan="3">
                        <button type="submit" name="login" class="btn">Login</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <?php
}
?>
