<?php

function get_stocks(){
    global $db; // tells PHP to go find the $db variable defined already
    
    $query = "select * from stock";
    $statement = $db->prepare($query);
    
    $statement->execute();

    $stocks = $statement->fetchAll();
    
    $statement->closeCursor();
    
    return $stocks;
}

function get_stocks_by_symbol($stock_symbol){
    global $db;
    
    $query = "select * from stock where symbol = :symbol";
    $statement = $db->prepare($query);
    $statement->bindValue(':symbol', $stock_symbol);
    
    $statement->execute();

    $stocks = $statement->fetchAll();
    
    $statement->closeCursor();
    
    return $stocks;
}

function update_stock($stock_symbol, $current_price){
    global $db;
    
    $query = 'UPDATE STOCK set currentPrice = :current_price where symbol = :symbol';
    $statement = $db->prepare($query);
    $statement->bindValue(":symbol", $stock_symbol);
    $statement->bindValue(":current_price", $current_price);
    
    $statement->execute();
    $statement->closeCursor();
}

function add_stock($stock_symbol, $current_price){
    global $db;
    
    $query = 'INSERT INTO STOCK (symbol, currentPrice)'
            . 'values ( :symbol, :current_price)';
    $statement = $db->prepare($query);
    $statement->bindValue(":symbol", $stock_symbol);
    $statement->bindValue(":current_price", $current_price);
    
    $statement->execute();
    $statement->closeCursor();
}