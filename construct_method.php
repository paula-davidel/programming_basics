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
//    public function __construct($name,$color)
//    {
//        echo "Creating new product<br/>";
//        $this->name = $name;
//        $this->color = $color;
//    }

    //If we have more arguments , we use this syntax
    public function __construct($args=[])
    {
        echo "Creating new product<br/>";
        $this->name = $args['name'] ?? NULL;
        $this->color = $args['color'] ?? NULL;
        $this->price = $args['price'] ?? NULL;
    }
}

//$shirt = new Product("T-shirt","red");

$shirt = new Product(["name"=>"T-shirt","color"=>"red","price"=>10.00]);
echo "<pre>";print_r($shirt);echo "</pre>";