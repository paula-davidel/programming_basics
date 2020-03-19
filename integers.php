<?php
$var1 = 3;
$var2 = 4;
?>
<h3><center>Integers</center></h3>
<br>
Basic MATH:<?php echo ((1+2+$var1)*$var2)/2 -5; ?><br>
<br>
Absolute value: <?php echo abs(0-300);?> <br>
Exponential: <?php echo pow(3,4);?> <br>
Square root: <?php echo sqrt(81);?> <br>
Modulo: <?php echo fmod(35,4);?> <br>
Random: <?php echo rand();?> <br>
Random(min,max): <?php
//will return a random number within that range
echo rand(2,10);?> <br>

<br>

Increment: <?php $var2++;
// increment: $var2++ => $var2 + 1 => result: 5
echo $var2;?> <br>
Decrement: <?php
// the last value of $var2 = 5
// decrement: $var2-- => $var2 - 1 => result: 4
$var2--; echo $var2;?> <br>
<br>
<h3><center>Floating point numbers</center></h3>
<br>
The initial value: <?php $float=3.1415; echo $float; ?> <br>
Calculate the expression: 3.14 + 7 =  <?php echo $float + 7;?> <br>
Calculate the expression: 4 / 3 = <?php echo 4/3; ?> <br>
Calculate the expression: 4 / 0 = <?php echo 4/0; ?> <br>

<br>
<h3><center>Round</center></h3>
<br>
Round: <?php echo round($float,3);?><br>
Ceiling: <?php echo ceil($float); //round up ?> <br>
Floor: <?php echo floor($float); // round down ?> <br>
<br>
<h3><center>Is int?</center></h3>
<?php echo "Is integer {$var2}: ";?>
<?php
if(is_integer($var2)==1)
{
    echo "true";
}
else{
    echo "false";
}
?>
<br>
<?php echo "Is integer {$float}: ";?>
<?php
if(is_integer($float)==1)
{
    echo "true";
}
else{
    echo "false";
}
?>
<br>
<h3><center>Is float?</center></h3>
<?php echo "Is float {$var2}: ";?>
<?php
if(is_float($var2)==1)
{
    echo "true";
}
else{
    echo "false";
}
?>
<br>
<?php echo "Is float {$float}: ";?>
<?php
if(is_float($float)==1)
{
    echo "true";
}
else{
    echo "false";
}
?>
<br>
<h3><center>Is numeric?</center></h3>
<?php echo "Is numeric {$var2}: ";?>
<?php
if(is_numeric($var2)==1)
{
    echo "true";
}
else{
    echo "false";
}
?>
<br>
<?php echo "Is numeric {$float}: ";?>
<?php
if(is_numeric($float)==1)
{
    echo "true";
}
else{
    echo "false";
}
?>
<br>