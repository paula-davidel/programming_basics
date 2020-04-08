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

if(is_post_request()) {
    // Create record using post parameters
    $args = $_POST['bicycle'];

    $bicycle = new Bicycle($args);
    // because isn't set the id property => the save() function return the create() function
    $result = $bicycle->save();

    if($result === true) {
        $new_id = $bicycle->id;
        $_SESSION['message'] = 'The bicycle was created successfully.';
        redirect_to(url_for('/staff/bicycles/show.php?id=' . $new_id));
    }
}
else
{
    //am nevoie sa instantiez pentru ca in constructor se initializeaza toate proprietatile care definesc clasa Bicycle
    $bicycle = new Bicycle();

}

?>

<?php $page_title = 'Create Bicycle'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/bicycles/index.php'); ?>">&laquo; Back to List</a>

  <div class="bicycle new">
    <h1>Create Bicycle</h1>

    <?php echo display_errors($bicycle->errors); ?>

    <form action="<?php echo url_for('/staff/bicycles/new.php'); ?>" method="POST">
        <?php echo $_SERVER["REQUEST_METHOD"];?>
      <?php include('form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="<?php echo $page_title;?>" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
