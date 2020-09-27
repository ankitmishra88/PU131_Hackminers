<?php

require 'conn.inc.php';

?>
<?php	
$TOTALCOST=0; // Initializing totalcost as 0
require 'functionhelper1.php';  // including functionhelper for displayAll() function
 require 'functions.php';	// including functions for getweather() function
?>


<!-- basic HTML code -->


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



<!-- Basic html code  end -->






<?php

// the if statement runs when submit button is clicked in the form

if(isset($_REQUEST['submit'])){  //if block starts


	// the value we get from input field is in format of branchCode,city,state so we have to get only the branchCode


	//getting the to field branch code
	$from=trim(explode(",",mysqli_real_escape_string($conn,$_REQUEST['from']))[0]); 
	//getting the from field branch code
	$to=trim(explode(",",mysqli_real_escape_string($conn,$_REQUEST['to']))[0]);



	//mysql query to get the route between two stations i.e from and to
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

<!-- html table to show the route -->
<!-- table starts -->
<table class='table bordered'>
	<!-- table headings -->
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

	// fetching the result from mysql query
    $qr=mysqli_fetch_assoc($q);

    //creating an empty array for all the stations on the route we got from sql query
    $ar=array();
?>


	<!-- displaying the route in the table we started above -->
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
<!-- end of table -->


<div id="accordion">
<?php


	$countt=0; // keeping a flag to know the exact from and to from the route
	$co=0;// keeping a counter only for frontend purpose 

	// iterating over the whole array of stopping locations on a route
	for($i=0;$i<count($ar)-1;$i++){

		$first=$ar[$i]; // first station

		if($first==$from){ // if first is equal to from then only we are going to start doing something else it will just pass
			$countt=1;
		}
		if($first==$to){// if first is equal to to it means its last stationso we set flag as 0 as donot want any thing to happen
			$countt=0;
		}
		$second=$ar[$i+1]; // second station
		if($countt==1){
			// now if flag is 1 then we want the calcultion to take place
			$TOTALCOST+=displayAll($first,$second,$conn,$co+1); // calling displayAll function from functionshelper.php passing station1, station2, database connection and counter
			// add the returned value to TOTALCOST
			$co++; // increment the counter
		}
    }
    ?>

    <table class="table">
    <?php
        $percentofcomp=0;
        //echo $weather;
        $comprshand=mysqli_query($conn,"select * from companykeys where compkeys like 'handling'") or die(mysqli_error($conn));
        $comprshand=mysqli_fetch_assoc($comprshand);
        $percentofcomp+=$comprshand['compvalues']; 
        // calculating the handling cost from total cost
        $compcostperkmhandling=($TOTALCOST*$percentofcomp)/100;
    ?>

<!-- handling charges cost per km and total -->
    <tr>
        <td>Handling Charges :</td><td>Rs. <?php echo $compcostperkmhandling; ?></td>
    </tr>

    <?php
        $TOTALCOST+=$compcostperkmhandling;
    ?>
<tr>
    <td><b>Total cost :</b></td><td>Rs. <?php echo $TOTALCOST; ?></td>
</tr>

<!-- getting the margin charges of company -->
<?php
$percentofcomp=0;
$comprshand=mysqli_query($conn,"select * from companykeys where compkeys like 'margin'") or die(mysqli_error($conn));
$comprshand=mysqli_fetch_assoc($comprshand);
$percentofcomp+=$comprshand['compvalues'];
$compcostperkmmargin=($TOTALCOST*$percentofcomp)/100;
?>
<!-- Margin charges cost per km and total -->
<tr>
<td>Margin Charges :</td><td>Rs. <?php echo $compcostperkmmargin; ?></td>
</tr>


    <?php
        $TOTALCOST+=$compcostperkmmargin;
    ?>
<tr>
    <td><b>Total cost :</b></td><td>Rs. <?php echo $TOTALCOST; ?></td>
</tr>

<!-- getting the surcharges of company -->
<?php
$percentofcomp=0;
$comprshand=mysqli_query($conn,"select * from companykeys where compkeys like 'surcharges'") or die(mysqli_error($conn));
$comprshand=mysqli_fetch_assoc($comprshand);
$percentofcomp+=$comprshand['compvalues'];

$compcostperkmSURcharge=($TOTALCOST*$percentofcomp)/100;
?>
<!-- surcharges charges cost per km and total -->
<tr>
<td>Surcharges Charges :</td><td>Rs. <?php echo $compcostperkmSURcharge; ?></td>
</tr>


<!-- diplaying the total cost -->
<tr>
<td><b>Total cost :</b></td><td>Rs. <?php echo $TOTALCOST+$compcostperkmSURcharge; ?></td>
</tr>
<?php
    $TOTALCOST=$TOTALCOST+$compcostperkmSURcharge;
?>
<!-- diplaying the cost per kg -->
<tr>
<td><b>cost per kg :</b></td><td>Rs. <?php echo $TOTALCOST; ?></td>
</tr>

</table>

    <?php


	
} //end of if block

?>



<!-- diplaying the total cost -->
<h3 class="bg-secondary text-white p-2 rounded mt-3">Total Cost per kg: Rs. <?php echo $TOTALCOST;?></h3>
</div>

<?php 

	// creating a locationaarray whith branchcode,city and state to display as suggestion when user type in input field
	$locationArray = array();
	$sql = 'select locations.Identity, locations.Branch, locations.City, statenames.StateName  from locations inner join statenames on statenames.StateCode = locations.State ';
	$record = mysqli_query($conn , $sql);
	while ($result  = mysqli_fetch_array($record)){
		array_push($locationArray,array('Identity'=>$result['Identity'],'Branch' =>$result['Branch'] , 'City' => $result['City'] , 'State' => $result['StateName']));
	} 
?>


<!-- creating a form  for from and to -->
<form method="GET">


	<!-- from input field -->
	<input list="locations" type="text" class="form-control my-3" name="from" placeholder="from">

	<!-- suggestion list -->
	<datalist id="locations">
				<option disabled selected>--Select Location--</option>
				<?php 
					foreach($locationArray as $values){
						echo "<option value = '".$values['Branch'] ." , ".$values['City'] ." , ".$values['State'] ."'>" .$values['Branch'] ." , ".$values['City'] ." , ".$values['State'] . "<option>";
					}
				?>
				
	</datalist>


	<!-- // to input field -->
	<input class="form-control my-3"  list="locations" type="text" name="to"  placeholder="to">

<!-- submit button -->
	<input class="btn btn-danger" type="submit" value="submit" name="submit">

</form>	
<!-- end of form -->


</body>
</html>

<!-- end of html -->
