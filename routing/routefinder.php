<?php

require 'conn.inc.php';

?>
<?php	
$TOTALCOST=0;
require 'functionhelper.php';
 require 'functions.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body class="container">










<?php

if(isset($_POST['submit'])){

	$from=trim(explode(",",mysqli_real_escape_string($conn,$_POST['from']))[0]);
	$to=trim(explode(",",mysqli_real_escape_string($conn,$_POST['to']))[0]);




	$q=mysqli_query($conn,"select * from rate_card where `FROM_STN` like '$from' and (TPT_1 like '$to' or TPT_2 like '$to' or TPT_3 like '$to' or TPT_4 like '$to' or TPT_5 like '$to' or TO_STN like '$to')
	union
	select * from rate_card where TPT_1 like '$from' and (TPT_2 like '$to' or TPT_3 like '$to' or TPT_4 like '$to' or TPT_5 like '$to' or TO_STN like '$to')
	union
	select * from rate_card where TPT_2 like '$from' and (TPT_3 like '$to' or TPT_4 like '$to' or TPT_5 like '$to' or TO_STN like '$to')
	union
	select * from rate_card where TPT_3 like '$from' and (TPT_4 like '$to' or TPT_5 like '$to' or TO_STN like '$to')
	union
	select * from rate_card where TPT_4 like '$from' and (TPT_5 like '$to' or TO_STN like '$to')
	union
	select * from rate_card where TPT_5 like '$from' and ( TO_STN like '$to')	
	" ) or die(mysqli_error($conn));


?>
<table class='table bordered'>
	<tr class="text-primary">
		<th>FROM_STN</th>
		<th>TPT_1</th>
		<th>TPT_2</th>
		<th>TPT_3</th>
		<th>TPT_4</th>
		<th>TPT_5</th>
		<th>TO_STN</th>
	</tr>
<?php
// while($qr=mysqli_fetch_assoc($q)){
    $qr=mysqli_fetch_assoc($q);
    $ar=array();
?>

	<tr>
		<td><?php echo $qr['FROM_STN']; ?></td>
		<td><?php echo $qr['TPT_1']; ?></td>
		<td><?php echo $qr['TPT_2']; ?></td>
		<td><?php echo $qr['TPT_3']; ?></td>
		<td><?php echo $qr['TPT_4']; ?></td>
		<td><?php echo $qr['TPT_5']; ?></td>
		<td><?php echo $qr['TO_STN']; ?></td>
	</tr>


<?php

	//creating array of stopping points

	if($qr['FROM_STN']!=""){
		array_push($ar,$qr['FROM_STN']);
	}
	if($qr['TPT_1']!=""){
		array_push($ar,$qr['TPT_1']);
	}
	if($qr['TPT_2']!=""){
		array_push($ar,$qr['TPT_2']);
	}
	if($qr['TPT_3']!=""){
		array_push($ar,$qr['TPT_3']);
	}
	if($qr['TPT_4']!=""){
		array_push($ar,$qr['TPT_4']);
	}
	if($qr['TPT_5']!=""){
		array_push($ar,$qr['TPT_5']);
	}
	if($qr['TO_STN']!=""){
		array_push($ar,$qr['TO_STN']);
	}

// } // end of while
?>
</table>
<div id="accordion">
<?php


	$countt=0;
	$co=0;
	for($i=0;$i<count($ar)-1;$i++){

		$first=$ar[$i];
		if($first==$from){
			$countt=1;
		}
		if($first==$to){
			$countt=0;
		}
		$second=$ar[$i+1];
		if($countt==1){

			$TOTALCOST+=displayAll($first,$second,$conn,$co+1);
			$co++;
		}
	}

	
}

?>
<h3 class="bg-secondary text-white p-2 rounded mt-3">Total Cost per kg: Rs. <?php echo $TOTALCOST;?></h3>
</div>

<?php 
	$locationArray = array();
	$sql = 'select locations.Identity, locations.Branch, locations.City, statenames.StateName  from locations inner join statenames on statenames.StateCode = locations.State ';
	$record = mysqli_query($conn , $sql);
	while ($result  = mysqli_fetch_array($record)){
		array_push($locationArray,array('Identity'=>$result['Identity'],'Branch' =>$result['Branch'] , 'City' => $result['City'] , 'State' => $result['StateName']));
	} 
?>

<form method="POST">

	<input list="locations" type="text" class="form-control my-3" name="from" placeholder="from">
	<datalist id="locations">
				<option disabled selected>--Select Location--</option>
				<?php 
					foreach($locationArray as $values){
						echo "<option value = '".$values['Branch'] ." , ".$values['City'] ." , ".$values['State'] ."'>" .$values['Branch'] ." , ".$values['City'] ." , ".$values['State'] . "<option>";
					}
				?>
				
	</datalist>

	<input class="form-control my-3"  list="locations" type="text" name="to"  placeholder="to">

	<input class="btn btn-danger" type="submit" value="submit" name="submit">

</form>	



</body>
</html>

