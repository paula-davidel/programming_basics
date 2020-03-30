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
}
else
{
    $subject_id=0;
    $menu_name="";
    $position = 1;
    $visible =0;
    $content = "";

    $subjects = find_all_subjects();
    $pages = find_all_pages();
    $pages_count = mysqli_num_rows($pages)+1;
}

$page_title = 'Create Page';
include(SHARED_PATH."/staff_header.php");
?>

    <div id="content">
        <a class="back-line" href="<?php echo url_for("/staff/pages/index.php");?>"> << Back to List </a>
        <div class="page new">
            <h1><?php echo $page_title;?></h1>
        </div>

        <form action="<?php echo url_for("/staff/pages/create.php");?>" method="post">
            <dl>
                <dt>
                    Subject
                </dt>
                <dd>
                    <select name="subject_id">
                        <?php foreach($subjects as $subject){?>
                            <option value="<?php echo $subject["id"];?>">
                                <?php echo $subject["menu_name"];?>
                            </option>
                        <?php }?>
                    </select>
                </dd>
            </dl>

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
                        <?php for($i=1;$i<=$pages_count;$i++) {?>
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

            <dl>
                <dt>
                    Content
                </dt>
                <dd>
                    <input type="textarea" name="content" value="<?php echo $content;?>" />
                </dd>
            </dl>

            <div id="operations">
                <input type="submit" name="submit" value="<?php echo $page_title;?>"/>
            </div>
        </form>
    </div>

<?php include(SHARED_PATH."/staff_footer.php");