<?php
try {
    include __DIR__ . '../../includes/Config.php';
    include __DIR__ . '../../includes/autoloader.php';
    $title = 'Edit profile';
    $errors = $nameErr = $usernameErr = $emailErr = $genderErr = $rateErr = '';
    $users_table = new Database_Table($pdo, 'users');
    $auth = new Authentication($users_table, 'email', 'password');
    $user = $users_table->find_single_record('email', $_SESSION['email']);
    


    if (isset($_POST['edit_profile'])) {
        $first_name = htmlspecialchars($_POST['first_name']);
        $email = htmlspecialchars($_POST['email']);
        $about = htmlspecialchars($_POST['about']);
        $skills = htmlspecialchars($_POST['skills']);
        $rate = htmlspecialchars($_POST['rate']);

        $users_table->update([
            'id' => $user['id'],
            'first_name' => $first_name,
            'email' => $email,
            'about' => $about,
            'skills' => $skills,
            'rate' => $rate,
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
