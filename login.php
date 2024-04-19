<?php 
include('includes/config.php');
include('includes/functions.php');
include('includes/database.php');

include('includes/header.php');

	if(isset($_SESSION['id'])){
		header('Location: dashboard.php');
		die();
	}

 
if (isset($_POST['email'])){
	if ($statement = $connect->prepare('SELECT * FROM users WHERE email = ? AND password = ? AND active = 1')) {
		$hashed = SHA1($_POST['password']);
		$statement->bind_param('ss', $_POST['email'], $hashed);
		$statement->execute();
		
		$result = $statement->get_result();
		$user = $result->fetch_assoc();
		
		if($user) {
			$_SESSION['id'] = $user['id'];
			$_SESSION['email'] = $user['email'];
			$_SESSION['username'] = $user['username'];
			
			set_message("You have successfully logged in: " . $_SESSION['username']);
			header('Location: dashboard.php');
			die();
		}
		$statement->close();
	} else {
		echo 'Could not prepare statement.';
	}
}


?>
<div id="login">
<form method="POST">
Email: <input type="email" name="email" id="email">
Password: <input type="password" name="password" id="password">
<button type="submit"> Sign In</button>
</form>
 
</div>

<?php
 

include('includes/footer.php');
	
?>