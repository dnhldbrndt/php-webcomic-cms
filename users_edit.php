 <?php 
include('includes/config.php');
include('includes/functions.php');
include('includes/database.php');
secure();


include('includes/header.php');

 
 
if (isset($_POST['username']))	{
	
		if ($statement = $connect->prepare('UPDATE users SET username = ?, email = ? , active = ?  WHERE id = ?')) {
			$hashed = SHA1($_POST['password']);
			$statement->bind_param('sssi',$_POST['username'], $_POST['email'], $_POST['active'], $_GET['id']);
			$statement->execute();
			$statement->close();
			
		if (isset($_POST['password'])){
			if ($statement = $connect->prepare('UPDATE users SET password = ? WHERE id = ?')) {
			$hashed = SHA1($_POST['password']);
			$statement->bind_param('si',$hashed, $_GET['id']);
			$statement->execute(); 	 
			$statement->close();
		}  else {
			echo 'Could not prepare password update statement.';
		}	
	}	
	set_message("You have successfully edited the user:" . $_GET['id']);
	header('Location: users.php');
	die();	
			
			
	} else {
		echo 'Could not prepare user update statement.';
	}
}
	
		 
if (isset($_GET['id'])) {
	if ($statement = $connect->prepare('SELECT * FROM users WHERE id = ?')) {
 
		$statement->bind_param('i', $_GET['id']);
		$statement->execute();
		
		$result = $statement->get_result();
		$user = $result->fetch_assoc();
		
		if($user) {

?>
<div style="margin:30px;">
<div><h4>Edit User</h4></div>
<div>
<form method="post">
	Username: <input type="text" id="username" name="username" value="<?php echo $user['username']?>">
	Email: <input type="email" id="email" name="email" value="<?php echo $user['email']?>">
	Password: <input type="password" id="password" name="password" value="">
	<select name="active" id="active">
	<option <?php echo ($user['active']) ? "selected" : ""; ?> value="1">Active</option>
		<option <?php echo ($user['active']) ? "" : "selected"; ?> value="0">Inactive</option>
	</select>
	<button type="submit"> Edit user</button>
</form>
</div>
</div>
<?php
	 	}
		$statement->close();	

	} else {
		echo 'Could not prepare statement.';
	}
}	 else {
	echo "No user selected";
	die();
}
		
 
include('includes/footer.php');
	
?>