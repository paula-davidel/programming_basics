<h3><center>If statement</center></h3>
<?php
$new_user=true;
if($new_user)
{
    echo "<h1>Welcome</h1>";
    echo "<p> We are glad you decided to join us.</p>";
}
?>
<br>

Don't divide by zero
<br>
<?php
$numerator = 20;
$denominator = [4,0];
for($i=0;$i<count($denominator);$i++)
{
    if($denominator[$i] > 0)
    {
        $result = $numerator / $denominator[$i];
        echo "The result of equation : " . $numerator ." / ".$denominator[$i]." = ".$result;
    }
    else
    {
        echo "<br>The result of equation : " . $numerator ." / ".$denominator[$i]." = ( !!! you don't divide by zero !!! )";
    }
}
?>
<h3><center>Switch</center></h3>
<br>
<?php
// ChineseZodiac
// whitespace doesn't matter
// colons, semicolons and breaks do
$year = 2020;
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
echo "{$year} is the year of the {$zodiac}.<br />";
?>
<br>
<h3><center>THE CASE WITH THE MULTIPLE VALUES
        <br> for example: multiple users types</center></h3>
<br>
<?php
$user_type="admin";
switch ($user_type)
{
    case "student":
        echo "Welcome ".$user_type;
        break;
    case "press":
    case "author":
    case "doctor":
        echo "Greetings ".$user_type;
        break;
    case "admin":
        echo "Hello ".$user_type;
}
?>