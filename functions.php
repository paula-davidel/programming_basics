<h3><center>Function:: arguments</center></h3>
<br>
<?php

function SayHello()
{
    echo "Hello World!";
}

SayHello();

echo "<br>";

function SayHelloTo($user)
{
    echo "<br>Welcome back {$user} !";
}

SayHelloTo("Paula");

echo "<br>";

function BetterHello($greeting,$target,$punct)
{
    echo "<br>".$greeting." ".$target." ".$punct;
}
$name = "Popescu";
BetterHello("Hello",$name,"!");
BetterHello("Greeting",$name,"!!!");
BetterHello("Hi",$name,null);
?>
<br>
<h3><center>Function: return values</center></h3>
<br>
Calculate the following expression, step by step: ( 3 + 4 ) * 12 ;
<br>
<?php
function sum($var1,$var2)
{
    $sum = $var1 + $var2;
    return $sum;
}

function multiplication($var1,$var2)
{
    $prod = $var1 * $var2;
    return $prod;
}

$result1 = sum(3,4);
$result2 = multiplication($result1,12);
echo "The result is: ".$result2;
?>
<br>
<h3><center>Chinese Zodiac</center></h3>
<br>
<?php
function chinese_zodiac($year)
{
    switch (($year - 4) % 12) {
        case  0: $zodiac = 'Rat';     break;
        case  1: $zodiac = 'Ox';       break;
        case  2: $zodiac = 'Tiger';   break;
        case  3: $zodiac = 'Rabbit';   break;
        case  4: $zodiac = 'Dragon';   break;
        case  5: $zodiac = 'Snake';   break;
        case  6: $zodiac = 'Horse';   break;
        case  7: $zodiac = 'Goat';     break;
        case  8: $zodiac = 'Monkey';  break;
        case  9: $zodiac = 'Rooster'; break;
        case 10: $zodiac = 'Dog';     break;
        case 11: $zodiac = 'Pig';     break;
    }
    return $zodiac;
}
$year =2020;
echo "Year {$year} => ".chinese_zodiac($year)."<br>";
?>