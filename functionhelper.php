<?php

	function displayAll($first,$second,$conn){
	   
       echo "<hr style='border:10px solid black'>";

        echo "<h1> ".$first." to ".$second." </h1>";

    	$fetchingdetails=mysqli_query($conn,"select * from stationtotolls where (stn1 like '$first' and stn2 like '$second') or (stn1 like '$second' and stn2 like '$first')") or die(mysqli_error($conn));

    	$data=mysqli_fetch_assoc($fetchingdetails)['details'];
    	if($data[0]=="$"){
    		$data=str_replace("$","$$",$data);

    	}
    	$ar=(explode("$$",$data));
        // print_r($ar);
        $aar=(explode("!",$ar[1]));
        $kmStr=$aar[0];
        // echo $kmStr;
        $km=(explode(" ",$kmStr));
        $km=$km[0];
        $km=str_replace(",","",$km);
        $km=(int)$km;
        
        // echo $km;
        $time=$aar[1];
        $s=$ar[0];
        $sar=(explode("$",$s));
        $vehicletype=mysqli_query($conn,"select * from vehicletable where distance>=$km order  by distance asc limit 1") or die(mysqli_error($conn));
        $vehicletype=mysqli_fetch_assoc($vehicletype);
    

?>
    
<table class="table">

<tr>
    <td>['TollName']</td>
    <td>['CarRate_single']</td>
    <td>['FourToSixExel_Single']</td>
    <td>['HCM_EME_Single']</td>
    <td>['LCVRate_single']</td>
    <td>['Location']</td>
    <td>['latitude']</td>
    <td>['longitude']</td>
    <td>['MultiAxleRate_single']</td>
    <td>['SearchLoc']</td>

</tr>
<?php
    $cost=0;
    for($i=0;$i<count($sar);$i++){
        $dar=explode(',',$sar[$i]);
        if(isset($dar[0])){
       		$lat=(double)$dar[0];
    	}else{
    		$lat=-1;
    	}
        // echo $lat;
        // echo gettype($lat);
        if(isset($dar[1])){
       		$long=(double)$dar[1];
    	}else{
    		$long=-1;
    	}
        $q=mysqli_query($conn,"select * from TollData where latitude=$lat and longitude=$long") or die(mysqli_error($conn));
        $q=mysqli_fetch_assoc($q);
        if($vehicletype['Capacity']<=6){
            $cost+=$q['LCVRate_single'];   
        }else if($vehicletype['Capacity']<=9){
             $cost+=$q['MultiAxleRate_single'];
        }else{
            $cost+=$q['FourToSixExel_Single'];
        }
        echo "<tr>
        <td>".$q['TollName']."</td>
        <td>".$q['CarRate_single']."</td>
        <td>".$q['FourToSixExel_Single']."</td>
        <td>".$q['HCM_EME_Single']."</td>
        <td>".$q['LCVRate_single']."</td>
        <td>".$q['Location']."</td>
        <td>".$q['latitude']."</td>
        <td>".$q['longitude']."</td>
        <td>".$q['MultiAxleRate_single']."</td>
        <td>".$q['SearchLoc']."</td>
    
    </tr>";
        
    }

?>
</table>




<div id="result">


<table>
    <tr>
<td> Total Toll Cost for 4 to 6 axel Vehicle :</td><td> <?php echo $cost;?></td></tr>
<tr><td> Total Kms to be travelled:</td><td><?php echo $km;?></td></tr>
<tr><td> Time of Travelling :</td><td><?php echo $time;?></td></tr>
</table>
</div>

<ul>
<h3>Assuming Some Fixed Costs:</h3>
<li>Tyre : Rs. <?php echo $vehicletype['Tyre'];?> per KM</li>
<li>EMI : Rs. <?php echo $vehicletype['EMI'];?> per KM</li>
<li>Maintenance : Rs. <?php echo $vehicletype['Maintenance'];?> per KM</li>
<li>Drivers Cost : Rs. <?php echo $vehicletype['DriverCost'];?> per KM</li>
<li>National permit, Insurance, Fitness, Road Tax, goods Tax : Rs.1.00 per KM</li>
<li>Police / RTO / Border / Accidents : Rs. 1.00 per KM</li>
<li>Company Management Expenses : Rs. 1.00 per KM</li>
<li>Mielage of truck : <?php echo $vehicletype['Mileage'];?> Km/L </li>
</ul>


<?php $fuelpkm= (1/ (float)$vehicletype['Mileage'])*81.94 ; ?>
<div class="container">
<table class="table">
<tr>
    <th>Factor</th><th>Cost/KM</th><th>Total Cost</th>
</tr>
<tr>
    <td>Fuel Price</td> <td><?php echo $fuelpkm;?></td> <td><?php echo $fuelpkm*$km ?></td>
</tr>
<tr>
    <td>Toll Price</td><td><?php echo $cost/$km;?></td><td><?php echo $cost;?></td>
</tr>
<tr>
    <td>EMI</td><td>Rs. <?php echo $vehicletype['EMI'];?> per KM</td><td><?php echo (float)$vehicletype['EMI']*$km;?></td>
</tr>


<tr>
    <td>Tyre & maintenance</td><td>Rs. <?php echo $vehicletype['Maintenance']+$vehicletype['Tyre'];?></td><td><?php echo (float)$km*( $vehicletype['Maintenance']+$vehicletype['Tyre']);?></td>
</tr>
<tr>
    <td>Drivers Cost</td><td>Rs. <?php echo $vehicletype['DriverCost'];?></td><td><?php echo $km*$vehicletype['DriverCost'];?></td>
</tr>
    
<tr>
    <td>National permit, Insurance, Fitness, Road Tax, goods Tax :</td><td><?php echo "Rs. 1.00";?></td><td><?php echo $km*1.00;?></td>
</tr>
<tr>
    <td>Police / RTO / Border / Accidents:</td><td><?php echo "Rs. 1.00";?></td><td><?php echo $km*1.00;?></td>
</tr>
<tr>
    <td>Company Management Expenses:</td><td><?php echo "Rs. 1.00";?></td><td><?php echo $km*1.00;?></td>
</tr>
<?php $totalcostperkm=($cost/$km)+1+1+1+$fuelpkm+$vehicletype['DriverCost']+$vehicletype['Maintenance']+$vehicletype['Tyre']+$vehicletype['EMI'];
$totalcost=$cost+(1+1+1+$fuelpkm+$vehicletype['DriverCost']+$vehicletype['Maintenance']+$vehicletype['Tyre']+$vehicletype['EMI'])*$km;
$costperkg=$totalcost/($vehicletype['Capacity']*907);
?>
<tr>
    <td>Total cost :</td><td>Rs. <?php echo $totalcostperkm; ?></td><td><?php echo $totalcost; ?></td>
</tr>
    

<tr>
    <td>cost per kg :</td><td>Rs. <?php echo $costperkg; ?></td>
</tr>

</table>
</div>
<?php

    return $costperkg;
}


?>