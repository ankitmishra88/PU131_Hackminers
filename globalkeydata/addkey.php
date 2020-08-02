<!doctype html>
<html>
<head>
	<title>Global keys</title>
</head>
<body>
	<?php 
	require "conn.inc.php";
		
	?>
    <div>
		<br />
        
		<a href="view-global.php">View keys</a>
		<br />
	</div>
	<?php 
		if(isset($_POST['submit'])){
			$mykey=mysqli_real_escape_string($conn,$_POST['mykey']);
			$myvalue=mysqli_real_escape_string($conn,$_POST['myvalue']);
			
			$sql = "INSERT INTO `globaltable`( `myKeys`, `myValues`) VALUES ('$mykey','$myvalue')";
			mysqli_query($conn,$sql) or die(mysqli_error());

			// echo "<script>window.location.reload(); exit();</script>";
		}
		

	?>
	

	

	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" >
		<label for="mykey">Name Of Key</label>
		<input type="text" name="mykey" id="mykey" placeholder="Name Of Global Key" required>
		<label for="myvalue">Cost</label>
		<input type="number" name="myvalue" id="myvalue" placeholder="Value of Key" step="0.0001" required>
	
		<input type="submit" name="submit" value="Save"> 
	</form>
</body>