<!doctype html>
<html>
<head>
	<title>Edit Key Detail</title>
</head>
<body>
	<!-- File to edit detail of global key -->
	<?php 
		// establish connection with database 
		require "conn.inc.php";
		
	?>
	<?php 
		// get id of global factor whose data to be change 
		$id=$_GET['id'];
		//  updating the reocord of global factors key
		if(isset($_POST['update'])){
			// declaring and initializing the variables
			$mykey=mysqli_real_escape_string($conn,$_POST['mykey']);
			$myvalue=mysqli_real_escape_string($conn,$_POST['myvalue']);
			
			// query for updae record in 'globaltable ' table in database where identity of record is equal to the value of id variable
			$sq = "UPDATE `globaltable` SET `myKeys`='$mykey',`myValues`='$myvalue' WHERE `globaltable`.`Identity` = $id";
			// running sql command
			mysqli_query($conn,$sq) or die(mysqli_error());
			
			// redirecting to view-global.php file to view all keys
			echo "<script>window.location.href='view-global.php';</script>";

		}	
		
	?>
	

	<?php 
		// query to get record from 'globaltable' where identity  is equal to the value of id variable
		$que = mysqli_query($conn , "SELECT * FROM `globaltable` WHERE `Identity`= $id ") or die(mysqli_error());
		// fetching the associative array 
		$q=mysqli_fetch_assoc($que);
		
	?>
	<!-- form for updating value where input filds are initialized with the record present in database -->
	<form method="post" >
		<label for="mykey">Name Of Key</label>
		<input type="text" name="mykey" id="mykey" placeholder="Name Of Global Key" value = "<?php echo $q['myKeys'] ?>" required>

		<label for="myvalue">Cost</label>

		<input type="number" name="myvalue" id="myvalue" placeholder="Value of Key" step="0.0001" value ="<?php echo $q['myValues'] ?>" required>
		
		<br />
		<input type="submit" name="update" value="UPDATE"> 

	</form>
	<?php
		
	?>
</body>