
<table>
<thead>
<tr><th class="btn-sm">Sr.no</th><th class="btn-sm" >Zone Name</th><th class="btn-sm">Quiet Season<br>(JAN-MAR)</th><th class="btn-sm">Produce Season<br>(APR-JUL)</th><th class="btn-sm">Peak Season<br>(Aug-Oct)</th><th class="btn-sm">Holiday Season<br>(Nov-Dec)</th><th>Update</th><th class="btn-sm">Edit</th></tr>
</thead>
<tbody>
<?php
include_once('db-conn.php');
$query="SELECT * FROM Zones";
$results=$conn->query($query);
$zones=$results;
$i=1;
while($zone=$results->fetch_assoc()){
    echo "<form method='post' action='/admin/update-zone.php'><tr><td><label>{$i}<input class='form-control border-0 small' type='hidden' name='id' value='{$zone['Id']}'></td><td><input class='form-control border-0 small' type='text' name='name' value='{$zone['Name']}'></td><td><input class='form-control border-0 small' name='quiet' type='text' value='{$zone['quiet']}'></td><td><input class='form-control border-0 small' type='text' name='harvest' value='{$zone['harvest']}'></td><td><input class='form-control border-0 small' type='text' name='peak' value='{$zone['peak']}'></td><td><input class='form-control border-0 small' type='text' name='holiday' value='{$zone['holiday']}'></td><td><button name='update' class='d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm' type='submit'>Update</button></td><td><a href='/dashboard/edit-zone.php?id={$zone['Id']}' class='d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm'>Edit</a></td><td><a href='/admin/delete-zone.php?id={$zone['Id']}' class='d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm'>Delete</a></td></tr></form>";
    $i+=1;
}
?>
</tbody>
</tbody>
</table>
<table class="table table-striped">
<th>Zone Name</th><th>States</th>
<?php 
$zones=$conn->query($query);
while($zone=$zones->fetch_assoc()){
    echo "<tr><td>{$zone['Name']}</td>";
    $query="SELECT StateName FROM statenames WHERE zoneId={$zone['Id']}";
    $result=$conn->query($query);
    $states="";
    while($state=$result->fetch_assoc()['StateName'])
        $states.=$state.',';
    echo "<td>{$states}</td></tr>";
}
?>
</table>
<p class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" >Zone Not Assigned </p>
<p>
<?php
$query="SELECT StateName FROM statenames WHERE zoneId IS NULL";
$nullState=$conn->query($query);
if($nullState->num_rows>0){
    while($st=$nullState->fetch_assoc()){
        echo $st['StateName'].',';
    }
}
else{
   echo 'Zones Assigned to all states'; 
}
?>
</p>
<div style="display:block">
<button class="d-none d-sm-inline-block btn btn-sm  shadow-sm"><a href="/dashboard/add-zone.php">Add New Zone</a></button>
</div>