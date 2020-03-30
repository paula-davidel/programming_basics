<?php
//
//echo ini_get('display_errors');
//// It's set to dysplay the errors
//if (!ini_get('display_errors')) {
//    ini_set('display_errors', '1');
//}
//
//?>

<?php

require_once('../../../private/initialize.php');

if(is_post_request())
{
    $subject_id = isset($_POST["subject_id"]) ? $_POST["subject_id"] : "0";
    $menu_name = isset($_POST['menu_name']) ? $_POST["menu_name"] : "";
    $position = isset($_POST['position']) ? $_POST["position"] : "1";
    $visible = isset($_POST['visible']) ? $_POST["visible"] : 0;
    $content = isset($_POST["content"]) ? $_POST["content"] : "";
//    echo "<h3><center>After we created a new page</center></h3>";
//
//    echo "Form parameters: <br/>";
//    echo "Menu name: {$menu_name}<br/>";
//    echo "Position: {$position}<br/>";
//    echo "Visible: {$visible}<br/>";
    $insert_page = array(
        "subject_id" => $subject_id,
        "menu_name" => $menu_name,
        "position"  => $position,
        "visible"   => $visible,
        "content"   => $content
    );

    $result = insert_page($insert_page);
    //redirect to show page, so we need to see the id that inserted by  sql
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for("/staff/pages/show.php?id=".$new_id));
}
else
{
    redirect_to(url_for("/staff/pages/new.php"));
}