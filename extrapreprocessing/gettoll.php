
<?php

        require 'conn.inc.php';
?>

<?php


	$stn1=$_GET['stn1'];
	$stn2=$_GET['stn2'];


$url="http://tis.nhai.gov.in/UploadHandler.ashx?Up=3&Source=".$stn1.",&Destination=".$stn2."&waypoints=";
    $url = str_replace(" ", "%20", $url);
    // $homepage = file_get_contents($url);
    // print_r($homepage);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
    $data = curl_exec($ch);
    curl_close($ch);

    echo $data;

?>