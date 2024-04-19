<?php 
include('includes/config.php');
include('includes/functions.php');
include('includes/database.php');
secure();


include('includes/header.php');

if (isset($_GET['delete'])) {
	if ($statement = $connect->prepare('DELETE FROM users WHERE id = ?')) {
 
		$statement->bind_param('i',$_GET['delete']);
		$statement->execute();
		
 			set_message("User has been successfully deleted:" . $_GET['delete']);
			header('Location: users.php');
					$statement->close();
			die();
		
 

	} else {
		echo 'Could not prepare statement.';
	}
}


if ($statement = $connect->prepare('SELECT * FROM users')) {
		$statement->execute();
		
		$result = $statement->get_result();
 
		
	
		 
		if($result->num_rows > 0) {
 




?>
<div class="content">
<div style="margin-bottom: 10px"><h4>Users Management</h4></div>
<div>
<table style="margin-left: auto; margin-right: auto; width: 50%">

<tr>
 <th> ID</th>
 <th> Username</th>
 <th> Email</th>	
 <th> Status</th>
 <th> EDIT | DELETE </th>	
</tr>
 
	<?php while($record = mysqli_fetch_assoc($result)) { ?>
	<tr>
		<td> <?php echo $record['id']; ?></td>
		<td> <?php echo $record['username']; ?></td>
		<td> <?php echo $record['email']; ?></td>
		<td> <?php echo $record['active']; ?></td>
		<td> <a href="users_edit.php?id=<?php echo $record['id']; ?>">Edit</a>
			<a href="users.php?delete=<?php echo $record['id']; ?>">Delete</a>
		</td>
	</tr>	
	<?php }?>
			
 
</table>
</div>
<a href="users_add.php" style="text-align: left;">Add new user</a>
</div>
<?php
		} else {echo 'No users found'; }
		
		$statement->close();
	} else {
		echo 'Could not prepare statement.';
}
	include('includes/footer.php');
	
?>