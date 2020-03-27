<?php
include("../../../private/initialize.php");

if(is_post_request())
{
    $menu_name = isset($_POST['menu_name']) ? $_POST["menu_name"] : "";
    $position = isset($_POST['position']) ? $_POST["position"] : "";
    $visible = isset($_POST['visible']) ? $_POST["visible"] : "";

    echo "<h3><center>After we created a new subject</center></h3>";

    echo "Form parameters: <br/>";
    echo "Menu name: {$menu_name}<br/>";
    echo "Position: {$position}<br/>";
    echo "Visible: {$visible}<br/>";
}
else
{
    //I need the url_for function because I had the same structure of files in to pages directory
    //and when I redirected to index.php I don't know exactly what I referred to subjects or pages
    redirect_to(url_for("/staff/subjects/new.php"));
}