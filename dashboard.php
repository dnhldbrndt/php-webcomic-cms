<?php 
include('includes/config.php');
include('includes/functions.php');
include('includes/database.php');
secure();


include('includes/header.php');
 

?>
<div class="content">
<div style="margin-bottom: 10px"><h4>Dashboard</h4></div>
<div>
<a href="users.php"> Users management</a> |
<a href="posts.php"> Posts management </a>
</div>
</div>
<?php
 

include('includes/footer.php');
	
?>