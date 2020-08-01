<?php

        require 'conn.inc.php';
?>

<?php

	$myfile = fopen("states_ut.csv", "r") or die("Unable to open file!");
	
	while(!feof($myfile)) {
		$a=fgetcsv($myfile);
		$StateName = $a[0];
		$StateCode = $a[1];
		
		mysqli_query($conn,"INSERT INTO `statenames`( `StateName`, `StateCode`) 
			VALUES ('$StateName', '$StateCode')")or die (mysqli_error());
		
	}
	fclose($myfile);


?>