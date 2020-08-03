
	<?php 
	require "conn.inc.php";
		
	?>

<?php

	$id = $_GET['id'];

	$sql = "DELETE FROM `vehicletable` WHERE 'Identity'='$id'";
	mysqli_query($conn,"DELETE FROM `vehicletable` WHERE `vehicletable`.`Identity` = $id") or die(mysqli_error());
	mysqli_query($conn,$sql) or die(mysqli_error());
	
	header("Refresh: 0");
	header("Location:/dashboard/view-vehicle.php");
?>
