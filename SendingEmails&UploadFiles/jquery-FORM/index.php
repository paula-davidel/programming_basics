<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Form Sample</title>
	<link rel="stylesheet" href="normalize.css" />
	<link rel="stylesheet" href="mystyle.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
<?php require_once("runtime_config.php");?>

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
				<label for="myurl">Website </label>
                <span id="formerror_website" class="error"></span>
                <input type="url" name="myurl" placeholder="http://" id="myurl" />
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
<script src="run.js"></script>
</body>
</html>