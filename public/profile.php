<?php
try {

    include __DIR__ . '../../includes/Config.php';
    include __DIR__ . '../../Classes/Database_Functions.php';
    include __DIR__ . '../../Classes/Authentication.php';
    $users_table = new Database_Table($pdo, 'users');
    $auth = new Authentication($users_table, 'email', 'password');
    $jobs_table = new Database_Table($pdo, 'jobs');
    $testimonials_table = new Database_Table($pdo, 'testimonials');
    $title = 'profile';
    $logged_in = $auth->isLoggedIn();
    $displayForm = false;
    $unlisted = '<p>Not listed</p>';
    $profile = $_GET['username'] ?? $_GET['username'] = '';
    $profile = htmlspecialchars(trim(strtolower($profile)));
    

    // If checking undefined profile without been logged, redirect
    if (empty($profile)) {
        if (!$_SESSION['email']) {
            header('Location: index.php');
        } else {
            $user = $users_table->find_single_record('email', $_SESSION['email']);
            extract($user);
        }
    } else if (!empty($profile)) {
        $user = $users_table->find_single_record('username', $_GET['username']);
        extract($user);
    }
    // else{

    //     $user = $users_table->find_single_record('email', $_SESSION['email']);
    //     extract($user);
    // }
    if ($logged_in) {
        if (strtolower($user['email']) === strtolower($_SESSION['email'])) {
            $displayForm = true;
        }
    }
    // Post Job
    if (isset($_POST['post_job'])) {
        if (!$logged_in) {
            echo 'Not allowed';
            return;
        }
        if ($position !== 'employer') {
            die();
        } else {
            $jobs_table->insert([
                'company' => htmlspecialchars($_POST['company_name']),
                'description' => htmlspecialchars($_POST['job_description']),
                'skills_required' => htmlspecialchars($_POST['skills_required']),
                'user_id' => htmlspecialchars($id),
            ]);
        }
    }
    // Post testimonial
    if (isset($_POST['testimonial'])) {
        $testimonial = htmlspecialchars(trim($_POST['testimonial']));
        $testimonials_table->insert([
            'testimonial' => $testimonial,
            'user_id' => htmlspecialchars($id),
        ]);
    }

    ob_start();
    include __DIR__ . '../../templates/profile.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine();
}
include __DIR__ . '../../templates/layout.html.php';
