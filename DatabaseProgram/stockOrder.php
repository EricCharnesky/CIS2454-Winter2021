<?php

require('./models/database.php');
require('./models/stock_database.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_stock_orders';
    }
}

if ($action == 'list_stock_orders') {
    $stockOrders = get_stock_orders();
    require('./views/stockOrders.php');
} else if ($action == 'buy_stock') {
    $stockSymbol = filter_input(INPUT_POST, 'stock_symbol');
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_FLOAT);
    $name = filter_input(INPUT_POST, 'name');

    if ($stockSymbol == null || $quantity == null || $name == null) {
        $error = "missing symbol or quanitty or name";
        include('./views/error.php');
    } else {
        buy_stock($stockSymbol, $quantity, $name);
        header("Location: ./stockOrder.php");
    }
} else if ($action == 'sell_stock') {
    $stockSymbol = filter_input(INPUT_POST, 'stock_symbol');
    $name = filter_input(INPUT_POST, 'name');

    if ($stockSymbol == null || $name == null) {
        $error = "missing symbol or name";
        include('./views/error.php');
    } else {
        sell_stock($stockSymbol, $name);
        header("Location: ./stockOrder.php");
    }
}