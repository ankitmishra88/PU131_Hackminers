<!doctype html>
<html>
<head>
	<title>Vehicle Detail</title>
</head>
<body>
	<!-- File for entering new vehicle details in database -->
	<?php 
	// establish the connection with database by including php file (conn.inc.php)
	require "conn.inc.php";
		// $conn = mysqli_connect('localhost','root','123','abc');
	?>

	<?php 
		// inserting data in database when the submit button is clicked
		if(isset($_POST['submit'])){
			// declare and initilize different variables 
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

			// sql query to insert form data to table (vehicletable) in database 
			$sql = "INSERT INTO `vehicletable`( `NameOfTruck`, `Capacity`, `Distance`, `Mileage`, `DriverCost`, `DocumentationCost`, `EMI`, `Tyre`, `Maintenance`, `VehicleMode` ) VALUES ('$name' , '$capacity' , '$distance' , '$mileage', '$driverCost' , '$documents' , '$emi', '$tyre' , '$maintenance','$vehiclemode' )";
			// run the query and check for the error
			mysqli_query($conn,$sql) or die(mysqli_error());
			// Refresh Page without resubmit data
			header("Refresh: 0");
			// Redirect to the page to viewvehicles page to show all vehicles
			header("Location: view-vehicle.php");
			// header("Location: viewvehicles.php");
		}
		mysqli_close($conn);

	?>
	<!-- Creating form for getting the vehicle details -->
    <div style="margin-left: 8%; width:80%;">
	<form method="post" action="" >
		<label for="name">Name Of Truck</label>
		<input class="form-control border-0 small"  type="text" name="name" id="name" placeholder="Name Of Truck" required>
		<label for="capacity">Capacity</label>
		<input class="form-control border-0 small" type="number" name="capacity" id="capacity" placeholder="Capacity in tons" step="0.001" required>
		<label for="distance">Distance</label>
		<input class="form-control border-0 small" type="number" name="distance" id="distance" placeholder="Distance in Km" step="0.001" required>
		<label for="mileage">Mileage</label>
		<input class="form-control border-0 small" type="number" name="mileage" id="mileage" placeholder="Mileage (Km/L)" step="0.001" required>
		<label for="driverCost">Driver Cost</label>
		<input class="form-control border-0 small" type="number" name="driverCost" id="driverCost" placeholder="Driver Cost in Rupees (Cost/Km)" required>
		<br /> 
		<label for="documents">Documents and Insurance Cost</label>
		<input class="form-control border-0 small" type="number" name="documents" id="documents" placeholder="Documents and Insurance Cost (Cost/Km)" step="0.001" required>
		<label for="emi">EMI</label>
		<input class="form-control border-0 small" type="number" name="emi" id="emi" placeholder="EMI in Rupees (Cost/Km)" step="0.001" required>
		<label for="tyre">Tyres Maintenance Cost</label>
		<input class="form-control border-0 small" type="number" name="tyre" id="tyre" placeholder="Tyres cost(cost/km)" required>
		<label for="maintenance">Maintenance</label>
		<input class="form-control border-0 small" type="number" name="maintenance" id="maintenance" placeholder="Cost of Maintenance (Cost/Km)" step="0.001" required>
		<label for="vehiclemode">Select mode of vehicle</label>
		<select class="form-control border-0 large" name="vehiclemode" id="vehiclemode">
			<option value="LCV">LCV</option>
			<option value="Truck">Truck</option>
			<option value="Upto 3 Axle">Upto 3 Axle Vehicle</option>
			<option value="4 to 6Axle">4 to 6 Axle Vehicle</option>
			<option value="7 or more">7 or more Axle</option>
			<option value="HCM/EME">HCM/EME</option>
		</select>
		<br />
		<input class="d-none d-sm-inline-block btn btn btn-sm btn-primary shadow-sm" type="submit" name="submit" value="Save"> 
	</form>
    </div>
</body>