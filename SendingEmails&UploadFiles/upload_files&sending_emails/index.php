<?php

$myname = isset($_POST["myname"]) ? $_POST["myname"] : "";
$myemail = isset($_POST["myemail"]) ? $_POST["myemail"] : "";
$mypassword = isset($_POST["mypassword"]) ? $_POST["mypassword"] : "";
$mypasswordconf = isset($_POST["mypasswordconf"]) ? $_POST["mypasswordconf"] : "";
$favoritemusic = isset($_POST["favoritemusic"]) ? $_POST["favoritemusic"] : ""; // array
$reference = isset($_POST["reference"]) ? $_POST["reference"] : ""; //string
$requesttype = isset($_POST["requesttype"]) ? $_POST["requesttype"] : ""; // string
$mycomments = isset($_POST["mycomments"]) ? $_POST["mycomments"] : ""; // string
$formerrors = false;

if(($_SERVER["REQUEST_METHOD"] == "POST") && (!empty($_POST['action'])))
{
    $errors = [];
    $validate_email = filter_var($myemail,FILTER_VALIDATE_EMAIL);

    if(empty($myname))
    {
    // input field empty
        $errors["name"] = '<div class="error">Sorry, your name is required field. </div>';
        $formerrors = true;
    }
    if(empty($myemail))
    {
        // input field empty
        $errors["email"] = '<div class="error">Sorry, your email is required field. </div>';
        $formerrors = true;
    }

    if(!$validate_email)
    {
        $errors["invalid_email"] = '<div class="error">Please add a valid email. </div>';
        $formerrors = true;
    }

    if(empty($mypassword))
    {
        // input field empty
        $errors["password"] = '<div class="error">Sorry, your password is required field. </div>';
        $formerrors = true;
    }

    if(empty($mypasswordconf))
    {
        // input field empty
        $errors["password_conf"] = '<div class="error">Sorry, your confirm password is required field. </div>';
        $formerrors = true;
    }

    if((!empty($mypassword) && strlen($mypassword) < 6) || (!empty($mypasswordconf) && strlen($mypasswordconf)  < 6))
    {
    // password not long enough
        $errors['password_long'] = '<div class="error">Sorry, the password must be at least 5 characters. </div>';
        $formerrors = true;
    }

    if($mypassword !== $mypasswordconf)
    {
        $errors['not_matches'] = '<div class="error">Sorry, passwords must match </div>';
        $formerrors = true;
    }

    if(!preg_match("/[A-Za-z]+,[A-Za-z]+/",$myname))
    {
        $errors["error_pattern_name"]= '<div class="error">Sorry, the name must be in the format: Last, First</div>';
        $formerrors = true;
    }

        $formdata = array(
            "myname" => $myname,
            "myemail" => $myemail,
//            "mypassword" => $mypassword,
            "mycomments" => $mycomments,
            "reference" => $reference,
            "favorite_music" => $favoritemusic,
            "request_type" => $requesttype
        );

        // upload files
        $tmp_name = $_FILES['myprofileimg']['tmp_name'];
        $filename = $_FILES["myprofileimg"]['name'];
        // for unique name we'll use a combination between date and old name
        $date = time();
        $newfilename = 'uploads/'.$date."_".$filename;
        // the url for src
        // $_SERVER['SERVER_NAME'] => the domain of the web site
        // $_SERVER['REQUEST_URI'] => gives the url of the current page from the root of the server
        // $upload_url = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER['REQUEST_URI'])."/".$newfilename;

        if(move_uploaded_file($tmp_name,$newfilename))
        {
            $error_message = "File uploaded";
        }
        else
        {
            $error_message = "Sorry, couldn't upload your profile picture. ".$_FILES['myprofileimg']['error'];
            $formerrors = true;
        }

        if(!$formerrors)
        {
            // take the file from the temporary location that PHP puts it in into the folder that we created
            $to = "p.davidel@nexus-united.com";
            $subject = "From {$myname} -- SINGUP PAGE";
            $message = json_encode($formdata);

            $reply_to = "From : {$myemail} \r\n";

            if(mail($to,$subject,$message))
            {
                $error_message= "Thanks for filling out our form ! ";
            }
            else
            {
                $error_message = "Problem sending the message !";
            }
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Form Sample</title>
	<link rel="stylesheet" href="normalize.css" />
	<link rel="stylesheet" href="mystyle.css" />
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>
<body>


<form id="myform" name="theform" class="group" action="<?php
         // execute the validation in-page
        echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">


        <?php if(isset($error_message))
        {
            // success sending email
            echo '<div class="hint"><p>'.$error_message.'</p></div>';
        }?>


		<span id="formerror" class="error"></span>
		<ol>
			<li>
				<label for="myname">Name *
                <?php
                    if($errors && array_key_exists("name",$errors))
                    {
                        echo $errors["name"];
                    }
                    elseif($errors && array_key_exists("error_pattern_name",$errors))
                    {
                        echo $errors["error_pattern_name"];
                    }
                    ?>
                </label>
				<input type="text" name="myname" id="myname" title="Please enter your name" autofocus placeholder="Last, First" value="<?php echo $myname;?>" />
			</li>
            <li>
                <label for="myemail">Email *
                    <?php
                    if($errors && array_key_exists("email",$errors))
                    {
                        echo $errors["email"];
                    }
                    elseif($errors && array_key_exists("invalid_email",$errors))
                    {
                        echo $errors["invalid_email"];
                    }
                    ?>
                </label>
                <input type="text" name="myemail" id="myemail" title="Please enter your email" autofocus value="<?php echo $myemail;?>" />
            </li>
			<li>
				<label for="mypassword">Password
                 <?php
                    if($errors && array_key_exists("password",$errors))
                    {
                        echo $errors["password"];
                    }
                    elseif($errors && array_key_exists("password_long",$errors))
                    {
                        echo $errors["password_long"];
                    }
                    ?>
                </label>
				<input type="password" name="mypassword" id="mypassword" />
			</li>
			<li>
				<label for="mypasswordconf">Password (confirm)
                    <?php
                    if($errors && array_key_exists("password_conf",$errors))
                    {
                        echo $errors["password_conf"];
                    }
                    elseif($errors && array_key_exists("password_long",$errors))
                    {
                        echo $errors["password_long"];
                    }
                    ?>
                </label>
				<input type="password" name="mypasswordconf" id="mypasswordconf" />
			</li>
            <br/>
            <?php
            if($errors && array_key_exists("not_matches",$errors))
            {
                echo $errors["not_matches"];
            }
            ?>
            <br/>
			<li>
				<div class="grouphead">Favorite Music</div>
				<ol>
					<li>
						<input type="checkbox" name="favoritemusic[]" value="rock" id="rockitem"
                        <?php if(isset($favoritemusic) && in_array("rock",$favoritemusic))
                            {
                                echo "checked";
                            }
                            ?>
                        />
						<label for="rockitem">Rock</label>
					</li>
					<li>
						<input type="checkbox" name="favoritemusic[]" value="classical" id="classicalitem"
                            <?php if(isset($favoritemusic) && in_array("classical",$favoritemusic))
                            {
                                echo "checked";
                            }
                            ?>
                        />
						<label for="classicalitem">Classical</label>
					</li>
					<li>
						<input type="checkbox" name="favoritemusic[]" value="reggaeton" id="reggaetonitem"
                            <?php if(isset($favoritemusic) && in_array("reggaeton",$favoritemusic))
                            {
                                echo "checked";
                            }
                            ?>/>
						<label for="reggaetonitem">Reggaeton</label>
					</li>
				</ol>
			</li>
			<li>
				<label for="reference">How did you hear about us?</label>
				<select name="reference" id="reference">
					<option value="">Choose...</option>
					<option value="friend"
                      <?php if(isset($reference) && ($reference == "friend"))
                            {
                                echo "selected";
                            }
                       ?>
                    >A friend</option>
					<option value="facebook"
                        <?php if(isset($reference) && ($reference == "facebook"))
                        {
                            echo "selected";
                        }
                        ?>
                    >Facebook</option>
					<option value="twitter"
                        <?php if(isset($reference) && ($reference == "twitter"))
                        {
                            echo "selected";
                        }
                        ?>
                    >Twitter</option>
				</select>
			</li>
			<li>
				<div class="grouphead">Request Type</div>
				<ol>
					<li>
						<input type="radio" name="requesttype" value="question" id="questionitem"
                            <?php if(isset($requesttype) && ($requesttype == "question"))
                            {
                                echo "checked";
                            }
                            ?>
                        />
						<label for="questionitem">Question</label>
					</li>
					<li>
						<input type="radio" name="requesttype" value="comment" id="commentitem"
                            <?php if(isset($requesttype) && ($requesttype == "comment"))
                            {
                                echo "checked";
                            }
                            ?>
                        />
						<label for="commentitem">Comment</label>
					</li>
					<li>
						<input type="radio" name="requesttype" value="suggestion" id="suggestionitem"
                            <?php if(isset($requesttype) && ($requesttype == "suggestion"))
                            {
                                echo "checked";
                            }
                            ?>
                        />
						<label for="suggestiontem">Suggestion</label>
					</li>
				</ol>
			</li>
			<li>
				<label for="mycomments">Comment</label>
				<textarea name="mycomments" id="mycomments"><?php echo $mycomments;?></textarea>
			</li>

            <?php // upload files and limit the size ?>
            <li>
                <label for="myprofileimg">Profile Picture: (<100k)</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="102400">
                <input type="file" name="myprofileimg" id="myprofileimg" accept="image/*">
            </li>

		</ol>
		<button type="submit" name="action" id="action" value="submit">send</button>
</form>
<script>
    document.getElementById('myform').reset();
</script>
</body>
</html>

