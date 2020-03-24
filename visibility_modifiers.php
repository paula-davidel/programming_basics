<?php

echo ini_get('display_errors');
// It's set to dysplay the errors
if (!ini_get('display_errors')) {
    ini_set('display_errors', '1');
}

?>

<?php
class User
{
    private $is_admin = false;
    public $first_name;
    public $last_name;
    protected $registration_id;
    private $tuition = 0.00;

    private function has_admin_access()
    {
        return $this->is_admin === true;
    }

    public function access_level()
    {
        return $this->has_admin_access() ? "Admin" : "Standard";
    }

    public function hello_world()
    {
        return "<h3><center>Hello World! </center></h3>";
    }

    protected function hello_family()
    {
        return "<h3><center>Hello family! </center></h3>";
    }

    private function hello_me()
    {
        return "<h3><center>Hello me! </center></h3>";
    }

    public function full_name()
    {
        return "<h3><center> Welcome ".$this->first_name." ".$this->last_name." ! </center></h3> ";
    }
}

class PartTime extends User
{
    //I access a protected method from User class
    public function hello_parent()
    {
        return $this->hello_family();
    }
}

$user = new User();
$user->first_name ="Paula";
$user->last_name="Davidel";

$parttime= new PartTime();

echo "{$user->hello_world()} <br/>";
//echo "{$user->hello_family()} <br/>";
//echo "{$user->hello_me()} <br/>";
echo "{$user->full_name()} <center> ( {$user->access_level()} ) </center>.<br/>";
//echo "{$user->registration_id} <br/>";
//echo "{$user->tuition} <br/>";

echo "{$parttime->hello_parent()} <br/>";