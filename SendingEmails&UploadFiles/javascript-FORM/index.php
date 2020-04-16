<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Form Sample</title>
	<link rel="stylesheet" href="normalize.css" />
	<link rel="stylesheet" href="mystyle.css" />

<!--[if lt IE 8]>
	<style>
		legend {
			display: block;
			padding: 0;
			padding-top: 30px;
			font-weight: bold;
			font-size: 1.25em;
			color: #FFD98D;
			margin: 0 auto;
		}
	</style>
<![endif]-->


</head>
<body>
<form id="myform" name="theform" class="group" action="#" method="POST">
	<fieldset id="login" title="Login Info">
		<legend>Login Info</legend>
        <br/>
		<ol>
                <span id="mynamehint" class="hint"></span><br/>
			<li>
                <label for="myname">Name *</label>
				<input type="text" name="myname" id="myname" title="Please enter your name" autofocus placeholder="Last, First" required />
			</li>
                <br/><span id="myemailhint" class="hint"></span><br/>
            <li>
				<label for="myemail">Email *</label>
				<input type="email" name="myemail" id="myemail" required autocomplete="off" />
			</li>
			<li>
				<label for="mypassword">Password</label>
				<input type="password" name="mypassword" id="mypassword" />
			</li>
		</ol>
	</fieldset>
	<fieldset id="other" class="hidden" title="Other Info">
		<legend>Other</legend>
		<ol>
			<li>
				<label for="myurl">Website *</label>
                <span id="formerror_website" class="error"></span>
                <input type="url" name="myurl" placeholder="http://" id="myurl" required />
			</li>
			<li>
				<label for="mytelephone">Telephone</label>
                <span id="formerror_telephone" class="error"></span>
                <input type="tel" name="mytelephone" id="mytelephone" pattern="\d{4}\-\d{3}\-\d{3}" placeholder="07xx-xxx-xxx"/>
			</li>
			<li class="singleline">
				<input type="checkbox" id="subscribeitem" name="subscribe" CHECKED value="yes" />
				<label for="subscribeitem">Subscribe to our mailing list?</label>
			</li>
			<li>
				<label for="reference">How did you hear about us?</label>
                <span id="myreference"></span>
				<select name="reference" id="reference">
					<option disabled>Choose...</option>
					<option value="friend">A friend</option>
					<option value="facebook">Facebook</option>
					<option value="twitter">Twitter</option>
				</select>
			</li>
		</ol>
	</fieldset>
	<fieldset id="comments"  class="hidden" title="Comments">
	<legend>Comments</legend>
		<ol>
			<li>
				<div class="grouphead">Request Type</div>
				<ol>
					<li>
						<input type="radio" name="requesttype" value="question" id="questionitem" />
						<label for="questionitem">Question</label>
					</li>
					<li>
						<input type="radio" name="requesttype" value="comment" id="commentitem" />
						<label for="commentitem">Comment</label>
					</li>
				</ol>
			</li>
			<li>
				<label for="mycomments">Comment</label>
				<textarea name="mycomments" id="mycomments"></textarea>
			</li>
		</ol>
		<button type="submit">send</button>
	</fieldset>
</form>

<script>
    // onfocus event is what happens when somebody focus on field
    // onblur event is what happens when somebody exits a field
    document.theform.myname.onfocus = function () {
        document.getElementById('mynamehint').innerHTML = " Enter the last name, then the first";
    }
    // if we don't focus on input field , it must to "clear" the text of the span tag
    document.theform.myname.onblur = function () {
        document.getElementById('mynamehint').innerHTML = " ";
    }

    document.theform.myemail.onfocus = function () {
        // onfocus -> show the text
        document.getElementById("myemailhint").innerHTML = " Enter the email";
    }
    document.theform.myemail.onblur = function () {
        // onblur -> clear the text after exit the field
        document.getElementById("myemailhint").innerHTML = " ";
    }

    // if the myurl input is empty we'll show another error or the input just contains http://
    document.theform.myurl.onblur = function () {
        if(document.theform.myurl.value==="")
        {
            document.getElementById("formerror").innerHTML = "<br> The URL field is required! <br>";
        }

        if(document.theform.myurl.value==="http://")
        {
            document.getElementById("formerror").innerHTML = "<br> Please add a valid URL! <br>";
        }
    }

    // onchange
    document.theform.myurl.onchange = function () {
        var theURL = document.theform.myurl.value;

        // indexOf returns the position of some text inside of some other text
        if(theURL.indexOf("http://"))
        {
            document.getElementById("formerror_website").innerHTML =  "<br>URLs must begin with http:// <br>";
            //doesn't have http://

            document.theform.myurl.value = "http://"+document.theform.myurl.value;
        }
    }

    // get the id of the selected option => using selectedIndex
    document.theform.reference.onchange = function () {
        var id = document.theform.reference.selectedIndex;
        var val = document.theform.reference[id].value;
        document.getElementById("myreference").innerHTML = "You select the "+ val;
    }

    document.theform.reference.onblur = function () {
        document.getElementById("myreference").innerHTML = "";
    }

    document.theform.mytelephone.onchange = function () {
        var pattern = this.pattern;
        var placeholder = this.placeholder;
        var isValid = this.value.search(pattern) >=0;

        if(!isValid)
        {
            document.getElementById("formerror_telephone").innerHTML = "Input does not match expected pattern. "+placeholder;
        }
        else
        {
            document.getElementById("formerror_telephone").innerHTML ="";
        }
    }
</script>

</body>
</html>