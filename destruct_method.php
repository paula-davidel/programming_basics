<?php

echo ini_get('display_errors');
// It's set to dysplay the errors
if (!ini_get('display_errors')) {
    ini_set('display_errors', '1');
}

?>

<?php

class Product
{
    public $name;
    public $color;
    public $price;

    public static $instance_count = 0;

    //If we have more arguments , we use this syntax
    public function __construct($args=[])
    {
        echo "<h2>Creating new product</h2><br/>";
        self::$instance_count++;
        $this->name = $args['name'] ?? NULL;
        $this->color = $args['color'] ?? NULL;
        $this->price = $args['price'] ?? NULL;
    }

    public function __destruct()
    {
        echo "<h2>Deleting a product </h2><br/>";
        self::$instance_count--;
    }
}

//$shirt = new Product("T-shirt","red");

$shirt = new Product(["name"=>"T-shirt","color"=>"red","price"=>10.00]);
echo "<pre>";print_r($shirt);echo "</pre>";
// Before detroy the object
echo "<br/>Before we destroy the object<br/>Instance count: ".Product::$instance_count."<br/><br/><br/>";

unset($shirt);
echo "<br/>After we destroy the object<br/>Instance count: ".Product::$instance_count."<br/>";