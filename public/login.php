<?php
session_start();
try {
    include __DIR__ . '../../includes/Config.php';

    $usersTable = new PDO('mysql: host=localhost; dbname=mentor_project; charset=utf8mb4;', 'root', '');
    $title = 'Login';

    $usernameErr = $passwordErr =  '';

    if (isset($_POST['login'])) {
        $username = htmlspecialchars($_POST['username'], ENT_COMPAT);
        $password = htmlspecialchars($_POST['password']);

        if (empty($username)) {
            $error = 'Fill all fields to login';
        } else if (empty($password)) {
            $error = 'Fill all fields to login';
        }
         else {
            $query = "SELECT `username`, `password`, `email` FROM `users` WHERE `username`='" . $username . "'";
            $result = $pdo->query($query);

            if (!$result) {
                echo '<script>alert(Something went wrong.. Try again) </script>';
            }
            while ($row = $result->fetch()) {

                if (password_verify($password, $row['password'])) {

                    $_SESSION['email'] = $row['email'];
                    $_SESSION['password'] = $row['password'];
                    echo 'Loading...';
                    header('Location:index.php');
                } else {
                    echo 'Wrong Username or Password';
                }
            }
        }
    }
    ob_start();
    include __DIR__ . '../../templates/login.html.php';
    $output = ob_get_clean();

} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine();
}
include __DIR__.'../../templates/authentication.html.php';