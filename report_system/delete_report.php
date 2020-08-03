<?php
	$conn = mysqli_connect('localhost' , 'root', '123', 'abc');
	$id = $_GET['id'];

	mysqli_query($conn,"DELETE FROM `reports` WHERE `reports`.`Identity` = $id") or die(mysqli_error());
	
	
	header("Refresh: 0");
	header("Location: view_reports.php");
?>
