<?php
try {
    include __DIR__ . '../../includes/Config.php';
    include __DIR__ . '../../Classes/Database_Functions.php';
    include __DIR__ . '../../Classes/Authentication.php';

    $jobs_table = new Database_Table($pdo, 'jobs');
    $users_table = new Database_Table($pdo, 'users');
    $auth = new Authentication($users_table, 'email', 'password');

    $logged_in = $auth->isLoggedIn();
    $result = $jobs_table->limit_query(0, 4);
    $jobs_array = [];
    foreach ($result as $jobs) {
        $user = $users_table->findById($jobs['user_id']);
        $jobs_array[] = [
            'id' => $jobs['user_id'],
            'company' => $jobs['company'],
            'description' => $jobs['description'],
            'first_name' => $user['first_name'],
            'username' => $user['username'],
        ];
    }

    $title = 'Home';
    ob_start();
    include __DIR__ . '../../templates/home.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine();
}
include __DIR__ . '../../templates/layout.html.php';
