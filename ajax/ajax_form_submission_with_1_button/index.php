<?php

echo ini_get('display_errors');
// It's set to dysplay the errors
if (!ini_get('display_errors')) {
    ini_set('display_errors', '1');
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Asynchronous Form</title>
    <style>
        #result
        {
          display: none;
        }
        .error
        {
        border:1px solid red;
        }
        #spinner
        {
            display: none;
        }
    </style>
  </head>
  <body>

    <div id="measurements">
      <p>Enter measurements below to determine the total volume.</p>
      <form id="measurement-form" action="process_measurements.php" method="POST">
        Length: <input type="text" name="length" /><br />
        <br />
        Width: <input type="text" name="width" /><br />
        <br />
        Height: <input type="text" name="height" /><br />
        <br />
        <input id="html-submit" type="submit" value="Submit" />

<!--      //we don't need the two buttons
  <input id="ajax-submit" type="button" value="Ajax Submit" />-->
      </form>
    </div>

    <div id="spinner">
        <img src="spinner.gif" width="50" height="50"/>
    </div>
 
    <div id="result">
      <p>The total volume is: <span id="volume"></span></p>
    </div>

    <script>

      var result_div = document.getElementById("result");
      var volume = document.getElementById("volume");
      var button = document.getElementById("html-submit");
      var original_button_value = button.value;

      function showSpinner() {
          var spinner = document.getElementById("spinner");
          spinner.style.display = "block";
      }

      function hideSpinner()
      {
        var spinner = document.getElementById("spinner");
        spinner.style.display = "none";
      }
      
      function disableSubmitButton()
      {
          button.disabled = true;
          button.value = "Loading...";
      }

      function enableSubmitButton()
      {
          button.disabled = false;
          button.value = original_button_value;
      }

      function displayErrors(errors)
      {
          var inputs = document.getElementsByTagName("input");
          for(i=0;i<inputs.length;i++)
          {
              var input = inputs[i];
              // look at the error with the name X
              // if it's present in this array(errros array) => indexOf RETURN the index where is find in array
              // or return negative it isn't present.
              if(errors.indexOf(input.name) >= 0)
              {
                  input.classList.add("error");
              }
          }
      }

      function clearErrors()
      {
          var inputs = document.getElementsByTagName("input");
          for(i=0;i<inputs.length;i++)
          {
              var input = inputs[i];
              input.classList.remove("error");
          }
      }
      function postResult(value)
      {
        volume.innerHTML = value;
        result_div.style.display = 'block';
      }

      function clearResult()
      {
        volume.innerHTML = '';
        result_div.style.display = 'none';
      }

      // function gatherFormData(form)
      // {
      //     var inputs = form.getElementsByTagName("input");
      //     var array = [];
      //     for(i=0;i < inputs.length; i++)
      //     {
      //         var inputNameValue = inputs[i].name + '=' + inputs[i].value;
      //         array.push(inputNameValue);
      //     }
      //     return array.join('&');
      // }

      function calculateMeasurements()
      {
          //RUN MODE
          clearResult();
          clearErrors();
          // show spinner
          showSpinner();
          // disable submit button
          disableSubmitButton();
          
          var form = document.getElementById("measurement-form");
          // determine form action
          var action = form.getAttribute("action");
          // gather form data
          // var form_data=gatherFormData(form);
          var form_data = new FormData(form);

          var xhr = new XMLHttpRequest();
          xhr.open('POST', action, true);
          // daca folosim clasa FormData => nu mai putem folosi content-type
          // xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
          xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
          xhr.onreadystatechange = function () {
          if(xhr.readyState == 4 && xhr.status == 200)
          {
              var result = xhr.responseText;
              console.log('Result: ' + result);
              // after ajax worked
              // hide spinner
              hideSpinner();
              // enable submit button
              enableSubmitButton();
              var json = JSON.parse(result);
              if(json.hasOwnProperty("errors") && json.errors.length > 0)
              {
                  displayErrors(json.errors);
              }
              else
              {
                  postResult(json.volume);
              }
          }
        };
          xhr.send(form_data);
      }

      button.addEventListener("click", function(event)
      {
          // prevent to redirect another page beause the submit button do this
          event.preventDefault();
          calculateMeasurements();
      });

    </script>

  </body>
</html>
