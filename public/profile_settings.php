<?php
session_start();
try {
    include __DIR__.'../../includes/Config.php';
    include __DIR__.'../../Classes/Database_Functions.php';
    $title = 'Edit profile';
    $nameErr = $usernameErr = $emailErr = $genderErr = $picErr = '';
    ob_start();
    include __DIR__ . '../../templates/profile_settings.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine();
}
include __DIR__ . '../../templates/layout.html.php';
