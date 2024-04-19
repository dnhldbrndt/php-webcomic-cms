<?php
include('includes/database.php');
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
if (isset($_GET['i'])) {
	$previous = $_GET['i'] - 1;
	$next = $_GET['i'] + 1;
	$i = $_GET['i'];
} else {
	$previous = $last - 1;
	$next = NULL;
	$i = $last;
}

?>
 
<div  class="content">

 
<div id="catalog">
	 
<?php
 for ($i = 0; $i < count($resultArray); $i++) {
	echo '<a href="view.php?i=' . $i  . '"><img src="' . $resultArray[$i]['imgsrc'] . '" alt="'. $resultArray[$i]['title'] .'" height="150px" width="150px"></a>';
 }
?> 
</div>	
</div>		
<?php	
	include('includes/footer.php');
?>