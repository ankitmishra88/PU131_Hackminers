<?php 
if(isset($_REQUEST['update'])){
    $id=$_REQUEST['id'];
    $name=$_REQUEST['name'];
    $quiet=$_REQUEST['quiet'];
    $harvest=$_REQUEST['harvest'];
    $peak=$_REQUEST['peak'];
    $holiday=$_REQUEST['holiday'];
    $query="UPDATE Zones SET Name='{$name}',quiet='{$quiet}',harvest='{$harvest}',peak='{$peak}',holiday='{$holiday}' WHERE Id={$id}";
    include_once('db-conn.php');
    if($conn->query($query)){
        header('location:http://hackminers.epizy.com/dashboard/season-matrix.php');
    }
    else{
        echo $conn->error;
    }
}

?>