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

    echo "<h3><center>After we created a new page</center></h3>";

    echo "Form parameters: <br/>";
    echo "Menu name: {$menu_name}<br/>";
    echo "Position: {$position}<br/>";
    echo "Visible: {$visible}<br/>";
}

$page_title = 'Create Page';
include(SHARED_PATH."/staff_header.php");
?>

    <div id="content">
        <a class="back-line" href="<?php echo url_for("/staff/pages/index.php");?>"> << Back to List </a>
        <div class="page new">
            <h1><?php echo $page_title;?></h1>
        </div>

        <form action="<?php echo url_for("/staff/pages/new.php");?>" method="post">
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
                        <?php for($i=1;$i<=10;$i++) {?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
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
                    <input type="checkbox" name="visible" value="1"/>
                </dd>
            </dl>

            <div id="operations">
                <input type="submit" name="submit" value="<?php echo $page_title;?>"/>
            </div>
        </form>
    </div>

<?php include(SHARED_PATH."/staff_footer.php");