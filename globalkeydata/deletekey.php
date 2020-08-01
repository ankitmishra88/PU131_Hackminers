	<?php 
	require "conn.inc.php";
		
	?>

<?php

	$id = $_GET['id'];

	$sql = "DELETE FROM `globaltable` WHERE 'Identity'='$id'";
	mysqli_query($conn,"DELETE FROM `globaltable` WHERE `globaltable`.`Identity` = $id") or die(mysqli_error());

	echo "<script>window.location.href='viewkey.php'; exit();</script>";
?>
