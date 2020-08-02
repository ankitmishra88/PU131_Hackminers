<!doctype html>
<html>
<head>
	<title>Edit Key Detail</title>
</head>
	<?php 
	require "conn.inc.php";
		
	?>
	<?php 
		$id=$_GET['id'];

		if(isset($_POST['update'])){
			$mykey=mysqli_real_escape_string($conn,$_POST['mykey']);
			$myvalue=mysqli_real_escape_string($conn,$_POST['myvalue']);
			

			$sq = "UPDATE `globaltable` SET `myKeys`='$mykey',`myValues`='$myvalue' WHERE `globaltable`.`Identity` = $id";

			mysqli_query($conn,$sq) or die(mysqli_error());
			
			echo "<script>window.location.href='view-global.php';exit();</script>";
		}	
		
	?>
	

	<?php 
		$que = mysqli_query($conn , "SELECT * FROM `globaltable` WHERE `Identity`= $id ") or die(mysqli_error());
		$q=mysqli_fetch_assoc($que);
		
	?>
	
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
