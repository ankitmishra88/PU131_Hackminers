<?php

        require 'conn.inc.php';
?>


<?php
	

	$myfile = fopen("FROMTO_STN.csv", "r") or die("Unable to open file!");
	
	while(!feof($myfile)) {
		$a=fgetcsv($myfile);
		$stn1 = $a[0];
		$stn2 = $a[1];
		
		$q=mysqli_query($conn,"Select * from `stationtotolls` where (stn1 like '$stn1' and stn2 like '$stn2') or (stn1 like '$stn2' and stn2 like '$stn1')")or die (mysqli_error($conn));

		if(mysqli_num_rows($q)==0){
mysqli_query($conn,"INSERT INTO `stationtotolls`( `stn1`, `stn2`) 
			VALUES ('$stn1', '$stn2')")or die (mysqli_error());
		}

		
		
	}
	fclose($myfile);


?>