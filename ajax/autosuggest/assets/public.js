// note: IE8 doesn't support DOMContentLoaded
document.addEventListener('DOMContentLoaded', function() {

  var suggestions = document.getElementById("suggestions");
  var form = document.getElementById("search-form");
  var search = document.getElementById("search");

  function suggestionsToList(item)
  {
    var output = "";

    for(i=0;i<item.length;i++)
    {
      output += "<li><a href=\"search.php?q="+ item[i] + "\">"+item[i]+"</a></li>";
    }
    return output;
  }

  function showSuggestions(json)
  {
    var li_list = suggestionsToList(json);
    suggestions.innerHTML = li_list;
    suggestions.style.display = "block";
  }

  function getSuggestions() {
    var q = search.value;

    // show the suggestions if the keyword has length more than 3 characters
    if(q.length < 3)
    {
      suggestions.style.display = "none";
      return;
    }
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'autosuggest.php?q=' + q, true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function () {
      if(xhr.readyState == 4 && xhr.status == 200) {
        var result = xhr.responseText;
        console.log('Result: ' + result);
        var json = JSON.parse(result);
        showSuggestions(json);
      }
    };
    xhr.send();
  }
  // use "input" (every key), not "change" (must lose focus)
  search.addEventListener("input", getSuggestions);

});
