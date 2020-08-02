	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 

<script>


				function updatedata (id,result) {
		          $.ajax({
		            url:"updatedata.php?id="+id+"&result="+result, //the page containing php script
		            type: "POST", //request type
		            success:function(result){
		                
		           }
		         });
		        
		     	}
				function finddata (id,stn1,stn2) {
		          $.ajax({
		            url:"gettoll.php?stn1="+stn1+"&stn2="+stn2, //the page containing php script
		            type: "POST", //request type
		            success:function(result){
		            	console.log(id,result);
		                updatedata(id,result);
		           }	
		         });
		        
		     	}

		     	
			</script>


<?php

        require 'conn.inc.php';
?>
<?php


	
	$qr=mysqli_query($conn,"Select * from `stationtotolls` WHERE details like '' ") or die (mysqli_error($conn));

	while(
		$q=mysqli_fetch_assoc($qr)
	){

		$stn1=$q['stn1'];
		$stn2=$q['stn2'];
		$id=$q['id'];
		


		$stn1q=mysqli_query($conn,"select locations.Branch, locations.City, statenames.StateName  from locations inner join statenames on statenames.StateCode = locations.State where locations.Branch like '$stn1'")or die (mysqli_error($conn));
		$stn1q=mysqli_fetch_assoc($stn1q);
		$stn1str="";
		
		$pattern = "/^[a-z A-Z]*$/";
		if(preg_match($pattern, $stn1q['City'])){
			$stn1str=$stn1q['City'].", ".$stn1q['StateName'];
			$stn1str=$url = str_replace(" ", "%20", $stn1str);
		}

		$stn2q=mysqli_query($conn,"select locations.Branch, locations.City, statenames.StateName  from locations inner join statenames on statenames.StateCode = locations.State where locations.Branch like '$stn2'")or die (mysqli_error($conn));
		$stn2q=mysqli_fetch_assoc($stn2q);

		$stn2str="";

		if(preg_match($pattern, $stn2q['City'])){
			$stn2str=$stn2q['City'].", ".$stn2q['StateName'];
			$stn2str=$url = str_replace(" ", "%20", $stn2str);
		}

		// echo $stn1str." ".$stn2str."<br>";

		if($stn1str=="" || $stn2str==""){

		}else{

			?>

			<script>

				finddata(<?php echo $id;?>,'<?php echo $stn1str;?>','<?php echo $stn2str;?>');

			</script>


			<?php


		}

	}



?>

