<body>
<?php
$zone_Id=$_REQUEST['id'];
 include_once('db-conn.php');
 $zone=$conn->query("SELECT Name FROM Zones where Id={$zone_Id}")->fetch_assoc()['Name'];
    if(isset($_POST['updZone'])){
        $name=$_POST['name'];
        $id=$_POST['zId'];
        $states=$_POST['states'];
        $cond="Identity={$states[0]}";
        $condR="Identity!={$states[0]}";
        $i=0;
        foreach($states as $key=>$val){
            if($i==0){
                $i+=1;
                continue;
            }
            $cond.=" OR Identity={$val}";
            $condR.=" AND Identity!={$val}";
        }
        $condR.=" AND zoneId={$id}";
        $query="UPDATE statenames SET zoneId={$id} WHERE {$cond}";
        $queryR="UPDATE statenames SET zoneId=NULL WHERE {$condR}";
        if($conn->query($query)){
            echo "updated";
        }
        else{
            die("{$conn->error}");
        }
        if($conn->query($queryR)){
            echo "updated";
            header("location:http://hackminers.epizy.com/dashboard/season-matrix.php");
        }
        else{
            die("{$conn->error}");
        }
    }
   
    $query="SELECT Identity,Statename,zoneId FROM statenames where zoneId={$zone_Id} OR zoneId IS NULL";
    $states=$conn->query($query);

    ?>
    <h2>Update Zone</h2>
    <form method='post' action="">
    <input type='hidden' name='zId' value=<?php echo $zone_Id;?>>
    <p><label>Name : <input type="text" value="<?php echo $zone;?>" name="name"></label></p>
    <p><label>States:</label></p><p>
        <?php 
        while($state=$states->fetch_assoc()){
            $sel=($state['zoneId']==$zone_Id)?'checked':'';
            echo "<input type='checkbox' value='{$state['Identity']}' {$sel} name='states[]'>{$state['Statename']}";
        }
        
        ?>
       </p>
        
    
    
    <button type="submit" name="updZone">Update</button>
    
    
    </form>

    <?php


?>
</body>