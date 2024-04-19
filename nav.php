<?php
include('includes/database.php');
if ($statement = $connect->prepare('SELECT * FROM posts')) {
	$statement->execute();
	$result = $statement->get_result();
		 
	if($result->num_rows > 0) {
 
		$resultArray = $result->fetch_all(MYSQLI_ASSOC);
	 
	}
}
?>

<div id="nav">
	<div>
		<a href="view.php?i=
			<?php 
			echo 0;
			?>
		">First</a> 
	</div>
    <div>
        <?php 
			if ( $previous >= 0) { 
				echo '<a href="view.php?i=' . $previous . '"> Previous </a>';
			} 
			else { 
				echo 'Previous';
			}
		?>
	</div>
	<div>
		<?php
			if ($next) {
				echo '<a href="view.php?i=' . $next . '">Next</a>'; 
            } 
			else {
				echo 'Next'; 
			}
		?>
    </div>
    <div>
		<a href="view.php">Latest</a>
 </div>
 </div>