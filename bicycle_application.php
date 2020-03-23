<?php

class Bicycle
{
    var $brand;
    var $model;
    var $year;
    var $description;
    var $weight_kg = 0.0;

    function name()
    {
        return "Brand: {$this->brand} <br> Model: {$this->model} <br> Year: {$this->year}<br> ";
    }

    function weight_lbs()
    {
        $conversion_into_lbs = floatval($this->weight_kg) * 2.2046226218;
        return $conversion_into_lbs;
    }

    public function set_weight_lbs($lbs)
    {
        $weight_kg = floatval($lbs) / 2.2046226218;
        return $weight_kg;
    }
}

$trek = new Bicycle();
$trek->brand ="Trek";
$trek->model = "Emonda";
$trek->year = "2017";
$trek->weight_kg = 1.0;


$cd = new Bicycle();
$cd->brand ="Cannondale";
$cd->model = "Syynapse";
$cd->year = "2018";
$cd->weight_kg = 8.0;

echo "<ul><li><h4>First bicycle </h4></li><br>".$trek->name()." <br> Has {$trek->weight_kg} kg equivalent to  ".$trek->weight_lbs() ." lbs.<br><br>";
echo "<li><h4>Second bicycle </h4></li><br>".$cd->name()."<br> Has {$cd->weight_kg} kg equivalent to ". $cd->weight_lbs()." lbs.<br>";

$new_weight = $cd->set_weight_lbs(2);

echo "After reset the value of weight_kg property for the second bicycle: <br>";
echo "<br><li><h4> The second bicycle </h4></li></ul><br> {$cd->name()} <br> Has {$new_weight} kg.<br>";