<!DOCTYPE html>
<html>
<head>
	<title>All Keys</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
	<!-- File to view all keys -->
	<?php 
		// establishing new connection
		require "conn.inc.php";
	?>

	<div class="container mt-5">
		<div class="row">

			<!-- link for redirecting to add-global.php file to add ney key-->
			<a href="add-global.php" class="btn btn-primary">Add Key</a>
		</div>
	</div>

	<div class="container mt-4">
		<div class="row d-flex justify-content-left">
			<div class="col-4"><h4>Key</h4></div>
            <div class="col-4"><h4>Values</h4></div>
			<div class="col-4"><h4>Operations</h4></div>
		</div>
        <hr />
	</div>
	<div class="container mt-4">

			<div class="allkeysdisplay">

				<?php 
					// sql query to gey all keys from 'globaltable' sorting by the key name in desending order 
					$sql = "SELECT * FROM `globaltable` ORDER BY 'myKeys' DESC";
					// running the query
					$query = mysqli_query($conn,$sql);
					// starting the while loop for getting record one by one
					while($result = mysqli_fetch_assoc($query)){
						?>
						<!-- displaying every global key with their value and links for operation lik edit and delete -->
						<div class="row my-4 ">
							<div class="col-4"><?php echo '<b>'.$result['myKeys'].'</b>'; ?></div>
                            <div class="col-4"><?php echo '<b>'.$result['myValues'].'</b>'; ?></div>
							
							<div class=" col-2">
								<!-- link for editting global key with its id defined in link -->
								<a href="edit-global.php?id=<?php echo $result['Identity'];?>">Edit</a>
							</div>
							
							<div class="col-2">
								<!-- link for deleting global key with its id defined in link -->
								<a  href="../globalfactors/deletekey.php?id=<?php echo $result['Identity'] ?>">Delete</span></a>
							</div>
						</div>

				<?php
				// end of while loop
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
