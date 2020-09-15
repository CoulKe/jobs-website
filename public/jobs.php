<?php
session_start();
try {
    $title = 'Jobs';
    include __DIR__ . '../../includes/Config.php';
    include __DIR__ . '../../Classes/Database_Functions.php';
    $users_table = new Database_Table($pdo, 'users');
    $all_employers = $users_table->findAll('position', 'employer');
    
    ob_start();
    include __DIR__ . '../../templates/jobs.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine();
}
include __DIR__ . '../../templates/layout.html.php';
