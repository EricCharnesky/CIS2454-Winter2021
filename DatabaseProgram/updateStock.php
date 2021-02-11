
<?php
$data_source_name = 'mysql:host=localhost;dbname=test';
$user_name = 'stocks';
$password = 'test';

$stock_symbol = filter_input(INPUT_POST, 'stock_symbol');
$current_price = filter_input(INPUT_POST, 'current_price', FILTER_VALIDATE_FLOAT);

try {
    $db = new PDO($data_source_name, $user_name, $password);
    
    $query = 'UPDATE STOCK set currentPrice = :current_price where symbol = :symbol';
    $statement = $db->prepare($query);
    $statement->bindValue(":symbol", $stock_symbol);
    $statement->bindValue(":current_price", $current_price);
    
    $statement->execute();
    $statement->closeCursor();
    
    
} catch (PDOException $ex) {
    $error_message = $ex->getMessage();
    include('database_error.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>updated stock, go back to see it</h2>
        <a href="index.php">click to go back</a>
    </body>
</html>
