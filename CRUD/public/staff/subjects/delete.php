<?php

require_once("../../../private/initialize.php");

$id = $_GET['id'];
$subject = find_subject_by_id($id);
$page_title = "Delete Subject";

if(is_post_request())
{
    $result = delete_subject($id);
    redirect_to(url_for("/staff/subjects/index.php"));
}
include(SHARED_PATH."/staff_header.php");
?>

    <div id="content">

        <a class="back-link" href="<?php echo url_for("/staff/subjects/index.php");?>"> << Back to List</a>

        <div class="subject delete">
                <h1>Delete Subject</h1>
                <p>Are you sure you want to delete this subject? </p>
            <p class="item"> <?php echo htmlspecialchars($subject['menu_name']);?></p>
        </div>

        <form action="<?php echo url_for("/staff/subjects/delete.php?id=".htmlspecialchars(urlencode($id)));?>" method="post">

            <div id="operations">
                <input type="submit" value="<?php echo $page_title;?>"/>
            </div>

        </form>
    </div>

<?php include(SHARED_PATH."/staff_footer.php");?>