<!--File for deleting a global key -->
<?php 
	// establishing connection with database 
	require "conn.inc.php";
		
?>

<?php
	// getting id of key whose record is to delete from database
	$id = $_GET['id'];
	// sql query to delete record where id is equal to value of $id varible
	$sql = "DELETE FROM `globaltable` WHERE 'Identity'='$id'";
	// running sql query
	mysqli_query($conn,"DELETE FROM `globaltable` WHERE `globaltable`.`Identity` = $id") or die(mysqli_error());

	// redirecting to view-globals.php file 
	echo "<script>window.location.href='/dashboard/view-global.php';</script>";

?>
