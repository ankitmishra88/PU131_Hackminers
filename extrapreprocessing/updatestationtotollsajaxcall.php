
<?php

        require 'conn.inc.php';
?>

<?php

	$id=$_GET['id'];
	$res=$_GET['result'];

   	mysqli_query($conn,"update stationtotolls set details= '$res' where id='$id'") or die(mysqli_error($conn))
?>