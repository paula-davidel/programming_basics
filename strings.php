    <?php

    $greeting ="Hello";
    $target = "World";

    // concatenate two strings using the dot
    $phrase= $greeting." ".$target;

    echo $phrase;

    ?>
<br>

    <?php
    //the variable $phrase still set, because we define it above
    echo "$phrase Again <br>";
    // the best way
    echo "{$phrase} Again";
    ?>

    <br>

    <h3><center>String Functions</center></h3>
    <br>

    <?php
    $firstparagraph= "the quick brown fox";
    $secondparagraph= " Jumped over the lazy dog";

    $text = $firstparagraph;
    $text .= $secondparagraph;

    echo "The initial text: ". $text."<br>";
    echo "Lowercase: ".strtolower($text)."<br>";
    echo "Uppercase: ".strtoupper($text)."<br>";
    echo "Uppercase first: ".ucfirst($text)."<br>";
    echo "Uppercase words: ".ucwords($text)."<br>";
    echo "<br>";
    echo "Length: ".strlen($text)."<br>";
    echo "Trim function: Text".trim(" something blah blah text ")."!<br>";// remove the leading and trailing white space
    echo "Find: ".strstr($text,"fox")."<br>";
    echo "Replace by string: ".str_replace("fox",'bear',$text)."<br>"; //the first parameter is old value and the second is new value
    echo "<br>";
    echo "Repeat: ".str_repeat($text,3)."<br>";
    echo "Make substring: ".substr($text,10,15)."<br>"; //the second parameter is for the starting position and the third parameter is for thr length
    echo "Find positionn: ".strpos($text,"fox")."<br>";
    echo "Find character: ".strchr($text,'o')."<br>";
    ?>