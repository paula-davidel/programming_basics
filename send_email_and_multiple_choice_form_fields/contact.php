<?php
require_once("runtime_config.php");
$missing = [];
//route is saved in the variable $_SERVER["PHP_SELF"]
// Process the form if the submit button has bee`n clicked
if (isset($_POST['send']))
{
    $expected = ['name', 'email', 'comments','gender','terms','programming_language','os',"framework-platform"];
    // Add elements to the $missing array if empty
    $newlines = "\r\n\r\n";
    $programming_languages = $_POST["programming_language"];
    $framework_platforms = $_POST["framework-platform"];

    foreach ($expected as $elem)
    {
        if (empty($_POST[$elem])) {
            $missing[] = $elem;
        }
    }

    $min_value_prog = 3;
    $min_value_frame = 2;
    // count the $_POST['programming_language"] and compare to $min_value
    if((count($programming_languages) < $min_value_prog))
    {
        $missing[] = "insufficient_args_prog";
    }
    if((count($framework_platforms) < $min_value_frame))
    {
        $missing[] = "insufficient_args_frame";
    }

    if(!$missing && !empty($_POST["email"]))
    {
        $validate_email = filter_var($_POST["email"],FILTER_VALIDATE_EMAIL);

        if($validate_email)
        {
            $to = "p.davidel@nexus-united.com";
            $subject = "Feedback from online form";
            $headers = [];
            $headers[] = "From: {$_POST["email"]}";
            // $headers[] = "Cc:another@example.com";
            $headers[] = "Content-type: text/plain; charset=utf-8";
            // stop spam
            $authorized = null;

            $message = " Message: {$newlines}";
            $message .= " Name: {$_POST['name']} {$newlines}";
            $message .= " Gender: ".ucfirst($_POST["gender"])." {$newlines}";
            $message .= " Programming language(s): ";
            foreach ($programming_languages as $programming_language)
            {
                $message .= ucfirst($programming_language)."; ";
            }
            $message .= " {$newlines}";
            $message .= " And I know to work in: ";
            foreach ($framework_platforms as $framework_platform)
            {
                $message .= ucfirst($framework_platform)."; ";
            }
            $message .= " {$newlines}";
            $message .= " Email:  {$_POST['email']} {$newlines}";
            $message .= " Comments: {$_POST["comments"]} {$newlines}";
//            $message .= " Headers: {$newlines}";
//            foreach ($headers as $header)
//            {
//                $message .= " {$header}<br/>";
//            }
            $mailSent =  mail($to,$subject,$message,$headers,$authorized);
            if($mailSent)
            {
                $output = "";
                $text = "<h1>Thank You</h1><br><p>Thank you for comments. We'll be in touch if necessary.</p>";
                $output .= strip_tags($text,"<h1><br><p>");
            }
        }
        else
        {
            $missing[] = "validate_email";
        }
    }
}

$args = [];
$args["name"] = isset($_POST["name"]) ? $_POST["name"] : "";
$args["email"] = isset($_POST["email"]) ? $_POST["email"] : "";
$args["comments"] = isset($_POST["comments"]) ? $_POST["comments"] : "";
$args["gender"] = isset($_POST["gender"]) ? $_POST["gender"] : "";
$args["terms"] = isset($_POST["terms"]) ? $_POST["terms"] : "";
$args["programming_language"] = isset($_POST["programming_language"]) ? $_POST["programming_language"] : "";
$args["os"] = isset($_POST["os"]) ? $_POST["os"] : "";
$args["framework-platform"] = isset($_POST["framework-platform"]) ? $_POST["framework-platform"] : "";
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Contact Us</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1>Contact Us</h1>
<?php if ($missing) : ?>
    <p class="warning">Please fix the item(s) indicated.</p>
<?php endif; ?>
<form name="contact" method="post" action="<?php
    // include the path of the current file
    echo $_SERVER['PHP_SELF']; ?>">

    <?php // write the name ?>
    <p>
        <label for="name">Name:
            <?php if ($missing && in_array('name', $missing)) { ?>
                <span class="warning">Please enter your name</span>
            <?php } ?>
        </label>
        <input type="text" name="name" id="name" value="<?php echo htmlentities($args["name"]);?>">
    </p>

    <?php // write the email address ?>
    <p>
        <label for="email">Email:
            <?php if ($missing && in_array('email', $missing)) { ?>
                <span class="warning">Please enter your email address</span>
            <?php }
            if ($missing && in_array('validate_email',$missing)) {?>
            <span class="warning">Invalid email address.</span>
            <?php } ?>
        </label>
        <input type="text" name="email" id="email" value="<?php echo htmlentities($args["email"]);?>">
    </p>

    <?php // write a comment ?>
    <p>
        <label for="comments">Comments:
            <?php if ($missing && in_array('comments', $missing)) { ?>
                <span class="warning">You forgot to add your comments</span>
            <?php } ?>
        </label>
        <textarea name="comments" id="comments"><?php echo htmlentities($args["comments"]);?></textarea>
    </p>

    <?php // choose the gender ?>
    <fieldset>
        <legend>Gender:
            <?php if ($missing && in_array('gender', $missing)) { ?>
                <span class="warning">Please select a value.</span>
            <?php } ?>
        </legend>
        <p>
            <input type="radio" name="gender" value="female" id="gender_f"
             <?php if($args["gender"] == "female") echo "checked";?>
            >
            <label for="gender_f">Female</label>
            <input type="radio" name="gender" value="male" id="gender_m"
              <?php if($args["gender"]=="male") echo "checked";?>
            >
            <label for="gender_m">Male</label>
            <input type="radio" name="gender" value="won't say" id="gender_0"
             <?php if($args["gender"] == "won't say") echo "checked";?>
            >
            <label for="gender_0">Rather not say</label>
        </p>
    </fieldset>

    <?php // select just a single value ?>
    <p>
        <label for="os">Operating system
        <?php
        if($missing && in_array("os",$missing)){ ?>
            <span class="warning"> Please make a selection. </span>
        <?php } ?>
        </label>
        <select name="os" id="os">
            <option value="Not selected" selected disabled>Please make a selection</option>
            <option value="Linux"
            <?php if($args["os"] == "Linux")
                {
                    echo "selected";
                }?>
            >Linux</option>
            <option value="Mac"
                <?php if($args["os"] == "Mac")
                {
                    echo "selected";
                }?>
            >Mac OS X</option>
            <option value="Windows"
                <?php if($args["os"] == "Windows")
                {
                    echo "selected";
                }?>
            >Windows</option>
        </select>
    </p>


    <?php // checkbox group ?>

    <p>
        <legend>
            Which programming languages do you prefer?
            <?php
            if($missing && in_array("programming_language",$missing)){?>
                <span class = "warning">Please select a value.</span>
            <?php }
            elseif($missing && in_array("insufficient_args_prog",$missing)){?>
                <span class="warning">Please select at least <?php echo $min_value_prog;?></span>
            <?php } ?>
        </legend>

        <?php // if you want to add more values for programming_language array
        // each input must have thee name of type programming_language[] ?>
        <label for="c_prog_lang">
            <input type="checkbox" name="programming_language[]" value="c"
                <?php if(in_array("c",$args["programming_language"]))
                {
                    echo "checked";
                } ?>
            >
            C
        </label>


        <label for="java">
            <input type="checkbox" name="programming_language[]" value="java"
                <?php if(in_array("java",$args["programming_language"])) echo "checked";?>
            >
            Java
        </label>


        <label for="python">
            <input type="checkbox" name="programming_language[]" value="python"
                <?php if(in_array("python",$args["programming_language"])) echo "checked";?>
            >
            Python
        </label>


        <label for="c_plus_plus">
            <input type="checkbox" name="programming_language[]" value="c++"
                <?php if(in_array("c++",$args["programming_language"])) echo "checked";?>
            >
            C++
        </label>


        <label for="c_sharp">
            <input type="checkbox" name="programming_language[]" value="c#"
                <?php if(in_array("c#",$args["programming_language"])) echo "checked";?>
            >
            C#
        </label>


        <label for="php">
            <input type="checkbox" name="programming_language[]" value="php"
                <?php if(in_array("php",$args["programming_language"])) echo "checked";?>
            >
            PHP
        </label>


        <label for="javascript">
            <input type="checkbox" name="programming_language[]" value="javascript"
                <?php if(in_array("javascript",$args["programming_language"])) echo "checked";?>
            >
            JavaScript
        </label>


        <label for="node_js">
            <input type="checkbox" name="programming_language[]" value="nodejs"
                <?php if(in_array("nodejs",$args["programming_language"])) echo "checked";?>
            >
            Node.js
        </label>


        <label for="angular_js">
            <input type="checkbox" name="programming_language[]" value="angularjs"
                <?php if(in_array("angularjs",$args["programming_language"])) echo "checked";?>
            >
            AngularJS
        </label>


        <label for="ruby">
            <input type="checkbox" name="programming_language[]" value="ruby"
                <?php if(in_array("ruby",$args["programming_language"])) echo "checked";?>
            >
            Ruby
        </label>
    </p>


    <?php // multiple selection ?>
    <p>
        <label for="framework-platform">
            <h1>I worked in: </h1>
            <?php if($missing && in_array("framework-platform",$missing)) { ?>
                <span class="warning">Please select a value:</span>
                <br/>
                <?php
            }
            elseif($missing && in_array("insufficient_args_frame",$missing)){?>
                    <span class="warning">Please select at least <?php echo $min_value_frame;?></span>
                <br/>
                <?php } ?>
        </label>

        <select name="framework-platform[]" id="framework-platform" size="5" multiple>
                <option value="Android"
                    <?php if(in_array("Android",$args["framework-platform"]))
                    {
                        echo "selected";
                    }?>
                >Android</option>
                <option value="CodeIgniter"
                    <?php if(in_array("CodeIgniter",$args["framework-platform"]))
                    {
                        echo "selected";
                    }?>
                >CodeIgniter</option>
                <option value="Laravel"
                    <?php if(in_array("Laravel",$args["framework-platform"]))
                    {
                        echo "selected";
                    }?>
                >Laravel</option>
                <option value="Zend"
                    <?php if(in_array("Zend",$args["framework-platform"]))
                    {
                        echo "selected";
                    }?>
                >Zend</option>
                <option value="Symfony"
                    <?php if(in_array("Symfony",$args["framework-platform"]))
                    {
                        echo "selected";
                    }?>
                >Symfony</option>
            </select>
    </p>

    <?php // accept the terms and conditions ?>
    <p>
        <input type="checkbox" name="terms" id="terms" value="agreed"
            <?php if($args["terms"] == "agreed") echo "checked";?>
        >
        <label for="terms">I agree to the terms and conditions
            <?php if($missing && in_array("terms",$missing)){?>
                <span class="warning">Please signify acceptance</span>
            <?php } ?>
        </label>
    </p>


    <p>
        <input type="submit" name="send" id="send" value="Send Comments">
    </p>
</form>
<pre>
<!--    --><?php
//    if($_GET)
//    {
//        echo 'Content of the $_GET array:<br>';
//        print_r($_GET);
//    }
//    elseif ($_POST)
//    {
//        echo 'Content of the $_POST array: <br>';
//        print_r($_POST);
//    }
//    ?>

    <?php
    if(isset($output))
    {
        echo $output;
    }

    ?>
</pre>
</body>
</html>