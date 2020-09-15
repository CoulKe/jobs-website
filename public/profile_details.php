<?php
session_start();
try {
    include __DIR__ . '../../includes/Config.php';
    include __DIR__ . '../../Classes/Database_Functions.php';
    $title = 'Edit profile';
    $errors = $nameErr = $usernameErr = $emailErr = $genderErr = $rateErr = '';
    $usersTable = new Database_Table($pdo, 'users');
    $user = $usersTable->find_single_record('email', $_SESSION['email']);

    if (isset($_POST['edit_profile'])) {

        $usersTable->update([
            'id' => $user['id'],
            'first_name' => $_POST['first_name'],
            'email' => $_POST['email'],
            'about' => $_POST['about'],
            'skills' => $_POST['skills'],
            'rate' => $_POST['rate']
        ]);
        header('Location:profile.php');
    }
    ob_start();
    include __DIR__ . '../../templates/profile_details.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine();
}
include __DIR__ . '../../templates/layout.html.php';
