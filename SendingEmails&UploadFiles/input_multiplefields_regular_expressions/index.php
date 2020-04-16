<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Multiple Field Types</title>
	<link rel="stylesheet" href="normalize.css" />
	<link rel="stylesheet" href="mystyle.css" />	
</head>
<body>
<form class="group" action="#">
	<ol>
		<li class="group">
			<label for="namefield">Name</label>
			<input type="text" name="name" maxlength="10" required placeholder="Please enter your full name" id="namefield"
            pattern="[a-z ]+"/>
		</li>

		<li class="group">
			<label for="countyfield">County</label>
            <?php // if you want to autosugest some counties we add attribute list="id_datalist" and write the datalist ?>
			<input type="text" name="county" id="countyfield" list="counties" />

            <datalist id="counties">
                <option value="Romania">
                <option value="Russia">
                <option value="Portugal">
            </datalist>

		</li>
		<li class="group">
			<label for="emailfield">Email</label>
			<?php // if you wwant to send a multiple emails we will used in input the attribute "multiple?>
			<input type="email" name="email" multiple required id="emailfield" />
		</li>

        <li class="group">
            <label for="phonefield">Phone</label>
            <?php // set the limit of the characters -> 10 ?>
<!--            <input type="text" name="phone" id="phonefield" pattern="[0-9]{10}"/>-->
            <input type="text" name="phone" id="phonefield" placeholder="07xx-xxx-xxx" pattern="\d{4}\-\d{3}\-\d{3}">
        </li>

		<li class="group">
			<label for="websitefield">Website</label>
			<input type="url" name="website " id="websitefield" />
		</li>

		<li class="group">
			<label for="agefield">Age</label>
			<input type="number" name="age" min="18" id="agefield" />
		</li>

		<li class="group">
			<label for="datetimefield">Date &amp; Time</label>
			<input type="datetime" name="datetime" id="datetimefield" />
		</li>

		<li class="group">
			<label for="filefield">Upload Files</label>
            <?php // uploads the multiple files
            // if you want to upload just the specify type and extension of the files we could use the attribute accept="type/extension" like: accept-"image/png" => accept just the "png" image
            // if you want to upload just the specify type of the files we used the attribute accept="type/*" like: accept="image/*" => accept all images
            ?>
			<input type="file" name="uploads" multiple accept="image/*,video/*" id="filefield" />
		</li>

	</ol>
<button type="submit">send</button>
</form>
</body>
</html>