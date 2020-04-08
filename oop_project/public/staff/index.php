<?php

echo ini_get('display_errors');
// It's set to dysplay the errors
if (!ini_get('display_errors')) {
    ini_set('display_errors', '1');
}

?>
<?php require_once('../../private/initialize.php'); ?>

<?php
if(!$session->is_logged_in())
{
    redirect_to(url_for("/staff/login.php"));
}
?>
<?php $page_title = 'Staff Menu'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div id="main-menu">
    <h2>Main Menu</h2>
    <ul>
        <li><a href="<?php echo url_for('/staff/bicycles/index.php'); ?>">Bicycles</a></li>
        <li><a href="<?php echo url_for('/staff/admins/index.php'); ?>">Admins</a></li>
    </ul>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
