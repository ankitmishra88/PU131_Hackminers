<!DOCTYPE html>
<html>
<head>
	<title>Vehicle detail</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
	<?php 
		require 'conn.inc.php';
        $id=$_GET['id'];
	?>

	<div class="container mt-5">
		<div class="row">
			<a href="viewvehicles.php" class="btn btn-info">Back</a>
		</div>
	</div>

	<div class="container mt-4">
		<div class="vehicleDetail">
			<?php
				// $sql = "SELECT * FROM 'vehicletable' WHERE 'Identity' = $id" ;
				$qu = mysqli_query($conn,"SELECT * FROM `vehicletable` WHERE `vehicletable`.`Identity` = $id" ) or die(mysqli_error());
				$result =  mysqli_fetch_assoc($qu);

				echo "<div class='row my-2'><div class='col-4'><b>Name Of Vehicle</b></div><div class='col-6'>".$result['NameOfTruck']."</div></div>";
				echo "<div class='row' my-2><div class='col-4'><b>Capacity of Vehicle</b></div><div class='col-6'>".$result['Capacity']." Tons</div></div>";
				echo "<div class='row' my-2><div class='col-4'><b>Distance</b></div><div class='col-6'>".$result['Distance']." Km "."</div></div>";
				echo "<div class='row' my-2><div class='col-4'><b>Mileage of Vehicle</b></div><div class='col-6'>".$result['Mileage']." Km/l </div></div>";
				echo "<div class='row' my-2><div class='col-4'><b>Driver Cost</b></div><div class='col-6'>".$result['DriverCost']." Rupee</div></div>";
				echo "<div class='row' my-2><div class='col-4'><b>Documentation Cost of Vehicle</b></div><div class='col-6'>".$result['DocumentationCost']." Rupee</div></div>";
				echo "<div class='row' my-2><div class='col-4'><b>EMI of Vehicle</b></div><div class='col-6'>".$result['EMI']." Rupee</div></div>";
				echo "<div class='row' my-2><div class='col-4'><b>Number of Tyres of Vehicle</b></div><div class='col-6'>".$result['Tyre']."</div></div>";
				echo "<div class='row' my-2><div class='col-4'><b>Maintenance Cost of Vehicle</b></div><div class='col-6'>".$result['Maintenance']." Rupee</div></div>";
				echo "<div class='row' my-2><div class='col-4'><b>Mode of Vehicle</b></div><div class='col-6'>".$result['VehicleMode']." Rupee</div></div>";


			?>

		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>