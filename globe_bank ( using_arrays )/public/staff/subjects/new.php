<?php
require_once('../../../private/initialize.php');

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
                <input type="text" name="menu_name" value=""/>
            </dd>
        </dl>

        <dl>
            <dt>
                Position
            </dt>
            <dd>
                <select name="position">
                    <option value="1">1</option>
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
            <input type="submit" name="submit" value="Create Subject"/>
        </div>
    </form>
</div>

<?php include(SHARED_PATH."/staff_footer.php");