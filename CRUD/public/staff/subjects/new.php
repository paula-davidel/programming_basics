<?php
require_once('../../../private/initialize.php');

if(is_post_request())
{
    $menu_name = isset($_POST['menu_name']) ? $_POST["menu_name"] : "";
    $position = isset($_POST['position']) ? $_POST["position"] : "";
    $visible = isset($_POST['visible']) ? $_POST["visible"] : "";

//    echo "<h3><center>After we created a new subject</center></h3>";
//
//    echo "Form parameters: <br/>";
//    echo "Menu name: {$menu_name}<br/>";
//    echo "Position: {$position}<br/>";
//    echo "Visible: {$visible}<br/>";

    $insert_subject = array(
        "menu_name" => $menu_name,
        "position" => $position,
        "visible" => $visible
    );

    $result = insert_subject($insert_subject);

    if($result === true )
    {
        //redirect to show page, so we need to see the id that inserted by  sql
        $new_id = mysqli_insert_id($db);
        redirect_to(url_for("/staff/subjects/show.php?id=".$new_id));
    }
    else
    {
        $errors = $result;
    }
}

$menu_name="";
$position =1;
$visible =0;
$subject_set = find_all_subjects();
$subject_count = mysqli_num_rows($subject_set)+1;

$page_title = 'Create Subject';
include(SHARED_PATH."/staff_header.php");
?>

<div id="content">
    <a class="back-line" href="<?php echo url_for("/staff/subjects/index.php");?>"> << Back to List </a>
    <div class="subject new">
        <h1><?php echo $page_title;?></h1>
    </div>

    <?php echo display_errors($errors);?>

    <form action="<?php echo url_for("/staff/subjects/new.php");?>" method="post">
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
                    <?php for($i=1;$i<=$subject_count;$i++) {?>
                        <option value="<?php echo $i;?>" <?php if($i == $position){ echo "selected"; }?>><?php echo $i;?></option>
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
            <input type="submit" name="submit" value="<?php echo $page_title;?>"/>
        </div>
    </form>
</div>

<?php include(SHARED_PATH."/staff_footer.php");