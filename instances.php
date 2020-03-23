<?php

class Student
{
    //the class is empty
}

//instantiation

$student1 = new Student();
$student2 = new Student();
echo "student1 is a ".get_class($student1)." class.<br>"."student2 is a ".get_class($student2)." class <br>";

$class_names = ["Product","Student","student"];
foreach($class_names as $class_name)
{
    if(is_a($student1,$class_name))
    {
        echo "student1 is a {$class_name} class. <br>" ;
    }
    else
    {
        echo "student1 is not a {$class_name} class. <br>" ;
    }
}
?>