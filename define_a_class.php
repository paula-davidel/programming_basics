<?php

class Student
{
    //the class is empty
}

$classes =get_declared_classes();
echo "<pre>";
print_r($classes);
echo "</pre><br><br>";

$class_names = ["Product","Student","student"];
foreach($class_names as $class_name)
{
    if(class_exists($class_name))
    {
        echo "{$class_name} is a declared class. <br>" ;
    }
    else
    {
        echo "{$class_name} is not a declared class. <br>" ;
    }
}
?>