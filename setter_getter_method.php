<?php

class Student
{
    private $first_name;
    private $last_name;
    private $department;
    private $student_id = 1;

    //set the student's firstname -> this method has parameters
    public function set_firstname($firstname)
    {
        $this->first_name = $firstname;
    }
    //get the student's name -> this method doesn't have parameters
    public function get_firstname()
    {
        return $this->first_name;
    }

    //set the student's lastname -> this method has parameters
    public function set_lastname($lastname)
    {
        $this->last_name = $lastname;
    }
    //get the student's lastname -> this method doesn't have parameters
    public function get_lastname()
    {
        return $this->last_name;
    }

    //set the student's department -> this method has parameters
    public function set_department($department)
    {
        $this->department = $department;
    }
    //get the student's department -> this method doesn't have parameters
    public function get_department()
    {
        return $this->department;
    }

    //set the student's student_id -> this method has parameters
    public function set_studentId($student_id)
    {
        $this->student_id = $student_id;
    }
    //get the student's name -> this method doesn't have parameters
    public function get_studentId()
    {
        return $this->student_id;
    }
}

$student = new Student();
$student->set_firstname('Ana');
$student->set_lastname("Georgescu");
$student->set_department('Mathematics');
$student->set_studentId(12344);
echo "<h3><center>Hello student {$student->get_studentId()}<br/></center></h3><br/>";
echo "Congratulations {$student->get_firstname()} {$student->get_lastname()} !<br/> You were accepted to our University, the department {$student->get_department()}.<br/>";