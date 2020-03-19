<h3><center>Constants</center></h3>
<br>

<?php
//define the constant
define("MAX_AGE",20);
echo "Max age is: ". MAX_AGE;
?>
<br>
<?php
// we CAN'T redefine the previous constant
define("MAX_AGE",35);
echo "<br> I redefine the constant MAX_AGE with the value 35 and the result is: ".MAX_AGE."<br>
<h3>!!! The same value as the first statement. </h3> ";
?>
