$(document).ready(function () {

    $("#myform").submit(function () {
        var abort = false;
        // clear the all div errors
        $("div.error").remove();


        $(":input[required]").each(function () {

            if($(this).val()==='')
            {
                $(this).after('<div class="error">This is a required field</div>');
                abort = true;
            }
        }); // go through each required value
        if(abort) { return false; }
        else { return true; }
    }); // on submit

}); // ready

$("input[placeholder]").blur(function() {
    $("div.error").remove();
    var pattern = $(this).pattern;
    var placeholder = $(this).placeholder;
    var isValid = $(this).val().search(pattern) >= 0;

    if (!isValid) {
        $(this).after('<div class="error">Entry does not match expected pattern. ' + placeholder);
    } // isValid test
}); // onblur