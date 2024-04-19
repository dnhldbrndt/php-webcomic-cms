<?php
include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');
include('includes/header.php');
if ($statement = $connect->prepare('SELECT * FROM posts')) {
	$statement->execute();
	$result = $statement->get_result();
		 
	if($result->num_rows > 0) {
 
		$resultArray = $result->fetch_all(MYSQLI_ASSOC);
	 
	}
}
$last = count($resultArray) - 1;
$first = 0;
if (isset($_GET['i']) && $_GET['i'] < count($resultArray) - 1) {
	$previous = $_GET['i'] - 1;
	$next = $_GET['i'] + 1;
	$i = $_GET['i'];
} else {
	$previous = $last - 1;
	$next = NULL;
	$i = $last;
}

?>
<div class="content">
<div id="view-page">
<div> </div>
<div id="date">Date: <?php echo $resultArray[$i]['date'];?></div>
<div id="image-block">
	 
<?php
	echo '<img src="' . $resultArray[$i]['imgsrc'] . '" alt="'. $resultArray[$i]['title'] .'" height="50%" width="50%" style="align:center;">';
?> 
	</div>
 <div id="nav">
<?php
 	include('nav.php');
?>	
</div>
<div class="news">
	<hr style="width: 350px; border-color: #EEBAF9" />
		Post: <br/>
	<?php echo  $resultArray[$i]['content']; ?>
</div>
</div></div>
<?php	
	include('includes/footer.php');
?>