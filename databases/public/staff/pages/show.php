<?php require_once("../../../private/initialize.php");?>

<?php //staff header ?>
<?php include(SHARED_PATH."/staff_header.php");?>


<?php //staff content ?>
    <div id="content">
        <?php
        $back = "<< Back to List";
        $id = (isset($_GET['id']) ? $_GET['id'] : "0");
        ?>
        <br/>
        <a href="<?php echo url_for('/staff/pages/index.php');?>"><?php echo htmlspecialchars($back);?></a>
        <br/><br/>
        Page ID : <?php echo htmlspecialchars($id); ?>
    </div>

<?php //staff footer ?>
<?php include(SHARED_PATH."/staff_footer.php");?>