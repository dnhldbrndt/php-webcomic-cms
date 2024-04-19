 <?php 
include('includes/config.php');
include('includes/functions.php');
include('includes/database.php');
secure();


include('includes/header.php');

 
 
if (isset($_POST['username']))		{
	
		if ($statement = $connect->prepare('INSERT INTO users (username, email, password, active) VALUES (?,?,?,?)')) {
		$hashed = SHA1($_POST['password']);
		$statement->bind_param('ssss',$_POST['username'], $_POST['email'], $hashed,$_POST['active']);
		$statement->execute();
		
 			set_message("You have successfully added the user:" . $_POST['username']);
			header('Location: users.php');
					$statement->close();
			die();
	} else {
		echo 'Could not prepare statement.';
	}
}
?>
<div style="margin:30px;">
<div><h4>Add User</h4></div>
	<br>
<div>
<form method="post">
	Username: <input type="text" id="username" name="username">
	Email: <input type="email" id="email" name="email">
	Password: <input type="password" id="password" name="password">
	<select name="active" id="active">
	<option value="1">Active</option>
		<option value="0">Inactive</option>
	</select> 
	<button type="submit"> Add User</button>
</form>
</div>
</div>
<?php
	 
		
 
include('includes/footer.php');
	
?>