<?php

echo ini_get('display_errors');
// It's set to dysplay the errors
if (!ini_get('display_errors'))
{
    ini_set('display_errors', '1');
}
?>

<?php

class Bicycle
{
    public const CATEGORIES = ["Road","Mountain","Hybrid","Cruiser","City","BMX"];
    protected const CONDITION = ["Beat Up","Decent","Good","Great","Like New"];
//    public const GENDERS = ["Men","Women","Unisex"];
    public $brand;
    public $model;
    public $year;
    public $category;
    public $color;
    public $description;
    public $gender;
    public $price;
    protected $weight_kg;
    protected $condition_id;

    public function __construct($args=[])
    {
        $this->brand = $args["brand"] ?? " ";
        $this->model = $args["model"] ?? " ";
        $this->year = $args["year"] ?? " ";
        $this->category = $args["category"] ?? " ";
        $this->color = $args["color"] ?? " ";
        $this->description = $args["description"] ?? " ";
        $this->gender = $args["gender"] ?? " ";
        $this->price = $args["price"] ?? 0;
        $this->weight_kg = $args["weight_kg"] ?? 0.00;
        $this->condition_id = $args["condition_id"] ?? 3;
    }

    public function weight_kg()
    {
        return number_format($this->weight_kg,2)." kg <br>";
    }

    public function set_weight_kg($weight)
    {
        $this->weight_kg = floatval($weight);
    }

    public function weight_lbs()
    {
        return (floatval($this->weight_kg) * 2.2046226218)." lbs <br/>";
    }

    public function set_weight_lbs($lbs)
    {
        $this->weight_kg = floatval($lbs) / 2.2046226218;
    }

    public function condition()
    {
        if($this->condition_id > 0)
        {
            return self::CONDITION[$this->condition_id];
        }
        else
        {
            return "Unknown";
        }
    }
}

$bicycle = new Bicycle(["condition_id" => 4]);
$bicycle->brand = "Trek";
//The initial conditions
echo "<pre>"; print_r($bicycle); echo "</pre>";
$bicycle->set_weight_kg(5);
echo $bicycle->weight_kg() . "<br/>". $bicycle->weight_lbs()."<br/>";
echo $bicycle->condition();