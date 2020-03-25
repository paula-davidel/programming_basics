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

    public function __construct()
    {
        echo "Creating new product<br/>";
        $this->color = "blue";
    }
}

$shirt = new Product();
echo $shirt->color;