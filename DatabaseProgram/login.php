<?php

session_start();

require('./models/database.php');
require('./models/stock_database.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'login';
    }
}

if ($action == 'logout'){
    $_SESSION = array();
    session_destroy();
    echo 'logged out';
} else if ($action == 'login') {
    require ('./views/login.php');
} else if ($action == 'submitLogin') {
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');

    $user = get_user($username);

    if ($user != NULL) {
        if (password_verify($password, $user['password_hash'])) {
            echo "login successful";
            $_SESSION['is_logged_in'] = true;
            header("Location: ./StockOrder.php");
        } else {
            echo "incorrect password";
        }
    } else {
        // this is not a great security practice, but we don't care for now
        echo "user not found";
    }
}
