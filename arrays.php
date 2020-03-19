<h3><center>Arrays</center></h3>
<br>
<?php
//an array eith integer items
$numbers = array(2,8,15,9,23,42);
print_r($numbers);
echo "<br>Get the first item from array: ".$numbers[0]."<br>";
?>
<br>
<?php
//an array with mixted items: integer, string, another array
$mixed = array(6,"fox","dog",array("x","y","z"));
echo "<pre>";
print_r($mixed);
echo "</pre>";
echo "<br>Get the second item from array: ".$mixed[2]."<br>";
echo "<br>";
?>

<br>
<h3><center>Associative Arrays</center></h3>
<?php
// define the associative array
$assoc_array = array (
    "first_name" => "Paula",
    "last_name" => "Davidel"
);
echo "Fist Name: ".$assoc_array["first_name"]."<br>Last Name: ".$assoc_array["last_name"]."<br>";
echo "First Customer: ".$assoc_array["first_name"]." ".$assoc_array["last_name"]."<br><br>";
$assoc_array["last_name"] ="Burduja";
echo "Fist Name: ".$assoc_array["first_name"]."<br>Last Name: ".$assoc_array["last_name"]."<br>";
echo "Second Customer: ".$assoc_array["first_name"]." ".$assoc_array["last_name"]."<br>";
?>
<br>
Associative array:
<pre>
    <?php
    // show the associative array
    print_r($assoc_array);?>
</pre>
<br>
Return all the keys of an associative array
<br>
<?php
// return the keys of an associative array
$keys=array_keys($assoc_array);
print_r($keys);?>
<br>
Return all the values of an associative array
<br>
<?php
// return the values of an associative array
$values= array_values($assoc_array);
print_r($values);?>
<br><h3><center>Example :</center></h3>
Array: <br>
<?php
//array $numbers = array(2,8,15,16,23,42);
echo "<pre>";
print_r($numbers);
echo "</pre>";
?>
<br><br>
<?php
echo "Associative Array, where the key is an integer: <br>";

/*  associative array
$numbers = array(
    0 => 2,
    1 => 8,
    2 => 15,
    3 => 9,
    4 => 23,
    5 => 42
);
*/
echo "<pre>";
print_r($numbers);
echo "</pre>";
?>
<br>
<h3><center>Array Functions</center></h3>

<br>
<?php

echo "The number of array items: ".count($numbers)."<br>";
echo "The maxim item: ".max($numbers)."<br>";
echo "The minim item: ".min($numbers)."<br>";
?>

<h3><center>Sort</center></h3>
<br>
The array:
<pre>
     <?php echo print_r($numbers);?>
 </pre><br>
Sort (ASC):
<pre>
    <?php sort($numbers); print_r($numbers);?>
</pre><br>
Reverse sort (DESC):
<pre>
        <?php rsort($numbers); print_r($numbers);?>
    <pre><br>
<h3><center>TURN AN ARRAY INTO STRING => with implode("symbol",$array) function</center></h3>
<br>
        <?php
        // resortare, deoarece array-ul salveaza in variabila $numbers ultima varianta sortata, in cazul nostru cea efectuata de rsort()
        sort($numbers);
        $implode = implode(" * ", $numbers);
        echo "Implode: ".$implode; ?>
        <br>
        Explode:
        <?php
        print_r(explode(" * ",$implode));?>
        <br>
<h3><center>Does an array contain a value? </center></h3>
15 in array ?
        <?php echo "Answer: ";
        if(in_array(15,$numbers)==1)
            echo "true";
        else
            echo "false";
        ?>
       <br>
        19 in array ?
       <?php echo "Answer: ";
       if(in_array(19,$numbers)==1)
           echo "true";
       else
           echo "false";
       ?>
