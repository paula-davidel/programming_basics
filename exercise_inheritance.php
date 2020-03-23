<?php

class Shapes
{
    var $sides;
}

class Triangle extends Shapes
{
    var $sides = 3;
    var $a;
    var $b;
    var $c;

    function area()
    {
        $perimeter = ($this->a + $this->b + $this->c)/2;
        $area = sqrt($perimeter * ($perimeter - $this->a) * ($perimeter - $this->b) * ($perimeter - $this->c));
        return $area;
    }
}

class Rectangle extends Shapes
{
    var $sides = 4;
    var $width;
    var $height;

    function area()
    {
        return ($this->width) * ($this->height);
    }
}

class Square extends Rectangle
{
    function area()
    {
        return $this->width * $this->width;
    }
}

$triangle = new Triangle();
$triangle->a = 10;
$triangle->b = 3;
$triangle->c = 10;

echo "The triangle's area is: {$triangle->area()} <br/>";

$rectangle = new Rectangle();
$rectangle->width = 5;
$rectangle->height = 10;

echo "The rectangle's area is: {$rectangle->area()} <br/>";

$square = new Square();
$square->width = 5;

echo "The square's area is: {$square->area()} <br/>";