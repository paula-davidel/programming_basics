<?php
// You can simulate a slow server with sleep
// sleep(2);

session_start();

if(!isset($_SESSION['favorites'])) { $_SESSION['favorites'] = []; }

    function array_remove($element,$array)
    {
        // search the element and return its index
        $index = array_search($element,$array);
        //array_slice remove from $array the position $index and 1 represents the number of elements that will remove and return the final result into an array
        array_slice($array,$index,1);
        return $array;
    }
    function is_ajax_request() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
    }

    if(!is_ajax_request()) { exit; }

    // extract $id
    $raw_id = isset($_POST["id"]) ? $_POST["id"] : 0;
    //  echo $raw_id;
    if(preg_match("/blog-post-(\d+)/",$raw_id,$matches))
    {
        // in $matches[0] is stored the value of $raw_id and in the $marches[1] is stored the id after the syntax: blog-post-
        $id = $matches[1];

        // if $id is in SESSION array => remove this id from Session array
        if(in_array($id,$_SESSION["favorites"]))
        {
            $_SESSION["favorites"] = array_remove($id,$_SESSION["favorites"]);
        }
        echo "true";
        // return true/false
    }
    else
    {
        echo "false";
    }

?>
