 <?php 

$connect = mysqli_connect('localhost', 'cms', 'swordfish', 'cms');

if (mysqli_connect_errno()) {
	
	exit('Failed to connect.' . mysqli_connect_error());
}
?>