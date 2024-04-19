 <?php

function secure() {
	if(!isset($_SESSION['id'])){
		set_message('Not Logged in.');
		header('Location: /cms');
		die();
	}
}

function set_message($message) {
	{
		$_SESSION['message'] = $message;
	}
}

function get_message() {
	if (isset($_SESSION['message'])){
		echo '<p>' . $_SESSION['message'] . '</p> <hr>' ;
		unset($_SESSION['message']);
	}
}

?>