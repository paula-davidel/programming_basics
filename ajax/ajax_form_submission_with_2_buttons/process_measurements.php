 <?php
  // You can simulate a slow server with sleep
  // show spinner for two seconds
   sleep(2);

  function is_ajax_request() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
      $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
  }

  $length = isset($_POST['length']) ? (int) $_POST['length'] : '';
  $width = isset($_POST['width']) ? (int) $_POST['width'] : '';
  $height = isset($_POST['height']) ? (int) $_POST['height'] : '';

  $errors = [];
  
  if($length == '') { $errors[] = "length";}
  if($width == '') { $errors[] = "width";}
  if($height == '') { $errors[] = "height";}

  if(!empty($errors))
  {
   if(is_ajax_request())
   {
     $result_array = array("errors" => $errors);
     echo json_encode($result_array);
   }
   else
   {
     echo "<p>There were errors on: ". implode(", ", $errors) . "</p>";
     echo "<p><a href=\"index.php\">Back</a></p>";
   }
    exit;
  }
  $volume = $length * $width * $height;

  if(is_ajax_request()) {
    // when I clicked on the button Ajax Button -> is a ajax request
    echo json_encode(array("volume" => $volume));
  } else {
    // this is code when I clicked on submit button from form
    //    exit;
    echo "<p>The total volume is: ". $volume . "</p>";
    echo "<p><a href=\"index.php\">Back</a></p>";
  }

?>
