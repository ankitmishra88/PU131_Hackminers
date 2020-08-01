<!doctype html>
<html>
<head>
	<title>Edit Vehicle Detail</title>
</head>
<body>
	<?php 
	require "conn.inc.php";
		// $conn = mysqli_connect('localhost','root','123','abc');
	?>

	<?php 
		$id=$_GET['id'];

		if(isset($_POST['update'])){
			$name=mysqli_real_escape_string($conn,$_POST['name']);
			$capacity=mysqli_real_escape_string($conn,$_POST['capacity']);
			$distance=mysqli_real_escape_string($conn,$_POST['distance']);
			$mileage=mysqli_real_escape_string($conn,$_POST['mileage']);
			$driverCost=mysqli_real_escape_string($conn,$_POST['driverCost']);
			$documents=mysqli_real_escape_string($conn,$_POST['documents']);
			$emi=mysqli_real_escape_string($conn,$_POST['emi']);
			$tyre=mysqli_real_escape_string($conn,$_POST['tyre']);
			$maintenance=mysqli_real_escape_string($conn,$_POST['maintenance']);
			$vehiclemode=mysqli_real_escape_string($conn,$_POST['vehiclemode']);
			$sq = "UPDATE `vehicletable` SET `NameOfTruck`= '$name',`Capacity`='$capacity',`Distance`='$distance',`Mileage`='$mileage',`DriverCost`='$driverCost',`DocumentationCost`='$documents',`EMI`='$emi',`Tyre`='$tyre',`Maintenance`='$maintenance',`VehicleMode`= '$vehiclemode' WHERE `vehicletable`.`Identity` = $id";

			mysqli_query($conn,$sq) or die(mysqli_error());
			
			

			header("Refresh: 1000");
			header("Location: dashboard/view-vehicle.php");
			// header("Location: viewvehicles.php");
		}	
		
	?>
	

	<?php 
		$que = mysqli_query($conn , "SELECT * FROM `vehicletable` WHERE `Identity`= $id ") or die(mysqli_error());
		$q=mysqli_fetch_assoc($que);
		
	?>
	
	<form method="post" >
		<label for="name">Name Of Truck</label>
		<input type="text" name="name" id="name" value="<?php echo $q['NameOfTruck']; ?>" required>
		<label for="capacity">Capacity</label>
		<input type="number" name="capacity" id="capacity" value="<?php echo $q['Capacity']; ?>" step="0.01" required>
		<label for="distance">Distance</label>
		<input type="number" name="distance" id="distance" value="<?php echo $q['Distance'] ?>" step="0.1" required>
		<label for="mileage">Mileage</label>
		<input type="number" name="mileage" id="mileage" value="<?php echo $q['Mileage'] ?>" step="0.01" required>
		<label for="driverCost">Driver Cost</label>
		<input type="number" name="driverCost" id="driverCost" value="<?php echo $q['DriverCost'] ?>" required>
		<br />
		<label for="documents">Documents and Insurance Cost</label>
		<input type="number" name="documents" id="documents" value="<?php echo $q['DocumentationCost'] ?>" step="0.01" required>
		<label for="emi">EMI</label>
		<input type="number" name="emi" id="emi" value="<?php echo $q['EMI'] ?>" step="0.01" required>
		<label for="tyre">Tyre</label>
		<input type="number" name="tyre" id="tyre" value="<?php echo $q['Tyre'] ?>" required>
		<label for="maintenance">Maintenance</label>
		<input type="number" name="maintenance" id="maintenance" value="<?php echo $q['Maintenance'] ?>" step="0.01" required>
		<label for="vehiclemode">Select mode of vehicle</label>
		<select name="vehiclemode" id="vehiclemode" ">
			<option value="LCV" <?php if ($q['VehicleMode'] == 'LCV'){ echo "".'selected'.""; } ?> >LCV</option>
			<option value="Truck" <?php if ($q['VehicleMode'] == 'Truck'){ echo "".'selected'.""; } ?> >Truck</option>
			<option value="Upto3Axle" <?php if ($q['VehicleMode'] == 'Upto3Axle'){ echo "".'selected'.""; } ?> >Upto 3 Axle Vehicle</option>
			<option value="4to6Axle" <?php if ($q['VehicleMode'] == '4to6Axle'){ echo "".'selected'.""; } ?>>4 to 6 Axle Vehicle</option>
			<option value="7ormore" <?php if ($q['VehicleMode'] == '7ormore'){ echo "".'selected'.""; } ?>>7 or more Axle</option>
			<option value="HCM/EME" <?php if ($q['VehicleMode'] == 'HCM/EME'){ echo "".'selected'.""; } ?>>HCM/EME</option>
		</select>
		<br />
		<input type="submit" name="update" value="UPDATE"> 

	</form>
	<?php
		
	?>
</body>