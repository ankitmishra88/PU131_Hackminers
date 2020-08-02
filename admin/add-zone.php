<body>
<?php
 include_once('db-conn.php');
    if(isset($_POST['addZone'])){
        $name=$_POST['name'];
        $query="INSERT into Zones (Name) VALUES ('{$name}')";
        $states=$_POST[states];
        $cond="Identity=".$states[0];
        $i=0;
        foreach($states as $key=>$s_id){
            if($i==0){
                $i++;
                continue;
            }
            $cond=$cond." OR Identity=".$s_id;
        }
        //echo $cond;
        if($conn->query($query)===True){
            $id=$conn->insert_id;
            $query="UPDATE statenames SET zoneId={$id} WHERE {$cond} ";
            //echo $query;
            if ($conn->query($query) === TRUE) {
                //echo "Record updated successfully";
                header("location:http://hackminers.epizy.com/dashboard/season-matrix.php");
                } 
            else{
                echo "Error Updating record: " . $conn->error;
                }
        }
        else{
            echo "Error inserting record: " . $conn->error;
        }
    }
   
    $query="SELECT Identity,Statename FROM statenames where zoneId IS NULL";
    $states=$conn->query($query);

    ?>
    <h2>Add New Zone</h2>
    <form method='post' action="">
    <p><label>Name : <input type="text" name="name"></label></p>
    <p><label>States:</label></p><p>
        <?php 
        while($state=$states->fetch_assoc()){
            echo "<input type='checkbox' value='{$state['Identity']}' name='states[]'>{$state['Statename']}";
        }
        
        ?>
     </p>   
    
    
    <button type="submit" name="addZone">Add</button>
    
    
    </form>

    <?php


?>
</body>