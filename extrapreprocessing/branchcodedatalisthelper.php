
<?php

        require 'conn.inc.php';
?>
<!doctype html>
<html>
<head>
	<title>Location Search</title>
</head>
<body>

	<?php 
		$locationArray = array();

		$sql = 'select locations.Identity, locations.Branch, locations.City, statenames.StateName  from locations inner join statenames on statenames.StateCode = locations.State ';
		$record = mysqli_query($conn , $sql);
		while ($result  = mysqli_fetch_array($record)){
			array_push($locationArray,array('Identity'=>$result['Identity'],'Branch' =>$result['Branch'] , 'City' => $result['City'] , 'State' => $result['StateName']));
		} 
	?>

	<form >
		<label for="location">
		Location: </label>
		<input list="locations" name="location" id="location">
			<datalist id="locations">
			<option disabled selected>--Select Location--</option>
			<?php 
				foreach($locationArray as $values){
					echo "<option value = '".$values['Branch'] ." , ".$values['City'] ." , ".$values['State'] ."'>" .$values['Branch'] ." , ".$values['City'] ." , ".$values['State'] . "<option>";
				}
			?>
			
			</datalist>
	</form>
	<!-- <p>
		<?php
			// for($i=0;$i<count($locationArray);$i++){
   //  				print_r($locationArray[$i]);
   //  				echo "<br>";
			// } 
		?>
	</p> -->
	<?php 
		mysqli_close($conn);
	?>
</body>
