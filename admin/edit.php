<?php
include 'inc/header.php';
include 'edit_proses.php';
?>

<form method="post">
	<table align="center">>
		<tr>
			<td>
		        <input type="text" name="topic" placeholder="Last Name" value="<?php echo $fetched_row['topic']; ?>" required />
			</td>
    	</tr>
    	<tr>
            <td><textarea name="detail" rows="8" cols="40" required=""><?php echo $fetched_row['detail']; ?></textarea></td>
    	</tr>
    	<tr>
    		<td>
				<button type="submit" name="btn-update"><strong>UPDATE</strong></button>
				<button type="submit" name="btn-cancel"><strong>Cancel</strong></button>
    		</td>
    	</tr>
    </table>
</form>
