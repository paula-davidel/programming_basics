<?php

echo ini_get('display_errors');
// It's set to dysplay the errors
if (!ini_get('display_errors')) {
    ini_set('display_errors', '1');
}

?>
<?php require_once('../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">

  <ul id="menu">
    <li><a href="<?php echo url_for('/bicycles.php'); ?>">View Our Inventory</a></li>
    <li><a href="<?php echo url_for('/about.php'); ?>">About Us</a></li>
  </ul>
    
</div>

<?php $super_hero_image = 'AdobeStock_18040381_xlarge.jpeg'; ?>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
