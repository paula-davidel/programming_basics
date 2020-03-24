<?php

echo ini_get('display_errors');
// It's set to dysplay the errors
if (!ini_get('display_errors')) {
    ini_set('display_errors', '1');
}

?>
<?php

class Bicycle
{
    public static $instances_count = 0;

    public const CATEGORIES = ["Road","Mountain","Hybrid","Cruiser","City","BMX"];
    public $category;
    public $brand;
    public $model;
    public $year;
    public $description;
    private $weight_kg = 0.0;
    public static $wheels = 2;

    public function name()
    {
        return "Brand: {$this->brand} <br> Model: {$this->model} <br> Year: {$this->year} <br> ";
    }

    public static function wheels_details()
    {
        $wheel_string = "";
        if(static::$wheels == 1)
        {
            $wheel_string .="1 wheel";
        }
        else
        {
            $wheel_string .= static::$wheels." wheels";
        }
        return "It has {$wheel_string} ! <br/>";
    }

    public function set_weight_kg($value)
    {
        $this->weight_kg = $value;
    }

    public function weight_kg()
    {
        return $this->weight_kg." kg ";
    }

    public function set_weight_lbs($lbs)
    {
        $weight_kg = floatval($lbs) / 2.2046226218;
        return $weight_kg;
    }

    public function weight_lbs()
    {
        $conversion_into_lbs = floatval($this->weight_kg) * 2.2046226218;
        return $conversion_into_lbs." lbs <br/>";
    }

    public static function create()
    {
        $classes = get_called_class(); //show us what class is called
        $object = new $classes;
        self::$instances_count++;
        return $object;
    }
}

class Unicycle extends Bicycle
{
    // we can't change the visibity as we're inheriting it
    public static $wheels = 1;
}

$trek = new Bicycle();
$trek->brand ="Trek";
$trek->model = "Emonda";
$trek->year = "2017";

// before runtime
echo "Bicycle:".Bicycle::$instances_count."<br/>";
echo "Unicycle:".Unicycle::$instances_count."<br/>";
echo "<hr/>";

$bike = Bicycle::create();
$unicycle = Unicycle::create();

// after runtime
echo "Bicycle:".Bicycle::$instances_count."<br/>";
echo "Unicycle:".Unicycle::$instances_count."<br/>";
echo "<hr/>";

echo 'Categories: <pre>'; print_r(Bicycle::CATEGORIES); echo "</pre>";
$trek->category = Bicycle::CATEGORIES[0];
echo "<br/>Category: {$trek->category} <br/>";
echo "<hr/>";

echo "Bicycle:".Bicycle::wheels_details()."<br/>";
echo "Unicycle:".Unicycle::wheels_details()."<br/>";
echo "<hr/>";