<?php

try {
    $data_source_name = 'mysql:host=localhost;dbname=test';
    $user_name = 'stocks';
    $password = 'test';

    $stock_symbol = filter_input(INPUT_GET, 'stock_symbol');

    $db = new PDO($data_source_name, $user_name, $password);
} catch (PDOException $ex) {
    $error_message = $ex->getMessage();
    include('database_error.php');
    exit();
}
