<?php
try {
    include __DIR__ . '../../includes/Config.php';
    include __DIR__ . '../../classes/Database_Functions.php';


    $users_table = new Database_Table($pdo, 'users');
    $title = 'Register';
    $nameErr = $usernameErr = $emailErr = $genderErr = $passwordErr = $confirmErr = '';

    $errors = [];

    if (isset($_POST['register'])) {
        $first_name = $_POST['first_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];

        if (empty($first_name)) {
            $nameErr = 'First name not filled';
            array_push($errors, $nameErr);
        } else {
            $first_name = htmlspecialchars($first_name);
        }

        if (empty($email)) {
            $emailErr = 'Email not filled';
            array_push($errors, $emailErr);
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = 'Invalid email';
                array_push($errors, $emailErr);
            } else {
                $used_email = $users_table->find_by_value('email', $email);

                if (count($used_email) > 0) {
                    $emailErr = 'Email already used';
                    array_push($errors, $emailErr);
                } else {
                    $email = htmlspecialchars($email);
                }
            }
        }
        if (empty($username)) {
            $usernameErr = 'Username not filled';
            array_push($errors, $usernameErr);
        } else {
            $used_username = $users_table->find_by_value('username', $username);
            if (count($used_username) > 0) {
                $usernameErr = 'Username already taken';
                array_push($errors, $usernameErr);
            } else {
                $username = htmlspecialchars($username);
            }
        }

        if (empty($password)) {
            $passwordErr = 'Password not filled';
            array_push($errors, $passwordErr);
        } else {
            if (!empty($password) !== !empty($password_confirm)) {
                $passwordErr = 'Passwords did not match';
                array_push($errors, $passwordErr);
            } else {
                $password = htmlspecialchars($password);
            }
        }
        if (empty($password_confirm)) {
            $confirmErr = 'Confirm password';
            array_push($errors, $confirmErr);
        } else {
            $password_confirm = htmlspecialchars($password_confirm);
        }


        if (!count($errors) >= 1) {
            $users_table->insert([
                'first_name' => $first_name,
                'email' => strtolower($email),
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]);
            header('Location:login.php');
            echo 'successfully registered';
        }
    }
    ob_start();
    include __DIR__ . '../../templates/register.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on ' . $e->getLine();
}
include __DIR__ . '../../templates/authentication.html.php';
