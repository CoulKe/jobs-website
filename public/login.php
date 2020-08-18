<?php
session_start();
try {
    $usersTable = new PDO('mysql: host=localhost; dbname=mentor_project; charset=utf8mb4;', 'root', '');
    include __DIR__.'../../templates/login.html.php';

    if (isset($_POST['login'])) {
        $username = htmlspecialchars($_POST['username'], ENT_COMPAT);
        $password = htmlspecialchars($_POST['password']);


        $query = "SELECT `username`, `password` FROM `users` WHERE `username`='" . $username . "'";
        $result = $pdo->query($query);

        if (!$result) {
            echo 'Something went wrong.. Try again';
        }
        while ($row = $result->fetch()) {

            if (password_verify($password, $row['password'])) {
                
                $_SESSION['loggedIn'] = TRUE;
                $_SESSION['username'] = $_POST['username'];
                header('Location:index.php');
            } else {
                echo 'Wrong Username or Password';
            }
        }
    }

} catch (PDOException $e) {
    echo 'ERROR: '.$e->getMessage().' in '.$e->getFile().' on line '.$e->getLine();
}