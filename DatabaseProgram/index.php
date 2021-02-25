<?php
require('./models/database.php');
require('./models/stock_database.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_stocks';
    }
}

if ($action == 'list_stocks') {
    $symbol = filter_input(INPUT_GET, 'stock_symbol');
    if ($symbol == NULL) {
        $stocks = get_stocks();
        $allStocks = $stocks;
    } else {
        $stocks = get_stocks_by_symbol($symbol);
        $allStocks = get_stocks();
    }
    require('./views/stocks.php');
} else if ($action == "add_stock") {
    $symbol = filter_input(INPUT_POST, 'stock_symbol');
    $price = filter_input(INPUT_POST, 'current_price', FILTER_VALIDATE_FLOAT);

    if ($symbol == null || $price == null) {
        $error = "missing symbol or price";
        include('./views/error.php');
    } else {
        add_stock($symbol, $price);
        header("Location: .");
    }
} else if ($action == "update_stock") {
    $symbol = filter_input(INPUT_POST, 'stock_symbol');
    $price = filter_input(INPUT_POST, 'current_price', FILTER_VALIDATE_FLOAT);

    if ($symbol == null || $price == null) {
        $error = "missing symbol or price";
        include('./views/error.php');
    } else {
        update_stock($symbol, $price);
        header("Location: .?stock_symbol=$symbol");
    }
}
?>

