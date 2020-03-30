<?php require_once("../../../private/initialize.php");?>

<?php

$page_set = find_all_pages();

$pages = array(
        array("id" => "1", 'position' => '1', 'visible' => '1', 'menu_name' => 'Globe Bank'),
        array('id' => '2', 'position' => '2', 'visible' => '1', 'menu_name' => 'History'),
        array('id' => '3', 'position' => '3', 'visible' => '1', 'menu_name' => 'Leadership'),
        array('id' => '4', 'position' => '4', 'visible' => '1', 'menu_name' => 'Contact US')
    );

$page_title="Pages";

include(SHARED_PATH."/staff_header.php");
?>

    <div id="content">
        <div class="pages listing">
            <h1><?php echo $page_title;?></h1>

            <div class="actions">
                <a class="action" href="<?php echo url_for("/staff/pages/new.php");?>">Create New Page</a>
            </div>

            <table class="list">
                <tr>
                    <th>ID</th>
                    <th>Subject</th>
                    <th>Position</th>
                    <th>Visible</th>
                    <th>Name</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>

                <?php
//                foreach($pages as $page) {
                while($page = mysqli_fetch_assoc($page_set))
                {
                    $subject = find_subject_by_id($page["subject_id"]);
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($page['id']); ?></td>
                        <td><?php echo htmlspecialchars($subject['menu_name']); ?></td>
                        <td><?php echo htmlspecialchars($page['position']); ?></td>
                        <td><?php echo $page['visible'] == 1 ? 'true' : 'false'; ?></td>
                        <td><?php echo htmlspecialchars($page['menu_name']); ?></td>
                        <td><a class="action" href="<?php echo url_for('/staff/pages/show.php?id='.htmlspecialchars(urlencode($page['id'])));?>">View</a></td>
                        <td><a class="action" href="<?php echo url_for('/staff/pages/edit.php?id='.htmlspecialchars(urlencode($page['id'])));?>">Edit</a></td>
                        <td><a class="action" href="<?php echo url_for("/staff/pages/delete.php?id=".htmlspecialchars(urlencode($page["id"])));?>">Delete</a></td>
                    </tr>
                <?php
                } ?>
            </table>
            <?php mysqli_free_result($page_set);?>

        </div>

    </div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>