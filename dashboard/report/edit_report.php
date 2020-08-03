<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    if (@$_SESSION['login']!=true){
        echo "<script> window.location.href='/dashboard/login/login.php';</script>";
        exit();
    }
?>
<?php
    if (@$_SESSION['login']==true){
        $branchid=$_SESSION['branchid'];
    }
?>

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
        //$conn = mysqli_connect('localhost','root','123','abc');
       // include_once('../login/db-conn.php');
        $id = $_GET['id'];
    ?>
    <?php 
        
        if(isset($_POST['update'])){
            $problem = mysqli_real_escape_string($conn,$_POST['problem']);
            $effect = mysqli_real_escape_string($conn, $_POST['effect']);

            mysqli_query($conn, "UPDATE `reports` SET `Problem`='$problem',`Effect`='$effect' WHERE `Identity` = $id") or die(mysqli_error()); 
            echo "<script> window.location.href='view_reports.php';</script>";
        }
    ?>

    
    
    <div class="container mt-4">
        <form method="post">
            <div class="row d-flex justify-content-center">
                <div class="col-6">
                    <?php 
                        $que = mysqli_query($conn , "SELECT * FROM `reports` WHERE `Identity`= $id ") or die(mysqli_error());
                        $q=mysqli_fetch_assoc($que);
        
                    ?>
                    <div class="form-group">
                        <label for="problem"><b>Problem</b></label>
                        <input type="text" name="problem" id="problem" class="form-control" placeholder="Type Problem arise" value="<?php  echo $q['Problem']  ?>">
                    </div>
                    <div class="form-group">
                        <label for="effect"><b>Effect</b></label>
                        <input type="number" name="effect" id="effect" class="form-control" placeholder="Enter the scale value the problem effect" value="<?php echo $q['Effect'] ?>">
                        <small class="text-muted">Min:0 and Max:100 </small>
                    <div class="form-group">
                        <input type="submit" name="update" value="UPDATE" class="btn btn-success">
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