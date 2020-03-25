<?php

echo ini_get('display_errors');
// It's set to dysplay the errors
if (!ini_get('display_errors')) {
    ini_set('display_errors', '1');
}

?>

<?php

class Sofa
{
    public $seats = 3;
    public $arms = 2;

    public static $instance_count = 0;
    //MORE ARGUMENTS
    public function __construct($args=[])
    {
        self::$instance_count++; // it's a static property and call it inside the class
        $this->seats = $args['seats'] ?? $this->seats;
        $this->arms = $args['arms'] ?? $this->arms;
    }
}

class Couch extends Sofa
{
    public $arms = 1;
}

class Loveseat extends Sofa
{
    public $seats = 2;
}

$sofa = new Sofa(["seats" =>3,"arms"=>2]);
echo "Sofa <br/>";
echo " - seats {$sofa->seats} <br/>";
echo " - arms {$sofa->arms} <br/>";
echo "<br/>";

$couch = new Couch(["arms"=>1]);
echo "Couch <br/>";
echo " - seats {$couch->seats} <br/>";
echo " - arms {$couch->arms} <br/>";
echo "<br/>";

$loveseat = new Loveseat(["seats"=>2]);
echo "Sofa <br/>";
echo " - seats {$loveseat->seats} <br/>";
echo " - arms {$loveseat->arms} <br/>";
echo "<br/>";
// every time we call "new" it created a new instance of the object, then it called the construct magic method and then it returned the value of the instance count to me
echo "Instance count: ". Sofa::$instance_count."<br/>";