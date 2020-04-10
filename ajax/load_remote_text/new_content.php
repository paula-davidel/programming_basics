<?php

$content = "<b> new content</b>";
// for debbuging
echo $content;
return;
// stop here amd don't run the next part of the code
?>

<span style="color:blue;">
    This is the <?php echo $content;?>  which has been loaded by Ajax.
</span>