<?php

echo ini_get('display_errors');
// It's set to dysplay the errors
if (!ini_get('display_errors')) {
    ini_set('display_errors', '1');
}

?>

<?php

class Student
{
    public static $grades = ['Freshman','Sophomore','Junior','Senior'];
    private static $total_students = 110;

    public static function motto()
    {
        return "To learn PHP OOP! <br/>";
    }
    public static function count()
    {
        return self::$total_students;
    }

    public static function add_student()
    {
        return self::$total_students++;
    }
}

class PartTime extends Student
{

}

echo "<h3><center>".Student::motto()."</center></h3><br/>";
echo "Student class (the parent class) : ".Student::$grades[0];
// FRESHMAN

//echo Student::$total_students; //  Uncaught Error: Cannot access private property Student::$total_students
echo "<br/>Get the students number: ".Student::count();
echo "<br/>Add a new student and get the new number of students: ";
//first time we will increment the students number and then we will show it
Student::add_student();
echo Student::count();

// I used the methods from the subclass
echo "<br/><br/>PartTime class (the subclass of the Student class) : ".PartTime::$grades[0]."<br/>";
echo "<br/>Add a new element in the parent class and show the result: <br/> ";
// add new item into array $grades from subclass
PartTime::$grades[] = 'Alumni';
echo "<pre>"; print_r(Student::$grades);echo "</pre>";

echo "Add 3 students at the end of the list: 2 using the method declared in parent class and a student using the method declared in subclass.Show the number using method count defined in parent class <br/>";
Student::add_student();
Student::add_student();
PartTime::add_student();
echo "The number is: ".Student::count();