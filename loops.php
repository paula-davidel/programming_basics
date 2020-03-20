<h3><center>While loops</center></h3>
<br>
Show you the numbers from 0 to 12:
<?php
$number=0;
while($number<=12)
{
    echo $number." , ";
    $number++;
}
?>
<br> Replace you the number 7 with string :
<?php
$number=0;
while($number<=12)
{
    if($number == 7)
    {
        echo " SEVEN , ";
    }
    else
    {
        echo $number." , ";
    }
    $number++;
}
?>
<br> Show you the even numbers in  a row and the odd numbers in another row from 0 to 30:
<br>
<?php
$count=0;
$even= array();
$odd=array();
echo "<br> <b>Using if else statement </b><br>";
while($count<=30)
{
    if($count %2 == 0)
    {
        $even[] =$count." ";
    }
    else
    {
        $odd[] = $count." ";
    }
    $count++;
}
?>
<br>
Even numbers: <?php print_r($even);?>
<br>
Odd numbers: <?php print_r($odd);?>
<br>
<br> <b> Using switch statement </b><br>
<?php
while($count<=30)
{
    switch ($count % 2) {
        case 0:
            $even[] =$count." ";
            break;
        case 1:
            $odd[] = $count." ";
            break;
    }
    $count++;
}
?>
<br>
Even numbers: <?php print_r($even);?>
<br>
Odd numbers: <?php print_r($odd);?>
<br>
<br> <b> Using function "continue" </b><br>
Even numbers:
<?php
for($count=0;$count<=30;$count++)
{
    if($count % 2 == 0)
    {
        echo $count." , ";
    }
    else
    {
        continue;
    }
}
?>
<br>

Odd numbers:
<?php
for($count=0;$count<=30;$count++)
{
    if($count % 2 == 0)
    {
        continue;
    }
    else
    {
        echo $count." , ";
    }
}
?>
<br><?php
while($count<=30)
{
    switch ($count % 2) {
        case 0:
            $even[] =$count." ";
            break;
        case 1:
            $odd[] = $count." ";
            break;
    }
    $count++;
}
?>
<br>
<h3><center>Loop: foreach</center></h3>
<br>
<?php // foreach using assoc. array

$person = array(
    "first_name" => "Kevin",
    "last_name"  => "Skoglund",
    "address"    => "123 Main Street",
    "city"       => "Beverly Hills",
    "state"      => "CA",
    "zip_code"   => "90210"
);

foreach($person as $attribute => $data) {
    $attr_nice = ucwords(str_replace("_", " ", $attribute));
    echo "{$attr_nice}: {$data}<br />";
}
?>


<br />
<?php
$prices = array("Brand New Computer" => 2000,
    "1 month of Lynda.com" => 25,
    "Learning PHP" => null);

foreach($prices as $item => $price) {
    echo "{$item}: ";
    if (is_int($price)) {
        echo "$" . $price;
    } else {
        echo "priceless";
    }
    echo "<br />";
}

?>
