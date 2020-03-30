<?php require_once("../../../private/initialize.php");?>

<?php //staff header ?>
<?php include(SHARED_PATH."/staff_header.php");?>


<?php //staff content
$id = $_GET["id"];
$page = find_page_by_id($id);

$subject = find_subject_by_id($page["subject_id"]);
?>
    <div id="content">
        <a class="back-link" href="<?php echo url_for("/staff/pages/index.php");?>"> << Back to List</a>
        <div class="pages show">
            <h1>Subject: <?php echo htmlspecialchars($page["menu_name"]);?></h1>

            <div class="attributes">
                <dl>
                    <dt>
                        Subject
                    </dt>
                    <dd>
                       <?php echo $subject["menu_name"];?>
                    </dd>
                </dl>

                <dl>
                    <dt>Menu Name</dt>
                    <dd>
                        <?php echo htmlspecialchars($page["menu_name"]);?>
                    </dd>
                </dl>

                <dl>
                    <dt>Position</dt>
                    <dd>
                        <?php echo htmlspecialchars($page["position"]);?>
                    </dd>
                </dl>

                <dl>
                    <dt>Visible </dt>
                    <dd>
                        <?php echo $page['visible']==1 ? "true": "false";?>
                    </dd>
                </dl>

                <dl>
                    <dt>
                        Content
                    </dt>
                    <dd>
                        <?php echo $page["content"];?>
                    </dd>
                </dl>

            </div>
        </div>
    </div>

<?php //staff footer ?>
<?php include(SHARED_PATH."/staff_footer.php");?>