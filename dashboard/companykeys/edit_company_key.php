<!doctype html>
<html>
<head>
	<title>Edit Key Detail</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<?php
    $servername = "sql213.epizy.com";
$username = "epiz_24947486";
$password = "8zQ77ysI7I";
$dbname = "epiz_24947486_hackminers";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
	<?php 
		// $conn = mysqli_connect('localhost' , 'root' , '123', 'abc');
//include_once('../../admin/db-conn.php');

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname) or die(mysqli_error());
	?>
	<?php 
		$ide=$_GET['id'];

		if(isset($_POST['update'])){
			$compkey=mysqli_real_escape_string($conn,$_POST['mykey']);
			$compvalue=mysqli_real_escape_string($conn,$_POST['myvalue']);
			

			$sq = "UPDATE `companykeys` SET `compkeys` = '$compkey' ,`compvalues` = '$compvalue'   WHERE `companykeys`.`id` = $ide";

			mysqli_query($conn,$sq) or die(mysqli_error());
			
			echo "<script>window.location.href='view_company_keys.php';exit();</script>";
		}	
		
	?>
	

	<?php 
		$que = mysqli_query($conn , "SELECT * FROM `companykeys` WHERE  `id`= $ide ") or die(mysqli_error());
		$q=mysqli_fetch_assoc($que);
		
	?>
	<div class="container mt-5">
		<form method="post" >
			<div class="row d-flex justify-content-center">
				<div class="col-6">
					<div class="form-group">
						<label for="mykey"><b>Name Of Key</b></label>
						<input type="text" name="mykey" id="mykey" placeholder="Name Of Global Key" value = "<?php echo $q['compkeys'] ?>"  class="form-control" required>
					</div>
					<div class="form-group">
						<label for="myvalue"><b>Value</b></label>
						<input type="number" name="myvalue" id="myvalue" placeholder="Value of Key" step="0.0001" value ="<?php echo $q['compvalues'] ?>" class="form-control" required>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-success" name="update" value="UPDATE"> 
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