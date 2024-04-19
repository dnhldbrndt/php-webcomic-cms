<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatabile" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/styles.css">

	<title> CMS </title>
	
</head>
<body>
	
<div id="top">
	<div id="top-center"> 
	<div id="top-title">A Webcomic </div>
	<div><img src="images/logo.png" alt="logo" height="25px" width="25px"></div>
	</div> 
	<div id="top-nav">
		<a href="/cms/"> Home </a> |
		<a href="catalog.php"> Catalog </a> |
			<?php 
			 $nav = (!isset($_SESSION['id'])) ? '<a href="login.php"> Login </a>' :  '<a href="logout.php"> Logout </a>' ;
			echo $nav;
			?> |
		<a href="dashboard.php"> Dashboard </a>
	</div>	
</div>
<?php
	get_message();	
?>
	
