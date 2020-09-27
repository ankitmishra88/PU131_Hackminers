<?php


	function displayAll($first,$second,$conn,$index){
        $totarray=array();
 
	   // getting the state ,city, identity of station 1 (first)
        $state11=mysqli_query($conn,"select * from locations where branch like '$first'") or die(mysqli_error($conn));
        $state11=mysqli_fetch_assoc($state11);
        $state1=$state11['State']; // state
        $city1=$state11['City'];// city
		$stn1Id=$state11['Identity']; // iddentity
        $weather1=getWeather($city1); // getting weather from getWeather function from functions.php for city of station1

        // getting the state ,city, identity of station 2 (second)
        $state22=mysqli_query($conn,"select *  from locations where branch like '$second'") or die(mysqli_error($conn));
        $state22=mysqli_fetch_assoc($state22);
        $state2=$state22['State'];//state
        $city2=$state22['City'];//city
        $weather2=getWeather($city2);// getting weather from getWeather function from functions.php for city of station2

        //averaging the weather of station1 and station2
        $weather=($weather1+$weather2)/2;

        // getting the average of fuel price from both states  of stations

        $fuelpr=mysqli_query($conn,"SELECT AVG(fuelPrice) FROM `statenames` WHERE `StateCode` like '$state1' or `StateCode` like '$state2'") or die(mysqli_error($conn));
        $fuelprc=mysqli_fetch_assoc($fuelpr);
        $fuelprc=$fuelprc['AVG(fuelPrice)'];

        // getting the toll stations , distance and time between two stations.
    	$fetchingdetails=mysqli_query($conn,"select * from stationtotolls where (stn1 like '$first' and stn2 like '$second') or (stn1 like '$second' and stn2 like '$first')") or die(mysqli_error($conn));

    	$data=mysqli_fetch_assoc($fetchingdetails)['details'];

        //spliting the fetched data
    	if($data[0]=="$"){
    		$data=str_replace("$","$$",$data);

    	}
    	$ar=(explode("$$",$data));
        // print_r($ar);
        $aar=(explode("!",$ar[1]));
        $kmStr=$aar[0];
        // echo $kmStr;

        $km=(explode(" ",$kmStr));

        //checking if distance is in meteres
        if($km[1]=='m'){
            $km=(int)$km[0]/1000.0;
        }else{
            $km=$km[0];
            $km=str_replace(",","",$km);
            $km=(int)$km;
        }
        
        // echo $km;
        $time=$aar[1];
        $s=$ar[0];
        $sar=(explode("$",$s));




        //getting the vehicle type from vehicle table according to the distance.
        $vehicletype=mysqli_query($conn,"select * from vehicletable where distance>=$km order  by distance asc limit 1") or die(mysqli_error($conn));
        $vehicletype=mysqli_fetch_assoc($vehicletype);
    

?>

 <!-- creating the card to display the data -->
<div class="card mt-3">
                                <!-- counter is used as index for frontend -->
    <div class="card-header" id="heading<?php echo $index;?>">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $index;?>" aria-expanded="true" aria-controls="collapse<?php echo $index;?>">
            <!-- displaying name of two stations -->
           <?php echo $first;?> - <?php echo $second; ?>
        </button>
      </h5>
    </div>
<?php
    //calculating the cost of tolls between two stations
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

        // fetching the toll details from latitude and longitude
        $q=mysqli_query($conn,"select * from TollData where latitude=$lat and longitude=$long") or die(mysqli_error($conn));
        $q=mysqli_fetch_assoc($q);

        //adding up the cost according to the vehicle type
        if($vehicletype['VehicleMode']=="LCV"){
            $cost+=$q['LCVRate_single'];   
        }else if($vehicletype['VehicleMode']=="Truck"){
             $cost+=$q['MultiAxleRate_single'];
        }else if($vehicletype['VehicleMode']=="Upto 3 Axle"){
             $cost+=$q['MultiAxleRate_single'];
        }else if($vehicletype['VehicleMode']=="4 to 6Axle"){
            $cost+=$q['FourToSixExel_Single'];
        }else if($vehicletype['VehicleMode']=="7 or more"){
            $cost+=$q['FourToSixExel_Single']; // needs to be changed
        }else if($vehicletype['VehicleMode']=="HCM/EME"){
            $cost+=$q['HCM_EME_Single'];
        }else{
            $cost+=$q['MultiAxleRate_single'];
        }

       

    //     echo "<tr>
    //     <td>".$q['TollName']."</td>
    //     <td>".$q['CarRate_single']."</td>
    //     <td>".$q['FourToSixExel_Single']."</td>
    //     <td>".$q['HCM_EME_Single']."</td>
    //     <td>".$q['LCVRate_single']."</td>
    //     <td>".$q['Location']."</td>
    //     <td>".$q['latitude']."</td>
    //     <td>".$q['longitude']."</td>
    //     <td>".$q['MultiAxleRate_single']."</td>
    //     <td>".$q['SearchLoc']."</td>
    
    // </tr>";
    
    }


?>
    <div id="collapse<?php echo $index;?>" class="collapse" aria-labelledby="heading<?php echo $index;?>" data-parent="#accordion">
      <div class="card-body">
<!--     
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

</table>
 -->



<div id="result">
    <!-- displaying up all the costs before adding up -->

<h3 class="heading-3 text-danger">Costs dependent on Route</h3>
<table class="table">
    <!-- cost dependent on route i.e toll costs and kilometers of distance to travel. -->
    <tr><td> <b>Total Toll Cost for <?php echo $vehicletype['VehicleMode'] ;?> Vehicle :</b></td><td> Rs. <?php echo $cost;?></td></tr>
    <tr><td> <b>Total Kms to be travelled:</b></td><td><?php echo $km;?> Kms</td></tr>
    <tr><td><b> Time of Travelling :</b></td><td><?php echo $time;?></td></tr>
</table>

<h3 class="heading-3 text-danger">Costs dependent on Vehicle</h3>
<table class="table table-striped">
    <!-- displaying cost dependent on vehicle i.e tyre cost,Maintenance ,driver cost,mielage of vehicle, EMI etc -->
    <tr><td> <b>Tyre :</b></td><td>Rs. <?php echo $vehicletype['Tyre'];?> per KM</td></tr>
    <tr><td> <b>EMI/Profit :</b></td><td>Rs. <?php echo $vehicletype['EMI'];?> per KM</td></tr>
    <tr><td> <b>Maintenance :</b></td><td>Rs. <?php echo $vehicletype['Maintenance'];?> per KM</td></tr>
    <tr><td> <b>Drivers Cost :</b></td><td>Rs. <?php echo $vehicletype['DriverCost'];?> per KM</td></tr>
    <tr><td> <b>Mielage of truck :</b></td><td>Rs. <?php echo $vehicletype['Mileage'];?>  KM/L </td></tr>
</table>

<h3 class="heading-3 text-danger">Cost dependent on Other Factors</h3>

    <!-- displaying all the global factors -->
<table class="table table-striped">
    <?php
        $globalrs=mysqli_query($conn,"select * from globaltable") or die(mysqli_error($conn));
        while($globalq=mysqli_fetch_assoc($globalrs)){
    ?>
    <tr><td> <b><?php echo $globalq['myKeys'];?> :</b></td><td><?php echo $globalq['myValues'];?>%</td></tr>
<?php } ?>
</table>


</div>


<!-- calculation of costs and displaying them -->


<!-- calculation fuel cost per km -->
<?php $fuelpkm= (1/ (float)$vehicletype['Mileage'])*$fuelprc;

 ?>


<h3 class="heading-3 text-danger">Calculation Of all the factors</h3>
<table class="table">
<tr>
    <th>Factor</th><th>Cost/KM</th><th>Total Cost</th> <!-- table heading -->
</tr>

<!-- fuel price per km and total -->
<tr>
    <td>Fuel Price</td> <td><?php echo $fuelpkm;?></td> <td><?php echo $fuelpkm*$km ?></td>
</tr>

<!-- toll price per km and total -->
<tr>
    <td>Toll Price</td><td><?php echo $cost/$km;?></td><td><?php echo $cost;?></td>
</tr>


<!-- EMI cost per  km and total -->
<tr>
    <td>EMI</td><td>Rs. <?php echo $vehicletype['EMI'];?> per KM</td><td><?php echo (float)$vehicletype['EMI']*$km;?></td>
</tr>



<!-- Tyre, maintenance cost per  km and total -->
<tr>
    <td>Tyre & maintenance</td><td>Rs. <?php echo $vehicletype['Maintenance']+$vehicletype['Tyre'];?></td><td><?php echo (float)$km*( $vehicletype['Maintenance']+$vehicletype['Tyre']);?></td>
</tr>


<!-- Driver cost per  km and total -->
<tr>
    <td>Drivers Cost</td><td>Rs. <?php echo $vehicletype['DriverCost'];?></td><td><?php echo $km*$vehicletype['DriverCost'];?></td>
</tr>

<!-- Adding up all these costs calculated above -->
<?php 

$totalcostperkm=($cost/$km)+$fuelpkm+$vehicletype['DriverCost']+$vehicletype['Maintenance']+$vehicletype['Tyre']+$vehicletype['EMI'];

$totalcost=$cost+($fuelpkm+$vehicletype['DriverCost']+$vehicletype['Maintenance']+$vehicletype['Tyre']+$vehicletype['EMI'])*$km;

// $costperkg=$totalcost/($vehicletype['Capacity']*1000);

?>


<!-- adding up the global factors cost (in percentage) -->

<?php
        $percentofglobal=0;
        $globalrs=mysqli_query($conn,"select * from globaltable") or die(mysqli_error($conn));
        while($globalq=mysqli_fetch_assoc($globalrs)){
            $percentofglobal+=$globalq['myValues'];
         } 
        $globalpercentcostperkm=($totalcostperkm*$percentofglobal)/100;
?>




<!-- global factors cost per km and total -->
<tr>
    <td>Cost by global factors :</td><td>Rs. <?php echo $globalpercentcostperkm; ?></td><td><?php echo $globalpercentcostperkm*$km; ?></td>
</tr>


<!-- adding up global costs to total costs -->
<?php 
    $totalcostperkm+=$globalpercentcostperkm;
    $totalcost+=$globalpercentcostperkm*$km;
    $costperkg=$totalcost/($vehicletype['Capacity']*1000);
?>

<!-- getting the costs for unpredictable factors -->
<?php
        $percentofcomp=0;
        // cost per percent for unpredictable factors
        $comprperc=mysqli_query($conn,"select * from companykeys where compkeys like 'cost per percent for unpredictable factors'") or die(mysqli_error($conn));
        $comprperc=mysqli_fetch_assoc($comprperc);

        // getting the unpredictable factors at from location
    	$effect=mysqli_query($conn,"select sum(Effect) from reports where BranchId=$stn1Id") or die(mysqli_error($conn));
    	$effect=mysqli_fetch_assoc($effect)['sum(Effect)'];
        // effect * cost per percent for unpredictable factors
        $percentofcomp+=$effect*($comprperc['compvalues']/$km); 
        // $compcostpereffect=($totalcostperkm*$percentofcomp)/100;
        	$compcostpereffect=$percentofcomp;
 ?>

 <!-- unpredictable factors cost per km and total -->
<tr>
    <td>Unpredictable Factor Cost :</td><td>Rs. <?php echo $compcostpereffect; ?></td><td><?php echo $compcostpereffect*$km; ?></td>
</tr>

<!-- adding up unpredictable factors costs to total costs -->
<?php
    $totalcostperkm+=$compcostpereffect;
    $totalcost+=$compcostpereffect*$km;
    $costperkg=$totalcost/($vehicletype['Capacity']*1000);
?>

<?php
        $percentofcomp=0;
        //cost per percent for demand
        $comprperc=mysqli_query($conn,"select * from companykeys where compkeys like 'cost per percent for demand'") or die(mysqli_error($conn));
        $comprperc=mysqli_fetch_assoc($comprperc);
        // getting the demand at from station
		$demandeffect=mysqli_query($conn,"select * from demands where Hub_id=$stn1Id") or die(mysqli_error($conn));
		$demandeffect=mysqli_fetch_assoc($demandeffect)['demand'];

        // demand * cost per percent for demand
        $percentofcomp+=$demandeffect*($comprperc['compvalues']/$km); 
        // $compcostperdemand=($totalcostperkm*$percentofcomp)/100;	
        $compcostperdemand=$percentofcomp;
?>


<!-- demand factors cost per km and total -->
<tr>
    <td>Demand Factor Cost :</td><td>Rs. <?php echo $compcostperdemand; ?></td><td><?php echo $compcostperdemand*$km; ?></td>
</tr>

<?php
    $totalcostperkm+=$compcostperdemand;
    $totalcost+=$compcostperdemand*$km;
    $costperkg=$totalcost/($vehicletype['Capacity']*1000);
?>

<!-- displaying the total cost uptill now -->
<tr>
    <td>Total cost :</td><td>Rs. <?php echo $totalcostperkm; ?></td><td><?php echo $totalcost; ?></td>
</tr>

<!-- getting the weather charges of company -->
<?php
        $percentofcomp=0;
        //echo $weather;
       
        // adding weather effect to handling charges in percentage
        $percentofcomp+=$weather;
        // calculating the handling cost from total cost
        $compcostperkmweather=($totalcostperkm*$percentofcomp)/100;
 ?>

<!-- handling charges cost per km and total -->
<tr>
    <td>weather Charges :</td><td>Rs. <?php echo $compcostperkmweather; ?></td><td><?php echo $compcostperkmweather*$km; ?></td>
</tr>

<!-- adding up handlig costs to total costs -->
<?php
    $totalcostperkm+=$compcostperkmweather;
    $totalcost+=$compcostperkmweather*$km;
    $costperkg=$totalcost/($vehicletype['Capacity']*1000);
?>


<!-- diplaying the total cost -->
<tr>
    <td><b>Total cost :</b></td><td>Rs. <?php echo $totalcostperkm; ?></td><td><?php echo $totalcost; ?></td>
</tr>



<!-- diplaying the cost per kg -->
<tr>
    <td><b>cost per kg :</b></td><td>Rs. <?php echo $costperkg; ?></td>
</tr>



</table>
</div>
</div>
</div>
<?php
    // returning cost per kg
    return $costperkg;
}


?>
