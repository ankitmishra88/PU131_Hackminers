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
	$id = $_GET['id'];

	mysqli_query($conn,"DELETE FROM `reports` WHERE `reports`.`Identity` = $id") or die(mysqli_error());
	
	
	header("Refresh: 0");
	header("Location: /dashboard/view-report.php");
?>
