<?php
session_start();
try {
    include __DIR__ . '../../includes/Config.php';
    include __DIR__ . '../../Classes/Database_Functions.php';
    $users_table = new Database_Table($pdo, 'users');
    $title = 'profile';

    if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
       $user = $users_table->find_single_record('email','thatcoul@gmail.com');
    extract($user);
       if ($user['email'] === $_SESSION['email'] && $user['password'] === $_SESSION['password']) {
           $logged_in = TRUE;
       }
       
    }

    ob_start();
    include __DIR__ . '../../templates/profile.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine();
}
include __DIR__ . '../../templates/layout.html.php';
