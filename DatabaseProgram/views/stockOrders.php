<?php include "./views/header.php"; ?>
    <body>
        <?php include "./views/navigation.php"; ?>
        
        <h1>Stock Order list</h1>
        <table>
            <th>Symbol</th>
            <th>Quantity Owned</th>
            <th>Name</th>
            <th>Purchased Price</th>
            <th>Current Price</th>
            <?php foreach ($stockOrders as $stockOrder) : ?>
                <tr>
                    <td><?php echo $stockOrder['symbol']; ?> </td>
                    <td><?php echo $stockOrder['quantity']; ?></td>
                    <td><?php echo $stockOrder['name']; ?> </td>
                    <td><?php echo $stockOrder['purchase_price']; ?></td>
                    <td><?php echo $stockOrder['currentPrice']; ?> </td>
                </tr>
            <?php endforeach; ?>
        </table>
        
        <h2>Buy Stock</h2>
        <form action="stockOrder.php" method="post">
            <div id="data">
                <label>Stock Symbol</label>
                <input type="text" name="stock_symbol"><br>
                <label>Quantity</label>
                <input type="text" name="quantity"><br>
                <label>User Name</label>
                <input type="text" name="name"><br>
                
                <input type="hidden" name="action" value="buy_stock" />

            </div>
            <div id="buttons">
                <label>&nbsp;</label>
                <input type="submit" value="Buy Stock"><br>
            </div>
        </form>
        
        <h2>Sell Stock</h2>
        <form action="stockOrder.php" method="post">
            <div id="data">
                <label>Stock Symbol</label>
                <input type="text" name="stock_symbol"><br>
                <label>User Name</label>
                <input type="text" name="name"><br>
                
                <input type="hidden" name="action" value="sell_stock" />

            </div>
            <div id="buttons">
                <label>&nbsp;</label>
                <input type="submit" value="Sell Stock"><br>
            </div>
        </form>

<?php include './views/footer.php'; ?>