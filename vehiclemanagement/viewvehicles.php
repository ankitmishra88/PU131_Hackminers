<!DOCTYPE html>
<html>
<head>
	<title>All Vehicles</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>


	<?php 
	require "conn.inc.php";
		
	?>

	<div class="container mt-5">
		<div class="row">
			<a style="margin-left:2%;" href="add-vehicle.php" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add Vehicle</a>
            <!--<a href="vehicledata.php" class="btn btn-primary">Add Vehicle</a>-->
		</div>
	</div>

	<div class="container mt-4">
		<div class="allVehicles">

			<?php 
				$sql = "SELECT * FROM `vehicletable` ORDER BY 'NameOfTruck' DESC";
				$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
				while($result = mysqli_fetch_assoc($query)){
					?>
					<div class="row ">
						<div class="col-3"><?php echo '<b>'.$result['NameOfTruck'].'</b>'; ?></div>
						<div class="col-3"><?php echo '<b>'.$result['Capacity'].'</b>'; ?></div> 
						<div class="col-2">
							<a href="edit-vehicle.php?id=<?php echo $result['Identity'];?>"><i class="far fa-edit"></i></a>
                           <!-- <a href="editvehicle.php?id=<?php echo $result['Identity'];?>">Edit</a>-->
						</div>
						<div class="col-1">
							<a  href="vehicle-detail.php?id=<?php echo $result['Identity'];?>"><i class="far fa-eye"></i></a>
                            <!--<a href="vehicledetail.php?id=<?php echo $result['Identity'];?>">View</a>-->
						</div>
						<div class="col-1">
							<a   href="../vehiclemanagement/vehicledelete.php?id=<?php echo $result['Identity'] ?>"><i class="fas fa-trash"></i></span></a>
                            <!--<a  href="vehicledelete.php?id=<?php echo $result['Identity'] ?>">Delete</span></a>-->
						</div>
					</div>

			<?php
				}
			?>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>