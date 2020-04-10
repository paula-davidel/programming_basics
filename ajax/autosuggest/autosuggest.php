<?php
// You can simulate a slow server with sleep
// sleep(2);

function is_ajax_request() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
      $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
}

if(!is_ajax_request()) {
  exit;
}

// Notes:
// * strpos is faster than strstr or preg_match
// * strpos requires strict comparison operator (===)
//     returns 0 for match at start of string
//     returns false for no match
function str_starts_with($choice, $query) {
  return strpos($choice, $query) === 0;
}

function str_contains($choice, $query) {
  return strpos($choice, $query) !== false;
}

// In real world, this would likely search a database, or use
// a search program like Solr, Elastic Search, Sphinx, etc.
function search($query, $choices) {
  $matches = [];

  $d_query = strtolower($query);

  foreach($choices as $choice) {
    // Downcase both strings for case-insensitive search
    $d_choice = strtolower($choice);
    if(str_starts_with($d_choice, $d_query)) {
      $matches[] = $choice;
    }
  }

  return $matches;
}

$query = isset($_GET['q']) ? $_GET['q'] : '';

// find and return search suggestions as JSON

$choices = file('includes/us_passenger_trains.txt', FILE_IGNORE_NEW_LINES);

$suggestions = search($query, $choices);
// sort alphabetically
sort($suggestions);
// set a maximum number of suggestions that we should return
$max_suggestions = 5;
$top_suggestions = array_slice($suggestions, 0, $max_suggestions);
// find all suggestions and WE'll return just 5 of them
echo json_encode($top_suggestions);

?>
