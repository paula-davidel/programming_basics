<?php

echo ini_get('display_errors');
// It's set to dysplay the errors
if (!ini_get('display_errors')) {
    ini_set('display_errors', '1');
}

?>
<?php require_once('../private/initialize.php'); ?>
<?php
$current_page = $_GET["page"] ?? 1;
$per_page = 3;
$total_count = Bicycle::count_all_records();

$pagination = new Pagination($current_page,$per_page,$total_count);

//nou  sql pentru afisarea inregistrarilor in pagina conform setarilor de paginare de mai sus
// cu limitare si offset
$sql = "";
$sql .= " SELECT * FROM bicycles";
$sql .= " LIMIT {$per_page}";
// am definit functia offset() in clasa Pagination
// pentru a imparti numarul inregistrarilor din database exact la numarul $per_page
// petru a ne afisa numarl inregistrarilor per pagina, conform formulei:
// $result = $per_page * ($current_page -1 );
$sql .= " OFFSET {$pagination->offset()}";
// rulam noul query cu functia find_by_sql($sql)
$bikes = Bicycle::find_by_sql($sql);

?>
<?php $page_title = 'Inventory'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">

  <div id="page">
    <div class="intro">
      <img class="inset" src="<?php echo url_for('/images/AdobeStock_55807979_thumb.jpeg') ?>" />
      <h2>Our Inventory of Used Bicycles</h2>
      <p>Choose the bike you love.</p>
      <p>We will deliver it to your door and let you try it before you buy it.</p>
    </div>

    <table id="inventory">
      <tr>
        <th>Brand</th>
        <th>Model</th>
        <th>Year</th>
        <th>Category</th>
        <th>Gender</th>
        <th>Color</th>
        <th>Weight</th>
        <th>Condition</th>
        <th>Price</th>
        <th>&nbsp;</th>
      </tr>

<?php
//
//$parser = new ParseCSV(PRIVATE_PATH . '/used_bicycles.csv');
//$bike_array = $parser->parse();
//
//?>
<!--      --><?php //foreach($bike_array as $args) { ?>
<!--        --><?php //$bike = new Bicycle($args); ?>
<!--      <tr>-->
<!--        <td>--><?php //echo h($bike->brand); ?><!--</td>-->
<!--        <td>--><?php //echo h($bike->model); ?><!--</td>-->
<!--        <td>--><?php //echo h($bike->year); ?><!--</td>-->
<!--        <td>--><?php //echo h($bike->category); ?><!--</td>-->
<!--        <td>--><?php //echo h($bike->gender); ?><!--</td>-->
<!--        <td>--><?php //echo h($bike->color); ?><!--</td>-->
<!--        <td>--><?php //echo h($bike->weight_kg()) . ' / ' . h($bike->weight_lbs()); ?><!--</td>-->
<!--        <td>--><?php //echo h($bike->condition()); ?><!--</td>-->
<!--        <td>--><?php //echo h(money_format('$%i', $bike->price)); ?><!--</td>-->
<!--      </tr>-->
<!--      --><?php //} ?>

<!--        --><?php
//        $bikes = Bicycle::find_all();
//
//        ?>
        <?php foreach($bikes as $bike) { ?>
            <tr>
                <td><?php echo h($bike->brand); ?></td>
                <td><?php echo h($bike->model); ?></td>
                <td><?php echo h($bike->year); ?></td>
                <td><?php echo h($bike->category); ?></td>
                <td><?php echo h($bike->gender); ?></td>
                <td><?php echo h($bike->color); ?></td>
                <td><?php echo h($bike->weight_kg()) . ' / ' . h($bike->weight_lbs()); ?></td>
                <td><?php echo h($bike->condition()); ?></td>
                <td><?php echo h(money_format('$%i', $bike->price)); ?></td>
                <td><a href="detail.php?id=<?php echo $bike->id;?>">View</a></td>
            </tr>
        <?php } ?>
    </table>

  </div>
    <br/><br/>
    <?php
    // afisare paginare daca avm conform formulei macar 2 pagini
    $url=url_for("/bicycles.php");
    if($pagination->total_pages() >1 )
    {
        echo "<div class=\"pagination\">";
        echo $pagination->previous_link($url)." ";
        echo $pagination->number_links($url)." ";
        echo $pagination->next_link($url);
        echo "</div>";
    }
    ?>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
