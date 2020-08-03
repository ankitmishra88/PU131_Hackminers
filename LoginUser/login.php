<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
	<div class="container mt-3">
		
			<div class="row">
				<div class="col-12 d-flex justify-content-center">
					<h1>Login</h1>
				</div>
			</div>
	
	</div>
	<?php
		$conn=mysqli_connect('localhost','root','123','abc');
		if(isset($_POST['login'])){
			$loginas = mysqli_real_escape_string($conn, $_POST['loginAs']);
			$username = mysqli_real_escape_string($conn, $_POST['username']);
			$password = mysqli_real_escape_string($conn, $_POST['password']);
			$username = strtolower($username);
			// $sql = "SELECT * FROM `users` WHERE `Username` = $username AND  `Password`='$password' AND `LoginAs`='$loginas'";

			// $rs = mysqli_query($conn,"SELECT * FROM `users` WHERE `Username` = $username AND  `Password`='$password' AND `LoginAs`='$loginas'") or die(mysqli_error());
			$sql = "select * from users where Username = '$username' and Password = '$password' and LoginAs= '$loginas'";  
        	$rs = mysqli_query($conn, $sql); 
			$result = mysqli_fetch_assoc($rs);
			$cnt = mysqli_num_rows($rs);
			if($cnt == 1){
				echo "<div class='row d-flex justify-content-center'><div class='alert alert-success'>Login Successful</div></div>";
			}else{
				echo "<div class='row d-flex justify-content-center'><div class='alert alert-danger'>Login Failed: Incorrect Password or Username</div></div>";
			}
		}
	?>

	<div class="container">
		<form method="post" >
			<div class="row d-flex justify-content-center">
				<div class="col-4 mt-3">
					<div class="form-group">
						<label for="loginAs"><b>Login As:</b></label>
						<select name="loginAs" id="loginAs" class="form-control">
							<option value="Admin">Admin</option>
							<option value="Staff">Staff</option>
						</select>
					</div>
					<div class="form-group">
						<label for="username"><b>Username</b></label>
						<input type="text" name="username" id="username" placeholder="Enter Your Username" class="form-control">
					</div>
					<div class="form-group">
						<label for="password"><b>Password</b></label>
						<input type="password" name="password" id="password" class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" name="login" value="Login" class="btn btn-success">
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