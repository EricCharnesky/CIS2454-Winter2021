<?php
$data_source_name = 'mysql:host=localhost;dbname=test';
$user_name = 'stocks';
$password = 'test';

$stock_symbol = filter_input(INPUT_GET, 'stock_symbol');

try {
    $db = new PDO($data_source_name, $user_name, $password);

    if ($stock_symbol != "") {
        $query = "select * from stock where symbol = :symbol";
        $statement = $db->prepare($query);
        $statement->bindValue(':symbol', $stock_symbol);
    } else {
        $query = "select * from stock";
        $statement = $db->prepare($query);
    }
    $statement->execute();

    $stocks = $statement->fetchAll();
    
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
        <h1>Stock list</h1>
        <table>
<?php foreach ($stocks as $stock) : ?>
                <tr>
                    <td><?php echo $stock['symbol']; ?> </td>
                    <td><?php echo $stock['currentPrice']; ?></td>
                </tr>
<?php endforeach; ?>

        </table>

        <h2>Find Stock</h2>
        <form action="index.php" method="get">
            <div id="data">
                <label>Stock Symbol</label>
                <input type="text" name="stock_symbol"><br>

            </div>
            <div id="buttons">
                <label>&nbsp;</label>
                <input type="submit" value="Find"><br>
            </div>
        </form>
        
        <h2>Add Stock</h2>
        <form action="addStock.php" method="post">
            <div id="data">
                <label>Stock Symbol</label>
                <input type="text" name="stock_symbol"><br>
                <label>Current Price</label>
                <input type="text" name="current_price"><br>

            </div>
            <div id="buttons">
                <label>&nbsp;</label>
                <input type="submit" value="Add"><br>
            </div>
        </form>
        
        <h2>Update Stock Price</h2>
        <form action="updateStock.php" method="post">
            <div id="data">
                <label>Stock Symbol</label>
                <input type="text" name="stock_symbol"><br>
                <label>Current Price</label>
                <input type="text" name="current_price"><br>

            </div>
            <div id="buttons">
                <label>&nbsp;</label>
                <input type="submit" value="Update"><br>
            </div>
        </form>
        
        <h2>Buy Stock</h2>
        <form action="buyStock.php" method="post">
            <div id="data">
                <label>Stock Symbol</label>
                <input type="text" name="stock_symbol"><br>
                <label>Quantity</label>
                <input type="text" name="quantity"><br>

            </div>
            <div id="buttons">
                <label>&nbsp;</label>
                <input type="submit" value="Buy"><br>
            </div>
        </form>
    </body>
</html>
