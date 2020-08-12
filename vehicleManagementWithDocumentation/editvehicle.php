<!doctype html>
<html>
<head>

	<title>Edit Vehicle Detail</title>
</head>
<body>
	<!--File for updating the vehicle detail -->
	<?php 
	// inserting php file conn.inc for extablishing connection
	require "conn.inc.php";
		// $conn = mysqli_connect('localhost','root','123','abc');
	?>

	<?php 
		// get the id of vehicle to edit
		$id=$_GET['id'];
		// if update button clicked (updating the vehicle details)
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

			// sql query to update the record in table (vehicletable) where whose id specified in $id  variable 
			$sq = "UPDATE `vehicletable` SET `NameOfTruck`= '$name',`Capacity`='$capacity',`Distance`='$distance',`Mileage`='$mileage',`DriverCost`='$driverCost',`DocumentationCost`='$documents',`EMI`='$emi',`Tyre`='$tyre',`Maintenance`='$maintenance',`VehicleMode`= '$vehiclemode' WHERE `vehicletable`.`Identity` = $id";

			// run the query for updation if failed show the error message
			mysqli_query($conn,$sq) or die(mysqli_error());
			
			
			// refreshing the page 
			header("Refresh: 1000");
			// redirect to view-vehicle.php page 
			header("Location: dashboard/view-vehicle.php");
			// header("Location: viewvehicles.php");
		}	
		
	?>
	

	<?php 
		// query to get all detail of vehicle with id specified in $id variable 
		$que = mysqli_query($conn , "SELECT * FROM `vehicletable` WHERE `Identity`= $id ") or die(mysqli_error());
		// fetching the associative array 
		$q=mysqli_fetch_assoc($que);
		
	?>
	 <!-- displaying the form with the stored data of id = $id in database before updating -->
	<div style="margin-left: 8%; width:80%;">
	<form method="post" >
		<label for="name">Name Of Truck</label>
		<input class="form-control border-0 small" type="text" name="name" id="name" placeholder="Name Of Truck" value="<?php echo $q['NameOfTruck']; ?>" required>
		<label for="capacity">Capacity</label>
		<input class="form-control border-0 small" type="number" name="capacity" id="capacity"  placeholder="Capacity in tons"  value="<?php echo $q['Capacity']; ?>" step="0.001" required>
		<label for="distance">Distance</label>
		<input class="form-control border-0 small" type="number" name="distance" id="distance" placeholder="Distance in Km"  value="<?php echo $q['Distance'] ?>" step="0.001" required>
		<label for="mileage">Mileage</label>
		<input class="form-control border-0 small" type="number" name="mileage" id="mileage"  placeholder="Mileage (Km/L)"  value="<?php echo $q['Mileage'] ?>" step="0.001" required>
		<label for="driverCost">Driver Cost</label>
		<input class="form-control border-0 small" type="number" name="driverCost" id="driverCost"  placeholder="Driver Cost in Rupees (Cost/Km)" value="<?php echo $q['DriverCost'] ?>" required>
		<br />
		<label for="documents">Documents and Insurance Cost</label>
		<input class="form-control border-0 small" type="number" name="documents" id="documents"  placeholder="Documents and Insurance Cost (Cost/Km)" value="<?php echo $q['DocumentationCost'] ?>" step="0.001" required>
		<label for="emi">EMI</label>
		<input class="form-control border-0 small" type="number" name="emi" id="emi" placeholder="EMI in Rupees (Cost/Km)" value="<?php echo $q['EMI'] ?>" step="0.001" required>
		<label for="tyre">Tyre Maintenance cost</label>
		<input class="form-control border-0 small" type="number" name="tyre" id="tyre" placeholder="Tyres Maintenance cost (cost/km)" value="<?php echo $q['Tyre'] ?>" required>
		<label for="maintenance">Maintenance</label>
		<input class="form-control border-0 small"  type="number" name="maintenance" id="maintenance" placeholder="Cost of Maintenance (Cost/Km)" value="<?php echo $q['Maintenance'] ?>" step="0.001" required>
		<label for="vehiclemode">Select mode of vehicle</label>
		<select class="form-control border-0 small" name="vehiclemode" id="vehiclemode" ">
			<option value="LCV" <?php if ($q['VehicleMode'] == 'LCV'){ echo "".'selected'.""; } ?> >LCV</option>
			<option value="Truck" <?php if ($q['VehicleMode'] == 'Truck'){ echo "".'selected'.""; } ?> >Truck</option>
			<option value="Upto3Axle" <?php if ($q['VehicleMode'] == 'Upto 3 Axle'){ echo "".'selected'.""; } ?> >Upto 3 Axle Vehicle</option>
			<option value="4to6Axle" <?php if ($q['VehicleMode'] == '4 to 6 Axle'){ echo "".'selected'.""; } ?>>4 to 6 Axle Vehicle</option>
			<option value="7ormore" <?php if ($q['VehicleMode'] == '7 or more'){ echo "".'selected'.""; } ?>>7 or more Axle</option>
			<option value="HCM/EME" <?php if ($q['VehicleMode'] == 'HCM/EME'){ echo "".'selected'.""; } ?>>HCM/EME</option>
		</select>
		<br />
		<input class="d-none d-sm-inline-block btn btn btn-sm btn-primary shadow-sm" type="submit" name="update" value="UPDATE"> 

	</form>
    </div>
	<?php
		
	?>
</body>