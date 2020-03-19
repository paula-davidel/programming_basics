<h3><center>Arrays</center></h3>
<br>
<?php

$numbers = array(2,8,15,16,23,42);
echo "Get first element from array: ".$numbers[0];
?>
<br>
<?php
$mixed = array(6,"fox","dog",array("x","y","z"));
echo $mixed[2]."<br><pre>";
print_r($mixed);
echo "</pre><br>";
?>

<br>
<h3><center>Associative Arrays</center></h3>
<?php
$assoc_array = array (
        "first_name" => "Paula",
        "last_name" => "Davidel"
);
echo "Fist Name: ".$assoc_array["first_name"]."<br>Last Name: ".$assoc_array["last_name"]."<br>";
echo "First Customer: ".$assoc_array["first_name"]." ".$assoc_array["last_name"]."<br><br>";
$assoc_array["last_name"] ="Burduja";
echo "Fist Name: ".$assoc_array["first_name"]."<br>Last Name: ".$assoc_array["last_name"]."<br>";
echo "Second Customer: ".$assoc_array["first_name"]." ".$assoc_array["last_name"]."<br>";
?>
<br><h3><center>Example :</center></h3>
Array: <br>
<?php
$numbers = array(2,8,15,16,23,42);//array
echo "<pre>";
print_r($numbers);
echo "</pre>";
?>
<br><br>
<?php
echo "Associative Array, where the key is a integer: <br>";
$numbers = array(
        0 => 2,
        1 => 8,
        2 => 15,
        3 => 16,
        4 => 23,
        5 => 42
); //associative array
echo "<pre>";
print_r($numbers);
echo "</pre>";
?>
