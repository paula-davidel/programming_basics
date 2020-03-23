<?php
//Inheritance
class User
{
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
    var $role;

    function get_role()
    {
        return $this->role;
    }
}

class Privilegies extends Customer
{

}
//Instantiation

$user = new User();
$user->first_name ="Ana";
$user->last_name ="Gerorgescu";
$user->username="ageorgescu";

$customer = new Customer();
$customer->first_name="Paula";
$customer->last_name ="Davidel";
$customer->username="pdavidel";
$customer->role = "admin";

$privilegies = new Privilegies();

echo "Hello {$user->full_name()} ({$user->username})<br>";
echo "New Customer is: {$customer->full_name()} ({$customer->username})<br>";

// Get parent class

echo get_parent_class($user)."<br>";
echo get_parent_class($customer)."<br>";

if(is_subclass_of($customer,'User'))
{
    echo "Instance is a subclass of User class. <br/>";
}

$parent = class_parents($customer);
echo "<pre>";print_r($parent);echo "</pre>";
echo "<br/><br/>";

//It shows the properties and methods declared in classes, and isn't instantiated
// It used the functions : get_class_vars("NameClass"); / get_class_methods("NameClass");

echo "<h1>Before Instantiation</h1><br/>";
echo "<h2>The properties and methods for User Class: <br/>";
echo "<pre>"; $get_vars = get_class_vars("User"); print_r($get_vars);echo "</pre><br/>";
echo "<pre>"; $get_methods = get_class_methods("User"); print_r($get_methods);echo "</pre><br/>";

echo "<h2>The properties and methods for Customer Class: <br/>";
echo "<pre>"; $get_vars = get_class_vars("Customer"); print_r($get_vars);echo "</pre><br/>";
echo "<pre>"; $get_methods = get_class_methods("Customer"); print_r($get_methods);echo "</pre><br/>";

echo "<h2>The properties and methods for Privilegies Class: <br/>";
echo "<pre>"; $get_vars = get_class_vars("Privilegies"); print_r($get_vars);echo "</pre><br/>";
echo "<pre>"; $get_methods = get_class_methods("Privilegies"); print_r($get_methods);echo "</pre><br/>";

echo "<br/><br/>";

//It shows the properties declared in classes, and is instantiated (the methods are the same)
// It used the functions : get_object_vars($instanceOfClass);

echo "<h1>After Instantiation</h1>";
echo "<h4>I didn't show the methods, because they are the same</h4><br/>";
echo "<h2>The properties for User Class: <br/>";
echo "<pre>"; $get_vars = get_object_vars($user); print_r($get_vars);echo "</pre><br/>";

echo "<h2>The properties for Customer Class: <br/>";
echo "<pre>"; $get_vars = get_object_vars($customer); print_r($get_vars);echo "</pre><br/>";

echo "<h2>The properties for Privilegies Class: <br/>";
echo "<pre>"; $get_vars = get_object_vars($privilegies); print_r($get_vars);echo "</pre><br/>";
