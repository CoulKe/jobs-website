<?php
try {
    include __DIR__ . '../../includes/Config.php';
    include __DIR__ . '../../classes/Database_Functions.php';
    

    $users_table = new Database_Table($pdo, 'users');
    $nameErr = $usernameErr = $emailErr = $passwordErr = $confirmErr = '';

    $all_email = $users_table->find_by_value('email');
    $all_username = $users_table->find_by_value('username');

    if (isset($_POST['register'])) {
        $first_name = $_POST['first_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];

        if (empty($first_name)) {
            $nameErr = 'First name not filled';
            die();
        } else {
            $first_name = htmlspecialchars($first_name);
        }

        if (empty($email)) {
            $emailErr = 'Email not filled';
            die();
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = 'Invalid email';
                die();
            }
            $email = htmlspecialchars($email);
        }
        if (empty($username)) {
            $usernameErr = 'Username not filled';
            die();
        } else {
            $username = htmlspecialchars($username);
        }

        if (empty($password)) {
            $passwordErr = 'Password not filled';
            die();
        } else {
            $password = htmlspecialchars($password);
        }
        if (empty($password_confirm)) {
            $confirmErr = 'Confirm password';
            die();
        } else {
            $password_confirm = htmlspecialchars($password_confirm);
        }

        if ($password !== $password_confirm) {
            $passwordErr = 'Passwords did not match';
            die();
        }

        if (in_array($email, $all_email)) {
            $emailErr = 'Email already used';
            die();
        }
        if (in_array($username, $all_username)) {
            $usernameErr = 'Username already taken';
            die();
        }
        $insert = $users_table->insert([
            'first_name' => $first_name,
            'email' => $email,
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);
        header('Location:login.php');
    }
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on ' . $e->getLine();
}
include __DIR__ . '../../templates/register.html.php';