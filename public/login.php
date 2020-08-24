<?php
try {
    include __DIR__ . '../../includes/Config.php';
    include __DIR__ . '../../Classes/Database_Functions.php';
    $error = '';
    $title = 'Login';
    $users_table = new Database_Table($pdo, 'users');

    if (isset($_POST['login'])) {
        if (empty($_POST['username'])) {
            $error = 'Fill all fields to login';
        } else if (empty($_POST['password'])) {
            $error = 'Fill all fields to login';
        } else {
            $all_username = $users_table->find_column('username', $_POST['username']);
            if (count($all_username) < 1) {
                $error = 'Username not found';
            } else {
                $username = $all_username[0]['username'];
                $query = "SELECT `password`, `email` FROM `users` WHERE `username`='" . $username . "'";
                $result = $pdo->query($query);
                while ($row = $result->fetch()) {
                    if (password_verify($_POST['password'], $row['password'])) {
                        session_start();
                        session_regenerate_id();
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['password'] = $row['password'];
                        header('Location:index.php');
                    } else {
                        $error = 'Wrong password';
                    }
                }
            }
        }
    }
    ob_start();
    include __DIR__ . '../../templates/login.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on ' . $e->getLine();
}
include __DIR__ . '../../templates/authentication.html.php';
