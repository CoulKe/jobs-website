<?php
include __DIR__ . '../../includes/Config.php';
include __DIR__ . '../../includes/autoloader.php';

$title = "Page not found";
$output = "<h1 class = 'error_message'>404: PAGE NOT FOUND</h1>";

// To prevent unexpected logout
$users_table = new Database_Table($pdo, 'users');
$auth = new Authentication($users_table, 'email', 'password');

include __DIR__ . "../../templates/layout.html.php";
