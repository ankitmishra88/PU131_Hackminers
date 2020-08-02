<!DOCTYPE html>
<html>
<head>
	<title>View Reports</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	

</head>
<body>
	<div class="container mt-3 mb-1">
		<div class="row d-flex justify-content-center">
			<h1 class="center">Different Reports</h1>
		</div>
	</div>
	<?php 
		$conn = mysqli_connect('localhost','root','123','abc');
	?>
	<?php 
		if(isset($_POST['submit'])){
			$cityid = mysqli_real_escape_string($conn,$_POST['cityid']);
			echo "<script>window.location.href='viewfromadmin.php?cityid= $cityid';</script>";
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
						<label for="cityid"><b>City Id:</b></label>
						<input list="cityids" name="cityid" id="cityid" >
						<datalist id="cityids" >	
							<?php 
								foreach($locationArray as $values){
									echo "<option value = '".$values['Identity'] ."'>".$values['CityName'] . "<option>";
								}
							?>
						</datalist>

						<input type="submit" name="submit" value="Sumbit" class="btn btn-sm btn-success">
					</div>
				</div>
			</div>
		</form>			
	</div>
	<div class="container mt-3">
		<div class="row">
			<?php
				$q =$_GET['cityid'];
				$sql="SELECT * FROM report WHERE CityId = '".$q."'";
				$result = mysqli_query($conn,$sql);
				echo "<table class='table'>
				<tr>
				<th>Reported By</th>
				<th>Type</th>
				<th>Reported on</th>
				<th>Description</th>
				<th>Issue solved</th>
				
				</tr>";
				while($row = mysqli_fetch_array($result)) {
					?>
					<tr>
						<td><?php echo $row['ReportedBy'];?></td>
						<td><?php echo $row['Type'];?></td>
						<td><?php echo $row['Date']; ?></td>
						<td><?php echo $row['Description'];?></td>
						<td><?php echo  $row['Confirm']; ?> <a href="changestatus.php?id=<?php echo $row['Identity'] ?>">Change Status</a></td>
						
					</tr>
				  
			<?php 
				}
				echo "</table>";
			?>
				
			
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>