<?php
require('./models/database.php');
require('./models/stock_database.php');

$users = get_users_with_stock_info();

require ('./views/users.php');