<?php

echo ini_get('display_errors');
// It's set to dysplay the errors
if (!ini_get('display_errors')) {
    ini_set('display_errors', '1');
}

?>
<?php require_once('../../../private/initialize.php'); ?>

<?php
  
// Find all bicycles;
//$bicycles = Bicycle::find_all();

//pagination
$current_page = $_GET["page"] ?? 1;
$per_page =5;
$total_count = Bicycle::count_all_records();

$pagination = new Pagination($current_page,$per_page,$total_count);
$sql="";
$sql .= " SELECT * FROM bicycles";
$sql .= " LIMIT {$per_page}";
$sql .= " OFFSET {$pagination->offset()}";
$bicycles = Bicycle::find_by_sql($sql);
?>
<?php $page_title = 'Bicycles'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="bicycles listing">
    <h1>Bicycles</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/staff/bicycles/new.php'); ?>">Add Bicycle</a>
    </div>

  	<table class="list">
      <tr>
        <th>ID</th>
        <th>Brand</th>
        <th>Model</th>
        <th>Year</th>
        <th>Category</th>
        <th>Gender</th>
        <th>Color</th>
        <th>Price</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php foreach($bicycles as $bicycle) { ?>
        <tr>
          <td><?php echo h($bicycle->id); ?></td>
          <td><?php echo h($bicycle->brand); ?></td>
          <td><?php echo h($bicycle->model); ?></td>
          <td><?php echo h($bicycle->year); ?></td>
          <td><?php echo h($bicycle->category); ?></td>
          <td><?php echo h($bicycle->gender); ?></td>
          <td><?php echo h($bicycle->color); ?></td>
          <td><?php echo h($bicycle->price); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/bicycles/show.php?id=' . h(u($bicycle->id))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/bicycles/edit.php?id=' . h(u($bicycle->id))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/bicycles/delete.php?id=' . h(u($bicycle->id))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>
      <br/><br/><br/>
    <?php
    $url = url_for("/staff/bicycles/index.php");
    if($pagination->total_pages()>1)
    {
            echo "<div class=\"pagination\">";
            // static
//            //previous
//            if($pagination->previous_page() != false)
//            {
//                echo "<a href=\"{$url}?page={$pagination->previous_page()}\">&laquo; Previous</a>";
//            }
//            //the number of the page
//            for($i=1; $i<=$pagination->total_pages(); $i++)
//            {
//                if($i == $pagination->current_page)
//                {
//                    echo "<span class=\"selected\">{$i}</span>";
//                }
//                else
//                {
//                    echo "<a href=\"{$url}?page={$i}\">{$i}</a>";
//                }
//            }
//            // next
//            if($pagination->next_page() != false)
//            {
//                echo "<a href=\"{$url}?page={$pagination->next_page()}\">Next &raquo;</a>";
//            }

        //dynamic
            echo $pagination->previous_link($url);
            echo $pagination->number_links($url);
            echo $pagination->next_link($url);

            echo "</div>";

        }?>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
