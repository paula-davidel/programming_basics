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
    public $brand;
    public $model;
    public $year;
    public $description;
    private $weight_kg = 0.0;
    protected $wheels = 2;

    public function name()
    {
        return "Brand: {$this->brand} <br> Model: {$this->model} <br> Year: {$this->year} <br> ";
    }

    public function wheels_details()
    {
        $wheel_string = "";
        if($this->wheels == 1)
        {
            $wheel_string .="1 wheel";
        }
        else
        {
            $wheel_string .= $this->wheels." wheels";
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

}

class Unicycle extends Bicycle
{
    // we can't change the visibity as we're inheriting it
    protected $wheels = 1;
}

$bicycle = new Bicycle();
$bicycle->brand ="Trek";
$bicycle->model = "Emonda";
$bicycle->year = "2017";
// Fatal error: Uncaught Error: Cannot access private property Bicycle::$weight_kg
//$trek->weight_kg = 1.0;

$unicycle = new Unicycle();

echo "Bicycle:".$bicycle->wheels_details()."<br/>";
echo "Unicycle:".$unicycle->wheels_details()."<br/>";
echo "<hr/>";

echo "Set weight for bicycle (kg): <br/><br/>";
//set weight (kg)
$bicycle->set_weight_kg(1);
echo $bicycle->weight_kg()." = ". $bicycle->weight_lbs()."<br/>";
echo "<hr/>";

echo "Set weight for unicycle (kg): <br/><br/>";
//set weight (kg)
$unicycle->set_weight_kg(3);
echo $unicycle->weight_kg()." = ". $unicycle->weight_lbs()."<br/>";
echo "<hr/>";