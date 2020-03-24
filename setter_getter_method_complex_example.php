<?php

class Product
{
    private $price;

    public function set_price($price)
    {
        $no_format = preg_replace("/[\$,]/"," ",$price);
        $float=floatval($no_format);
        if($float <=0)
        {
            trigger_error("Price must be greater than zero.", E_USER_NOTICE);
            return;
        }
        $this->price = $float;
    }

    public function get_price()
    {
        return number_format($this->price,2);
    }
}

$product = new Product();
$product->set_price(23);
echo $product->get_price();
?>