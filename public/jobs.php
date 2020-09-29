<?php
try {
    $title = 'Jobs';
    include __DIR__ . '../../includes/Config.php';
    include __DIR__ . '../../Classes/Database_Functions.php';
    include __DIR__ . '../../Classes/Authentication.php';
    
    $users_table = new Database_Table($pdo, 'users');
    $authentication = new Authentication($users_table, 'email', 'password');
    $jobs_table = new Database_Table($pdo, 'jobs');

    if (isset($_GET['keyword'])) {
        $result = $jobs_table->selectLike('skills_required',$_GET['keyword']);
    }
    else{
        $result = $jobs_table->findAll();
    }

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
    
    ob_start();
    include __DIR__ . '../../templates/jobs.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine();
}
include __DIR__ . '../../templates/layout.html.php';
