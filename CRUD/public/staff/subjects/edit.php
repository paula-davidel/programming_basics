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
if(!isset($_GET['id']))
{
    redirect_to(url_for("/staff/subjects/index.php"));
}

$id = $_GET['id'];

if(is_post_request())
{
    $old_values= find_subject_by_id($id);
    $menu_name = isset($_POST['menu_name']) ? $_POST["menu_name"] : $old_values['menu_name'];
    $position = isset($_POST['position']) ? $_POST["position"] : $old_values['position'];
    $visible = isset($_POST['visible']) ? $_POST["visible"] : $old_values['visible'];

//    echo "<h3><center>After we updated a new subject</center></h3>";
//
//    echo "Form parameters: <br/>";
//    echo "Menu name: {$menu_name}<br/>";
//    echo "Position: {$position}<br/>";
//    echo "Visible: {$visible}<br/>";

    $new_values = array(
            "id" => $id,
            "menu_name" => $menu_name,
            "position" => $position,
            "visible" => $visible
    );

    $result = update_subject($new_values);
    if($result == 1)
    {
        redirect_to(url_for("/staff/subjects/show.php?id=".$id));
    }
    else
    {
        $errors=$result;
    }
}
else
{
    $subject= find_subject_by_id($id);
    //by default, we set the values from database
    $menu_name = $subject['menu_name'];
    $position = $subject['position'];
    $visible = $subject['visible'];
}

$subject_set = find_all_subjects();
$subject_count = mysqli_num_rows($subject_set);

?>

<?php
$page_title = 'Edit Subject';
include(SHARED_PATH."/staff_header.php");
?>

    <div id="content">
        <a class="back-line" href="<?php echo url_for("/staff/subjects/index.php");?>"> << Back to List </a>
        <div class="subject edit">
            <h1><?php echo $page_title;?></h1>
        </div>

        <?php echo display_errors($errors);?>
        <form action="<?php echo url_for("/staff/subjects/edit.php?id=".$id);?>" method="post">
            <dl>
                <dt>
                    Menu Name
                </dt>
                <dd>
                    <input type="text" name="menu_name" value="<?php echo $menu_name;?>"/>
                </dd>
            </dl>

            <dl>
                <dt>
                    Position
                </dt>
                <dd>
                    <select name="position">
                        <?php for($i=1; $i <= $subject_count; $i++) {?>
                            <option value="<?php echo $i;?>" <?php if($i == $position){ echo "selected"; }?>><?php echo $i;?> </option>
                        <?php }?>
                    </select>
                </dd>
            </dl>

            <dl>
                <dt>
                    Visible
                </dt>
                <dd>
                    <input type="hidden" name="visible" value="0"/>
                    <input type="checkbox" name="visible" value="1" <?php if($visible == 1){ echo "checked"; } ?>/>
                </dd>
            </dl>

            <div id="operations">
                <input type="submit" value="<?php echo $page_title;?>"/>
            </div>
        </form>
    </div>

<?php include(SHARED_PATH."/staff_footer.php");