<!-- File for deleting a report -->
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
// establish connection with database
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
	//$conn = mysqli_connect('localhost' , 'root', '123', 'abc');
    //include_once('../login/db-conn.php');
	// getting the id of report to be delete
	$id = $_GET['id'];
	//run sql query to delete the record from reports tables where idenity is eual to the value if id variable
	mysqli_query($conn,"DELETE FROM `reports` WHERE `reports`.`Identity` = $id") or die(mysqli_error());
	
	// refreshing the page
	header("Refresh: 0");
	// rediecting to view-reports.php page 
	header("Location: /dashboard/view-report.php");
?>
