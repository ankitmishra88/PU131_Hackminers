<!doctype html>	
<html>	
<head>	
	<title>Global keys</title>	
</head>	
<body>	
	<!-- Adding new Gloabal Factor -->	
	<?php 	
		// establishing a connection with database using conn.inc.php file	
		require "conn.inc.php";	
			
	?>	
    <div>	
		<br />	
        <!-- Link to view all keys -->	
		<a href="view-global.php">View keys</a>	
		<br />	
	</div>	
	<?php 	
		// inserting new record in 'globaltable'	
		if(isset($_POST['submit'])){	
			// declaring different variables 	
			$mykey=mysqli_real_escape_string($conn,$_POST['mykey']);	
			$myvalue=mysqli_real_escape_string($conn,$_POST['myvalue']);	
			// query to add new global key win 'globaltable'	
			$sql = "INSERT INTO `globaltable`( `myKeys`, `myValues`) VALUES ('$mykey','$myvalue')";	
			// run the query 	
			mysqli_query($conn,$sql) or die(mysqli_error());	
			// echo "<script>window.location.reload(); exit();</script>";	
		}	
			
	?>	
		
	<!-- // form to get the data for global factor  -->	
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" >	
		<label for="mykey">Name Of Key</label>	
		<input type="text" name="mykey" id="mykey" placeholder="Name Of Global Key" required>	
		<label for="myvalue">Cost</label>	
		<input type="number" name="myvalue" id="myvalue" placeholder="Value of Key" step="0.0001" required>	
		
		<input type="submit" name="submit" value="Save"> 	
	</form>	
</body>
