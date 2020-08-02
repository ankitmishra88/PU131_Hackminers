<!DOCTYPE html>
<html>
<head>
	<title>Report</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
	<div class="container mt-3 mb-1">
		<div class="row d-flex justify-content-center">
			<h1 class="center">Report</h1>
		</div>
	</div>
	<div class="container mt-3 mb-4">
		<div class="row float-right">
			<a href="viewreport.php" class="btn btn-info">View Report</a>
		</div>
	</div>
	<?php 
		$conn = mysqli_connect('localhost','root','123','abc');
	?>
	<?php 
		
		if(isset($_POST['submit'])){
			$reportedby = mysqli_real_escape_string($conn,$_POST['reportedby']);
			$type = mysqli_real_escape_string($conn,$_POST['type']);
			$reportedon = mysqli_real_escape_string($conn,$_POST['reportedon']);
			$cityid = mysqli_real_escape_string($conn,$_POST['cityid']);
			$contactus = mysqli_real_escape_string($conn,$_POST['contactus']);
			$description = mysqli_real_escape_string($conn,$_POST['description']);
			$issueresolved = mysqli_real_escape_string($conn,$_POST['issueresolved']);

			mysqli_query($conn,"INSERT INTO `report`(`Type`, `Date`, `ReportedBy`, `ContactUs`, `CityId`, `Description`, `Confirm`) VALUES ('$type','$reportedon','$reportedby','$contactus','$cityid','$description','$issueresolved')") or die(mysqli_error());
		}
	?>
	<?php 
		$locationArray = array();		
		$record = mysqli_query($conn , "SELECT * FROM `cities`");
		while ($result  = mysqli_fetch_array($record)){
			array_push($locationArray,array('Identity'=>$result['Identity'],'CityName'=>$result['CityName']));
		} 
	?>
	<div class="container mt-4">
		<form method="post">
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label for="reportedby"><b>Name:</b></label>
						<input type="text" name="reportedby" id="reportedby" class="form-control" Placeholder="Enter Your Name" required>
					</div>
					<div class="form-group">
						<label for="type"><b>Type:</b></label>
						<select name="type" id="type" class="form-control" required>
							<option value="strike">Strike</option>
							<option value="calamities">Calamities</option>
						</select>
					</div>
					<div class="form-group">
						<label for="reportedon"><b>Reported On:</b></label>
						<input type="date" name="reportedon" class="form-control" id="reportedon" value="<?php echo date('Y-m-d')  ?>" >	
					</div>
					<div class="form-group">
						<label for="cityid"><b>City Id:</b></label>
						<input list="cityids" name="cityid" id="cityid" class="form-control">
						<datalist id="cityids">
							
							<?php 
								foreach($locationArray as $values){
									?>
									<option value="<?php echo ''.$values['Identity'] ?>"><?php echo $values['CityName'] ?></option>
							<?php
								}
							?>
						</datalist>
					</div>
					
					<div class="form-group">
						<label for="contactus"><b>Mobile Number:</b></label>
						<input type="number" name="contactus" id="contactus" class="form-control" Placeholder="Enter your Mobile Number" pattern="[1-9]{1}[0-9]{9}" title="Enter Valid Mobile Number" required>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label for="description"><b>Detail:</b></label>
						<textarea name="description" id="description" class="form-control" rows="8" required>
						</textarea>
					</div>
					<label><b>Issue Resolved:</b><br /></label>
					<div class="form-group m-0">
						<input type="radio" name="issueresolved" id="issueresolved" value="Yes"><label for="issueresolved" class="mb-0"> Yes</label>
					</div>
					<div class="form-group m-0">
						<input type="radio" name="issueresolved" id="issueresolved" value="No"  checked> <label for="issueresolved" class="mt-0"> No</label>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Sumbit" class="btn btn-success">
					</div>
				</div>

			</div>
		</form>
			
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>