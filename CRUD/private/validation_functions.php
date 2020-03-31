<?php

function is_blank($var)
{
    return !isset($var) || trim($var) ==="";
}

function has_presence($var)
{
    return !is_blank($var);
}

function has_length_greater_than($var,$min)
{
    $length = strlen($var);
    return $length > $min;
}

function has_length_less_than($var,$max)
{
    $length = strlen($var);
    return $length < $max;
}

function has_length_exactly($var,$exact)
{
    $length = strlen($var);
    return $length == $exact;
}

// has_length('abcd',['min' =>3, 'max'=>5])
function has_length($var, $options)
{
    if(isset($options['min']) && !has_length_greater_than($var,$options["min"]-1))
    {
        return false;
    }
    elseif(isset($options["max"]) && !has_length_less_than($var,$options["max"]+1))
    {
        return false;
    }
    elseif(isset($options["exact"]) && !has_length_exactly($var,$options["exact"]))
    {
        return false;
    }
    else
    {
        return true;
    }
}

function has_inclusion_of($var,$array)
{
    return in_array($var,$array);
}

function has_exclusion_of($var,$array)
{
    return !in_array($var,$array);
}

// uses !== to prevent position 0 from being considered false
//strpos() is faster than preg_match()
function has_string($value, $required_string)
{
    return strpos($value,$required_string) !== false;
}

function has_valid_email_format($value)
{
    $email_regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    return preg_match($email_regex,$value) === 1;
}


function has_unique_page_menu_name($menu_name,$old_id="0")
{
    global $db;

    $sql="SELECT * FROM pages WHERE menu_name='".db_escape($db,$menu_name)."' AND id !='".db_escape($db,$old_id)."'";
    $result = mysqli_query($db,$sql);
    $count_result = mysqli_num_rows($result);

    return $count_result === 0;
}