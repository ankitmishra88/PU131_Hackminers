<!-- File for deleting record in database table  -->
<?php 
	// initilize the connection
	require "conn.inc.php";		
?>

<?php
	// getting id whose data to be deleted in database
	$id = $_GET['id'];
	// sql query for deleting the record where id = $id 
	$sql = "DELETE FROM `vehicletable` WHERE 'Identity'='$id'";
	// run the query and check for the error 
	// mysqli_query($conn,"DELETE FROM `vehicletable` WHERE `vehicletable`.`Identity` = $id") or die(mysqli_error());
	mysqli_query($conn,$sql) or die(mysqli_error());
	// refreshing the page
	header("Refresh: 0");
	// redirecting to view-vehicle webpage to view all vehicles 
	header("Location:/dashboard/view-vehicle.php");
?>
