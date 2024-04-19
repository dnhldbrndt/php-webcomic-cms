 <?php 
include('includes/config.php');
include('includes/functions.php');
include('includes/database.php');
secure();

include('includes/header.php');

?>
<div>
<div id="posts-add">
<div><h4>Add Post</h4></div>
<div>
<form action="upload.php" method="post" enctype="multipart/form-data">
	<div class="form-content"><div class="form-title">  Title: </div><input type="text" id="title" name="title"></div>
	<div class="form-content"><div class="form-title"> Content: </div><textarea id="content" name="content"></textarea></div>
	<div class="form-content"><div class="form-title"> Date: </div><input type="date" id="date" name="date"></div>
	<div class="form-content">Select Image to Upload:   
	<input type="file" name="fileToUpload" id="fileToUpload"></div>
	<div><button type="submit"> Add Post</button></div>
</form>
	
 
</div>
</div>
</div>
<?php
	 
include('includes/footer.php');
	
?>