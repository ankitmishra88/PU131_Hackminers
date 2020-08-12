<?php
	// check for the $_SESSION
	if(!isset($_SESSION)) 
    { 
    	// start session
        session_start(); 
    } 
    // if $_SESSION['login'] is set the redirect to welcome.php
	if (@$_SESSION['login']==true){
		// redirecting to welcome.php
		echo "<script> window.location.href='welcome.php';</script>";
		exit();
	}
?>

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
		// establishing connection
		include_once('db-conn.php');
		// check for the authentication
		if(isset($_POST['login'])){
			// declaring variables and initializing it 
			$loginas = mysqli_real_escape_string($conn, $_POST['loginAs']);
			$username = mysqli_real_escape_string($conn, $_POST['username']);
			$password = mysqli_real_escape_string($conn, $_POST['password']);
			$password = md5($password);
			$username = strtolower($username);
			// sql query to selecting record data where the username and loginas is eual to the $username nd $loginas variables resepectively
			$sql = "select `BranchId` , `Password`,`LoginAs`  from users where Username = '$username' and LoginAs='$loginas' ";  
			// run the query
        	$rs = mysqli_query($conn, $sql); 
        	// fetch the corresponding associative array
			$rs = mysqli_fetch_assoc($rs);
			// check for the input password mathes with the password stored in database corresponding to that user 
			if($password == $rs['Password']){
				// if true then set the $_SESSION array  and then redirecting to dashboard
				$_SESSION['login'] = true;
				$_SESSION['loginas'] = $rs['LoginAs'];
				$_SESSION['username'] = $rs['Username'];
				$_SESSION['branchid'] = $rs['BranchId'];
				// redirecting
				echo "<script> window.location.href='/dashboard';</script>";
				exit();
			}
			else{
				// if password is not matched  then show alert 
				echo "<script>alert('Password or Email does not match.')</script>"  ; 
			}
			
		}
	?>

	<div class="container">
		<!-- login form for login with username password, and type of user  -->
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
