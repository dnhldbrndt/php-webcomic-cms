<?php 
include('includes/config.php');
include('includes/functions.php');
include('includes/database.php');
secure();


include('includes/header.php');

if (isset($_GET['delete'])) {
	if ($statement = $connect->prepare('DELETE FROM posts WHERE id = ?')) {
 
		$statement->bind_param('i',$_GET['delete']);
		$statement->execute();
		
 		set_message("Post has been successfully deleted:" . $_GET['delete']);
		header('Location: posts.php');
		$statement->close();
		die();

	} else {
		echo 'Could not prepare statement.';
	}
}

if ($statement = $connect->prepare('SELECT * FROM posts')) {
	$statement->execute();
	$result = $statement->get_result();
		 
	if($result->num_rows > 0) {
 
		$resultArray = $result->fetch_all(MYSQLI_ASSOC);
	 
 
?>
<div class="content">
<div style="margin-bottom: 10px"><h4>Posts Management</h4></div>
<div id="posts-table">
<table>

<tr>
 <th> ID</th>
 <th> Title</th>
 <th> Content</th>
 <th> Image </th>
 <th> EDIT | DELETE </th>	
</tr>
 
	<?php foreach($resultArray as $record) {   ?>
	<tr>
		<td> <?php echo $record['id']; ?></td>
		<td> <?php echo $record['title']; ?></td>
		<td> <?php echo $record['content']; ?></td>
		<td> <img src="<?php echo $record['imgsrc']; ?>" alt="<?php echo $record['imgsrc']; ?>" style="height:25%; width:25%" ></td>
		<td> <a href="posts_edit.php?id=<?php echo $record['id']; ?>">Edit</a>
			<a href="posts.php?delete=<?php echo $record['id']; ?>">Delete</a>
		</td>
	</tr>	

	<?php }?>
		
 
</table>
</div>
	<div class="">
		<a href="posts_add.php"> Add New Post</a>
	</div>
</div>
<?php
		} else {echo 'No posts found'; }
		
		$statement->close();
	} else {
		echo 'Could not prepare statement.';
}
	include('includes/footer.php');
	
?>