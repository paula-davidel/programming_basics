<?php
// display errors
 require_once("runtime_config.php");

 ?>

<ul>
    <li><a href="contact.php">Contact Us</a></li>
</ul>

<br/><br>

<?php
$total = 55.99;
$delivery =10;
echo "Total: {$total} <br> Delivery: {$delivery} <br>";

// switch case comparison
    switch($total)
    {
        case $total < 50:
            echo "Total (including delivery): ".$total += $delivery;
            break;
        case $total < 100:
            echo "Total (including delivery): ".$total += $delivery/2;
            break;
        case $total >=100:
            echo "Total (free delivery): ".$total;
    }

    ?>
<br/>

<?php
$a = 2;
$b = 5;

echo "Exponentiation: ". $a ** $b;
?>
<br>

While and Do while
<br/><br/>
WHILE <br>
<?php

$i = 5;

while($i<8)
{
    $i++;
    echo $i."<br>";
}
?>

<br/>Alternative sintax for WHILE loop <br>
<?php
$j =5;
while($j<8):
    $j++;
    echo $j."<br>";
endwhile;
?>
<br/>

DO ... WHILE <br>

<?php

do{
    $i++;
    echo $i;
}while($i<8);