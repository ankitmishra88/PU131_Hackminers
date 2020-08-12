<?php
    // check if the $_SESSION is set or not 
    //if no then start session
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    // if login in session is not true then redirect to login.php
    if (@$_SESSION['login']!=true){
        echo "<script> window.location.href='/dashboard/login/login.php';</script>";
        exit();
    }
?>
<?php
    // if login is true then get the branchid which is stored in session at the time of login
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
    <!-- File to edit the report of particular branch -->
	<div class="container mt-3 mb-1">
		<div class="row d-flex justify-content-center">
			<h1 class="center">Report</h1>
		</div>
	</div>
	<?php
    // connection with database , setting different variables 

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
        //getting the report id whose data is to be update
        $id = $_GET['id'];
    ?>
    <?php 
        // updating the report in table
        if(isset($_POST['update'])){
            $problem = mysqli_real_escape_string($conn,$_POST['problem']);
            $effect = mysqli_real_escape_string($conn, $_POST['effect']);
            // run sql query for updating report where identity is equal to the value stored in id variable
            mysqli_query($conn, "UPDATE `reports` SET `Problem`='$problem',`Effect`='$effect' WHERE `Identity` = $id") or die(mysqli_error()); 
            // redirecting to view_reports.php file to view all reports
            echo "<script> window.location.href='view_reports.php';</script>";
        }
    ?>

    
    
    <div class="container mt-4">
        <form method="post">
            <div class="row d-flex justify-content-center">
                <div class="col-6">
                    <?php 
                        // sql query for getting record where identity =  $id
                        $que = mysqli_query($conn , "SELECT * FROM `reports` WHERE `Identity`= $id ") or die(mysqli_error());
                        // fetching the associative array
                        $q=mysqli_fetch_assoc($que);
        
                    ?>
                    <!-- Form for getting updated content of report , where initial values of input fild are the values stored in reports table in database -->
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