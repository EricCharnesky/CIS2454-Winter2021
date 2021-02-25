<?php
require('./models/database.php');
require('./models/stock_database.php');

$users = get_users();

require ('./views/users.php');