<?php
require_once('../../../private/initialize.php');

$menu_name="";
$position =1;
$visible =0;

if(is_post_request())
{
    $menu_name = isset($_POST['menu_name']) ? $_POST["menu_name"] : "";
    $position = isset($_POST['position']) ? $_POST["position"] : "1";
    $visible = isset($_POST['visible']) ? $_POST["visible"] : 0;

    echo "<h3><center>After we created a new subject</center></h3>";

    echo "Form parameters: <br/>";
    echo "Menu name: {$menu_name}<br/>";
    echo "Position: {$position}<br/>";
    echo "Visible: {$visible}<br/>";

}
else
{
    $subject_set = find_all_subjects();
    $subject_count = mysqli_num_rows($subject_set)+1;
}


$page_title = 'Create Subject';
include(SHARED_PATH."/staff_header.php");
?>

<div id="content">
    <a class="back-line" href="<?php echo url_for("/staff/subjects/index.php");?>"> << Back to List </a>
    <div class="subject new">
        <h1><?php echo $page_title;?></h1>
    </div>

    <form action="<?php echo url_for("/staff/subjects/create.php");?>" method="post">
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