<?php
    $name = filter_input(INPUT_GET, 'name')
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <label>Hi there</label>
        <!-- html comments are returned to the client, php comments are not -->
        <?php // remember to always use htmlspecialchars() ?>
        <span><?php echo htmlspecialchars($name) ?></span>
    </body>
</html>
