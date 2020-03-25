<?php

echo ini_get('display_errors');
// It's set to dysplay the errors
if (!ini_get('display_errors')) {
    ini_set('display_errors', '1');
}

?>

<?php

class Beverage
{
    public $name;

    public function __construct()
    {
        echo "<h5> The text was written in the method __construct() </h5> The new beverage was created ! <br>";
    }

    public function __clone()
    {
        echo "<h5> The text was written in the method __clone() </h5> Existing beverage was copied ! <br/>";
    }
}

$new_beverage = new Beverage();
//set the property 'name'
$new_beverage->name ="coffee";

echo "<br/>The beverage is {$new_beverage->name}<br/>";

echo "<br/><hr/><br/>";

$existing_beverage = clone $new_beverage;

echo "The initial beverage is: {$new_beverage->name} <br/>";
echo "The clone beverage is: {$existing_beverage->name} <br/>";
echo "<br/><hr/><br/>";
$existing_beverage->name= "tea";
echo "<h4>TASK: Change the beverage that was copied ! </h4>";

echo "The initial beverage is: {$new_beverage->name} <br/>";
echo "The clone beverage is: {$existing_beverage->name} <br/>";

echo "<br/><hr/><br/>";
$c = $new_beverage;
$c->name ="orange juice";
echo "The first object: {$new_beverage->name} <br/>";
// BECAUSE $existing_beverage is a clone for the $new_beverage, they are separated instances, so when I changed the value of the property 'name' for the variable $c, that is equal to $new_beverage,
// it was change automatically the value of the property 'name' for the $new_beverage, and the value of the property 'name' for the variable $existing_beverage, that is copied, doesn't change.
echo "The second object: {$existing_beverage->name} <br/>";
echo "The third object: {$c->name} <br/>";