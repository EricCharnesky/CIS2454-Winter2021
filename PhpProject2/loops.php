<?php
    $times = filter_input(INPUT_GET, 'times', FILTER_VALIDATE_INT);
    
    $result = '';
    
    for ($count = 1; $count <= $times; $count++) {
        $result .= $count . "<br>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <label>Counting</label>
        <br>
        <span><?php echo $result ?></span>
    </body>
</html>
