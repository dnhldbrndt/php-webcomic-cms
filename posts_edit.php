 <?php 
include('includes/config.php');
include('includes/functions.php');
include('includes/database.php');
secure();


include('includes/header.php');

 
 
if (isset($_POST['title']))	{
	
		if ($statement = $connect->prepare('UPDATE posts SET title = ?, content = ? , date = ?  WHERE id = ?')) {
			$hashed = SHA1($_POST['password']);
			$statement->bind_param('sssi',$_POST['title'], $_POST['content'], $_POST['date'], $_GET['id']);
			$statement->execute();
			$statement->close();
			
 
	set_message("You have successfully edited the post:" . $_GET['id']);
	header('Location: posts.php');
	die();	
			
			
	} else {
		echo 'Could not prepare update statement.';
	}
}
	
		 
if (isset($_GET['id'])) {
	if ($statement = $connect->prepare('SELECT * FROM posts WHERE id = ?')) {
 
		$statement->bind_param('i', $_GET['id']);
		$statement->execute();
		
		$result = $statement->get_result();
		$post = $result->fetch_assoc();
		
		if($post) {

?>
<div class="content">
<div><h4>Edit Post:</h4></div>
	<div>
	<?php
		echo '<img src="' . $post['imgsrc'] . '" alt="'. $post['title'] .'" height="50%" width="50%" style="align:center;">';
	?> 
	</div>
<div id="posts-edit">
<form method="POST" >
	<div class="form-content"><div class="form-title">Title: </div> <input type="text" id="title" name="title" value="<?php echo $post['title']?>"></div>
	<div class="form-content"><div class="form-title">Content: </div><textarea id="content" name="content" value="<?php echo $post['content']?>"></textarea></div>
	<div class="form-content"><div class="form-title">Date: </div><input type="date" id="date" name="date" value="<?php echo $post['date']?>"></div>
	<div><button type="submit"> Edit Post</button></div>
</form>
</div>
	<div>
		<br>
		<a href="posts.php" style="padding: 5px; text-decoration: none;">Back</a></div>
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