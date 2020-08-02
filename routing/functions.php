<?php

function getWeather($city){
    $city=explode('(',$city)[0]; // To take only first word from name with brackets like Gwalior(GWL)
    $city=str_replace(" ","%20",$city);
    $city=str_replace("_","%20",$city);
    // echo $city;
    $xmldoc=new DomDocument();
    $xmldoc->loadXML(file_get_contents("http://api.openweathermap.org/data/2.5/forecast?q={$city},India&mode=xml&appid=9de243494c0b295cca9337e1e96b00e2"));
    $loop=$xmldoc->getElementsByTagName('time');
    $precipitation=0;
    $count=0;
    foreach($loop as $time){
        $precipitation+=(float)($time->getElementsByTagName('precipitation')[0]->getAttribute('probability'));
        $count+=1;
    }
    if($count==0){
        return 0;
    }
    return $precipitation/$count;
}
// print_r(getWeather('New_delhi'));

?>