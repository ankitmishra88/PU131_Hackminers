<!DOCTYPE html>
<html>
<head>
	<title>All Company Keys</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
	<?php 
		$conn = mysqli_connect('localhost' , 'root', '123', 'abc');
	?>

	<div class="container mt-5">
		<div class="row d-flex justify-content-left">
			<div class="col-4"><h1>Key</h1></div>
			<div class="col-4"><h1>Value</h1></div>
			<div class="col-4"><h1>Operations</h1></div>

		</div>
	</div>
	<hr />
	<div class="container mt-5">


				<?php 
					$sql = "SELECT * FROM `companykeys`";
					$query = mysqli_query($conn,$sql);
					while($result = mysqli_fetch_assoc($query)){
						?>
						<div class="row my-3">
							<div class="col-4 "><?php echo '<b>'.$result['compkeys'].'</b>'; ?></div>
							<div class="col-4 "><?php echo '<b>'.$result['compvalues'].'</b>'; ?></div>
							
							<div class=" col-2">
								<a href="edit_company_key.php?id=<?php echo $result['id'];?>">Edit</a>
							</div>
		
						</div>

				<?php
					}
				?>
			</div>
		</div>		
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>