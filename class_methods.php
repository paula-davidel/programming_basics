<?php

class Person
{
    //declare the properties
    var $first_name;
    var $last_name;

    //declare the method say_hello

    function say_hello()
    {
        return "<h3><center>Hello World! </center></h3>";
    }
}

//instantiation

$customer = new Person();

$customer->first_name ="Paula";
$customer->last_name ="Davidel";

echo  $customer->say_hello();

$class_method = get_class_methods("Person");

print_r($class_method);
//verify if a method exists in our class Person

if(method_exists('Person','say_hello'))
{
    echo "<br>Method say_hello exists in Person class. <br>";
}
else
{
    echo "<br>Method say_hello doesn't exist in Person class. <br>";
}