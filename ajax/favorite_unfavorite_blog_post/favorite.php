<?php
  // You can simulate a slow server with sleep
  // sleep(2);

  session_start();

  if(!isset($_SESSION['favorites'])) { $_SESSION['favorites'] = []; }

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
    //    print_r($matches);

    // store in $_SESSION['favorites']
    if(!in_array($id,$_SESSION["favorites"]))
    {
      // add a new value in $_SESSION["favorites"] that is an empty array by default
      $_SESSION["favorites"][] = $id;
//      echo "true ".join(",",$_SESSION["favorites"]);
//      $_SESSION["favorites"] = [];
    }
    echo "true";
    // return true/false
  }
  else
  {
    echo "false";
  }

?>
