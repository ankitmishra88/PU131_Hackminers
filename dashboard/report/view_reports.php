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
        // echo "<script>window.alert('$branchid')</script>";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
    <!-- Viewing all reports for particular branchid -->
    <div class="container mt-3 mb-1">
        <div class="row d-flex justify-content-center">
            <h1 class="center">Reports</h1>
        </div>
    </div>
    <div class="container">
        <div class="row ">

            <div  class="col-4"><h3>Problem</h3></div>
            <div class="col-4"><h3>Effect</h3></div>
            <div class="col-4"><h3>Operations</h3></div>
        </div>
    </div>
    <div class="container mt-4">
        
        <?php 
            //$conn = mysqli_connect('localhost','root','123','abc');
            //include_once('../login/db-conn.php');
        ?>
        <?php
        // establishing the connection with database
        // declaring and defining variables for connection 
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
            // sql query to get all record of a branch where branchid = $branchid
            $sql = "SELECT * FROM `reports` WHERE `BranchId` = '$branchid'";
            // running query
            $rs = mysqli_query($conn, $sql);
            // starting while loop for getting each record of report from reports table
            while($result = mysqli_fetch_assoc($rs)){
        ?>
            <!-- displaying problem and its effect scale -->
            <div class="row ">
                <div class="col-4"><?php echo '<b>'.$result['Problem'].'</b>'; ?></div>
                <div class="col-4"><?php echo '<b>'.$result['Effect'].'</b>'; ?></div> 
                <div class="col-2">
                    <!-- link to edit report with the identity of report  -->
                    <a href="/dashboard/edit-report.php?id=<?php echo $result['Identity'];?>">Edit</a>
                </div>
                <div class="col-2">
                    <!-- link to delete report with the identity of report  -->
                    <a  href="/dashboard/report/delete_report.php?id=<?php echo $result['Identity'] ?>">Delete</span></a>
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
