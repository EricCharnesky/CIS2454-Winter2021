<?php

function get_stocks() {
    global $db; // tells PHP to go find the $db variable defined already

    $query = "select * from stock";
    $statement = $db->prepare($query);

    $statement->execute();

    $stocks = $statement->fetchAll();

    $statement->closeCursor();

    return $stocks;
}

function get_users() {
    global $db; // tells PHP to go find the $db variable defined already

    $query = "select * from user";
    $statement = $db->prepare($query);

    $statement->execute();

    $users = $statement->fetchAll();

    $statement->closeCursor();

    return $users;
}

function get_stock_orders() {
    global $db; // tells PHP to go find the $db variable defined already

    $query = "select * from user "
            . "join stockorder on stockorder.user_id = user.id "
            . "join stock on stock.id = stockorder.stock_id";
    $statement = $db->prepare($query);

    $statement->execute();

    $stockOrders = $statement->fetchAll();

    $statement->closeCursor();

    return $stockOrders;
}

function get_stocks_by_symbol($stock_symbol) {
    global $db;

    $query = "select * from stock where symbol = :symbol";
    $statement = $db->prepare($query);
    $statement->bindValue(':symbol', $stock_symbol);

    $statement->execute();

    $stocks = $statement->fetchAll();

    $statement->closeCursor();

    return $stocks;
}

function update_stock($stock_symbol, $current_price) {
    global $db;

    $query = 'UPDATE STOCK set currentPrice = :current_price where symbol = :symbol';
    $statement = $db->prepare($query);
    $statement->bindValue(":symbol", $stock_symbol);
    $statement->bindValue(":current_price", $current_price);

    $statement->execute();
    $statement->closeCursor();
}

function add_stock($stock_symbol, $current_price) {
    global $db;

    $query = 'INSERT INTO STOCK (symbol, currentPrice)'
            . 'values ( :symbol, :current_price)';
    $statement = $db->prepare($query);
    $statement->bindValue(":symbol", $stock_symbol);
    $statement->bindValue(":current_price", $current_price);

    $statement->execute();
    $statement->closeCursor();
}

function buy_stock($stock_symbol, $quantity, $name) {
    global $db;

    $query = "select * from stock where symbol = :symbol";
    $statement = $db->prepare($query);
    $statement->bindValue(':symbol', $stock_symbol);
    $statement->execute();
    $stock = $statement->fetch();
    $statement->closeCursor();
    $stockCurrentPrice = $stock['currentPrice'];
    $stockId = $stock['id'];


    $query = "select * from user where name = :name";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    $userId = $user['id'];


    $query = 'update user set balance = balance - :cost where name = :name';
    $statement = $db->prepare($query);
    $statement->bindValue(":cost", $quantity * $stockCurrentPrice);
    $statement->bindValue(":name", $name);
    $statement->execute();
    $statement->closeCursor();


    $query = 'insert into stockorder '
            . '(stock_id, purchase_price, quantity, user_id)'
            . 'values ( :stock_id, :purchase_price, :quantity, :user_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(":stock_id", $stockId);
    $statement->bindValue(":purchase_price", $stockCurrentPrice);
    $statement->bindValue(":quantity", $quantity);
    $statement->bindValue(":user_id", $userId);

    $statement->execute();
    $statement->closeCursor();
}


function sell_stock($stock_symbol, $name) {
    global $db; 
    
    $query = "select * from user "
            . "join stockorder on stockorder.user_id = user.id "
            . "join stock on stock.id = stockorder.stock_id "
            . "where name = :name and symbol = :symbol";
    $statement = $db->prepare($query);
    $statement->bindValue(':symbol', $stock_symbol);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $stockOrder = $statement->fetch();
    
    $quantity = $stockOrder['quantity'];
    $userId = $stockOrder['user_id'];
    $stockCurrentPrice = $stockOrder['currentPrice'];
    $stockId = $stockOrder['stock_id'];


    $query = 'update user set balance = balance + :cost where name = :name';
    $statement = $db->prepare($query);
    $statement->bindValue(":cost", $quantity * $stockCurrentPrice);
    $statement->bindValue(":name", $name);
    $statement->execute();
    $statement->closeCursor();

    $query = 'delete from stockorder '
             . ' where user_id = :userId and stock_id = :stockId';
    $statement = $db->prepare($query);
    $statement->bindValue(":stockId", $stockId);
    $statement->bindValue(":userId", $userId);

    $statement->execute();
    $statement->closeCursor();
}
