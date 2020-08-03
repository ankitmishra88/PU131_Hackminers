


  


<?php


	function displayAll($first,$second,$conn,$index){
       
	   
			
        $state11=mysqli_query($conn,"select * from locations where branch like '$first'") or die(mysqli_error($conn));
        $state11=mysqli_fetch_assoc($state11);
        $state1=$state11['State'];
        $city1=$state11['City'];
		$stn1Id=$state11['Identity'];
        $weather1=getWeather($city1);
        $state22=mysqli_query($conn,"select *  from locations where branch like '$second'") or die(mysqli_error($conn));
        $state22=mysqli_fetch_assoc($state22);
        $state2=$state22['State'];
        $city2=$state22['City'];
        $weather2=getWeather($city2);
        $weather=($weather1+$weather2)/2;

        $fuelpr=mysqli_query($conn,"SELECT AVG(fuelPrice) FROM `statenames` WHERE `StateCode` like '$state1' or `StateCode` like '$state2'") or die(mysqli_error($conn));
        $fuelprc=mysqli_fetch_assoc($fuelpr);
        $fuelprc=$fuelprc['AVG(fuelPrice)'];

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
<div class="card mt-3">
    <div class="card-header" id="heading<?php echo $index;?>">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $index;?>" aria-expanded="true" aria-controls="collapse<?php echo $index;?>">
           <?php echo $first;?> - <?php echo $second; ?>
        </button>
      </h5>
    </div>
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

<h3 class="heading-3 text-danger">Costs dependent on Route</h3>
<table class="table">
    <tr><td> <b>Total Toll Cost for <?php echo $vehicletype['VehicleMode'] ;?> Vehicle :</b></td><td> Rs. <?php echo $cost;?></td></tr>
    <tr><td> <b>Total Kms to be travelled:</b></td><td><?php echo $km;?> Kms</td></tr>
    <tr><td><b> Time of Travelling :</b></td><td><?php echo $time;?></td></tr>
</table>

<h3 class="heading-3 text-danger">Costs dependent on Vehicle</h3>
<table class="table table-striped">

    <tr><td> <b>Tyre :</b></td><td>Rs. <?php echo $vehicletype['Tyre'];?> per KM</td></tr>
    <tr><td> <b>EMI/Profit :</b></td><td>Rs. <?php echo $vehicletype['EMI'];?> per KM</td></tr>
    <tr><td> <b>Maintenance :</b></td><td>Rs. <?php echo $vehicletype['Maintenance'];?> per KM</td></tr>
    <tr><td> <b>Drivers Cost :</b></td><td>Rs. <?php echo $vehicletype['DriverCost'];?> per KM</td></tr>
    <tr><td> <b>Mielage of truck :</b></td><td>Rs. <?php echo $vehicletype['Mileage'];?>  KM/L </td></tr>
</table>

<h3 class="heading-3 text-danger">Cost dependent on Other Factors</h3>
<table class="table table-striped">
    <?php
        $globalrs=mysqli_query($conn,"select * from globaltable") or die(mysqli_error($conn));
        while($globalq=mysqli_fetch_assoc($globalrs)){
    ?>
    <tr><td> <b><?php echo $globalq['myKeys'];?> :</b></td><td><?php echo $globalq['myValues'];?>%</td></tr>
<?php } ?>
</table>

<h3 class="heading-3 text-danger">Company Expenses</h3>
<table class="table table-striped">
    <?php
        $globalrs=mysqli_query($conn,"select * from companykeys limit 3") or die(mysqli_error($conn));
        while($globalq=mysqli_fetch_assoc($globalrs)){
    ?>
    <tr><td> <b><?php echo $globalq['compkeys'];?> :</b></td><td><?php echo $globalq['compvalues'];?>%</td></tr>
<?php } ?>
</table>


</div>

<?php $fuelpkm= (1/ (float)$vehicletype['Mileage'])*$fuelprc; ?>
<h3 class="heading-3 text-danger">Calculation Of all the factors</h3>
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
<?php $totalcostperkm=($cost/$km)+$fuelpkm+$vehicletype['DriverCost']+$vehicletype['Maintenance']+$vehicletype['Tyre']+$vehicletype['EMI'];
$totalcost=$cost+($fuelpkm+$vehicletype['DriverCost']+$vehicletype['Maintenance']+$vehicletype['Tyre']+$vehicletype['EMI'])*$km;
// $costperkg=$totalcost/($vehicletype['Capacity']*1000);
?>
<?php
$percentofglobal=0;
        $globalrs=mysqli_query($conn,"select * from globaltable") or die(mysqli_error($conn));
        while($globalq=mysqli_fetch_assoc($globalrs)){
    $percentofglobal+=$globalq['myValues'];
 } 
$globalpercentcostperkm=($totalcostperkm*$percentofglobal)/100;
 ?>

<tr>
    <td>Cost by global factors :</td><td>Rs. <?php echo $globalpercentcostperkm; ?></td><td><?php echo $globalpercentcostperkm*$km; ?></td>
</tr>
<?php $totalcostperkm+=$globalpercentcostperkm;
$totalcost+=$globalpercentcostperkm*$km;
$costperkg=$totalcost/($vehicletype['Capacity']*1000);
?>



<?php
$totalcostperkm+=$globalpercentcostperkm;
$totalcost+=$globalpercentcostperkm*$km;
$costperkg=$totalcost/($vehicletype['Capacity']*1000);
?>

<?php
$percentofcomp=0;
        $comprperc=mysqli_query($conn,"select * from companykeys where compkeys like 'cost per percent for unpredictable factors'") or die(mysqli_error($conn));
        $comprperc=mysqli_fetch_assoc($comprperc);
		$effect=mysqli_query($conn,"select sum(Effect) from reports where BranchId=$stn1Id") or die(mysqli_error($conn));
		$effect=mysqli_fetch_assoc($effect)['sum(Effect)'];
    $percentofcomp+=$effect*($comprperc['compvalues']/$km); 
$compcostpereffect=($totalcostperkm*$percentofcomp)/100;
 ?>
<tr>
    <td>Unpredictable Factor Cost :</td><td>Rs. <?php echo $compcostpereffect; ?></td><td><?php echo $compcostpereffect*$km; ?></td>
</tr>
<?php
$totalcostperkm+=$compcostpereffect;
$totalcost+=$compcostpereffect*$km;
$costperkg=$totalcost/($vehicletype['Capacity']*1000);
?>


<?php
$percentofcomp=0;
        $comprperc=mysqli_query($conn,"select * from companykeys where compkeys like 'cost per percent for demand'") or die(mysqli_error($conn));
        $comprperc=mysqli_fetch_assoc($comprperc);
		$demandeffect=mysqli_query($conn,"select * from demands where Hub_id=$stn1Id") or die(mysqli_error($conn));
		$demandeffect=mysqli_fetch_assoc($demandeffect)['demand'];
    $percentofcomp+=$demandeffect*($comprperc['compvalues']/$km); 
$compcostperdemand=($totalcostperkm*$percentofcomp)/100;
 ?>
<tr>
    <td>Demand Factor Cost :</td><td>Rs. <?php echo $compcostperdemand; ?></td><td><?php echo $compcostperdemand*$km; ?></td>
</tr>
<?php
$totalcostperkm+=$compcostperdemand;
$totalcost+=$compcostperdemand*$km;
$costperkg=$totalcost/($vehicletype['Capacity']*1000);
?>

<tr>
    <td>Total cost :</td><td>Rs. <?php echo $totalcostperkm; ?></td><td><?php echo $totalcost; ?></td>
</tr>
<?php
$percentofcomp=0;
//echo $weather;
        $comprshand=mysqli_query($conn,"select * from companykeys where compkeys like 'handling'") or die(mysqli_error($conn));
        $comprshand=mysqli_fetch_assoc($comprshand);
    $percentofcomp+=$comprshand['compvalues']; 
    $percentofcomp+=$weather;
$compcostperkmhandling=($totalcostperkm*$percentofcomp)/100;
 ?>
<tr>
    <td>Handling Charges :</td><td>Rs. <?php echo $compcostperkmhandling; ?></td><td><?php echo $compcostperkmhandling*$km; ?></td>
</tr>
<?php
$totalcostperkm+=$compcostperkmhandling;
$totalcost+=$compcostperkmhandling*$km;
$costperkg=$totalcost/($vehicletype['Capacity']*1000);
?>
<?php
$percentofcomp=0;
    $comprshand=mysqli_query($conn,"select * from companykeys where compkeys like 'margin'") or die(mysqli_error($conn));
    $comprshand=mysqli_fetch_assoc($comprshand);
    $percentofcomp+=$comprshand['compvalues'];
 
$compcostperkmmargin=($totalcostperkm*$percentofcomp)/100;
 ?>
<tr>
    <td>Margin Charges :</td><td>Rs. <?php echo $compcostperkmmargin; ?></td><td><?php echo $compcostperkmmargin*$km; ?></td>
</tr>
<?php
$totalcostperkm+=$compcostperkmmargin;
$totalcost+=$compcostperkmmargin*$km;
$costperkg=$totalcost/($vehicletype['Capacity']*1000);
?>

<?php
$percentofcomp=0;
    $comprshand=mysqli_query($conn,"select * from companykeys where compkeys like 'surcharges'") or die(mysqli_error($conn));
    $comprshand=mysqli_fetch_assoc($comprshand);
    $percentofcomp+=$comprshand['compvalues'];
 
$compcostperkmSURcharge=($totalcostperkm*$percentofcomp)/100;
 ?>
<tr>
    <td>Surcharges Charges :</td><td>Rs. <?php echo $compcostperkmSURcharge; ?></td><td><?php echo $compcostperkmSURcharge*$km; ?></td>
</tr>
<?php
$totalcostperkm+=$compcostperkmSURcharge;
$totalcost+=$compcostperkmSURcharge*$km;
$costperkg=$totalcost/($vehicletype['Capacity']*1000);
?>

<tr>
    <td><b>Total cost :</b></td><td>Rs. <?php echo $totalcostperkm; ?></td><td><?php echo $totalcost; ?></td>
</tr>
<tr>
    <td><b>cost per kg :</b></td><td>Rs. <?php echo $costperkg; ?></td>
</tr>

</table>
</div>
</div>
</div>
<?php

    return $costperkg;
}


?>