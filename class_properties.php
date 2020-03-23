<h3><center>Class properties</center></h3>
<?php

class Person
{
    var $first_name;
    var $last_name;
    var $country = "Spanish";
}

//instantiation
$customer1 = new Person();
// set attributes
$customer1->first_name ="Paula";
$customer1->last_name = "Davidel";

$customer2 = new Person();
$customer2->first_name = "Alexandra";
$customer2->last_name ="Popescu";

echo "Hello everybody ! <br><br>";
echo "<br><br>The customers are: <br><ul><li>{$customer1->first_name} {$customer1->last_name} from {$customer1->country}</li><li>{$customer2->first_name} {$customer2->last_name} from {$customer2->country}</li></ul><br><br>";
echo "The default value for the property 'country' is: ".$customer1->country."<br>";
$customer1->country = "Romania";
echo "<br> The new country for the customer: {$customer1->first_name}  {$customer1->last_name} is {$customer1->country}";
echo "<br><br>The customers are: <br><ul><li>{$customer1->first_name} {$customer1->last_name} from {$customer1->country}</li><li>{$customer2->first_name} {$customer2->last_name} from {$customer2->country}</li></ul><br><br>";

//functions for properties
$class_vars = get_class_vars("Person");
echo "// By default: <br><pre>";print_r($class_vars);echo "</pre>";

$object_vars1 = get_object_vars($customer1);
echo "// After instantiation and initialization<br><br>";
echo "For {$customer1->first_name} {$customer1->last_name}: <pre>";print_r($object_vars1);echo "</pre>";
$object_vars2 = get_object_vars($customer2);
echo "For {$customer2->first_name} {$customer2->last_name}: <pre>";print_r($object_vars2);echo "</pre>";

?><?php
