<?php
//Inheritance
class User
{
    var $is_admin = false;
    var $first_name;
    var $last_name;
    var $username;

    function full_name()
    {
        return $this->first_name." ".$this->last_name;
    }
}

class Customer extends User
{
    var $city;
    var $state;
    var $country;

    function location()
    {
        return $this->city." , ".$this->state." , ".$this->country;
    }
}

class AdminUser extends User
{
    var $is_admin = true;
    function full_name()
    {
        return $this->first_name." ".$this->last_name." (admin)";
    }
}

//Instantiation

$admin = new AdminUser();
$admin->first_name ="Ana";
$admin->last_name ="Gerorgescu";
$admin->username="ageorgescu";

echo "<h3><center>Dear {$admin->full_name()}<br/><br/></center></h3>";

$customer = new Customer();
$customer->first_name="Paula";
$customer->last_name ="Davidel";
$customer->username="pdavidel";
$customer->city = "Iasi";
$customer->state = "Iasi";
$customer->country ="Romania";
echo "The new customer is: {$customer->full_name()}<br/>";
echo "The address is the following: {$customer->location()}.<br/>";