<?php
session_start();
try {
    $title = 'Home';
    ob_start();
    include __DIR__ . '../../templates/home.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine();
}
include __DIR__ . '../../templates/layout.html.php';