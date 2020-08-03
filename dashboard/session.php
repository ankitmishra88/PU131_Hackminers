<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 

    }
    if (@$_SESSION['login']!=true){
        echo "<script> window.location.href='/dashboard/login/login.php';</script>";

        exit();
    }
    else{
				$type=$_SESSION['loginas'] ;
				$user=$_SESSION['username'] ;
				$branch=$_SESSION['branchid'];
    }
    
?>