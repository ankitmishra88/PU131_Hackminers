<?php 
	$id = $_GET['id'];
	$conn = mysqli_connect('localhost','root','123','abc');

	$res = mysqli_query($conn,"SELECT `Confirm`,`CityId` FROM `report` WHERE Identity = $id") or die(mysqli_error());
	$result = mysqli_fetch_assoc($res);

	if ($result['Confirm'] == 'No'){
		mysqli_query($conn,"UPDATE `report` SET `Confirm`='Yes' WHERE Identity = $id")or die(mysqli_error());
	}
	else{
		mysqli_query($conn,"UPDATE `report` SET `Confirm`='No' WHERE Identity = $id")or die(mysqli_error());
	}
	$cityID = $result['CityId'];
	header("Location: viewfromadmin.php?cityid=$cityID");
?>