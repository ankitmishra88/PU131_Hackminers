<?php

if(isset($_REQUEST['id'])){
    include_once('db-conn.php');
    $id=$_REQUEST['id'];
    $query="UPDATE statenames SET zoneId=NULL WHERE zoneId={$id}";
    if($conn->query($query)){
        $query="DELETE FROM Zones where Id={$id}";
        if($conn->query($query)){
            header('location:http://hackminers.epizy.com/dashboard/season-matrix.php');
        }
        else{
            echo $conn->error;
        }
    }
    else{
        echo $conn->error;
    }
}

?>