<?php
session_start();
if (isset($_GET['user'])) {
    $user = strtolower($_GET['user']);
}
else {
    $user = 'employees';
}
try {
    $title = ucfirst($user);
    include __DIR__ . '../../includes/Config.php';
    include __DIR__ . '../../Classes/Database_Functions.php';
    $users_table = new Database_Table($pdo, 'users');
    $all_users = $users_table->findAll('position', $user);

    // Pagination
    $results_per_page = 3;
    $total_result = count($all_users);

    //total number of pages available  
    $number_of_pages = ceil($total_result / $results_per_page);

    if (!isset($_GET['page']) || !$_GET['page'] >= 1) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    //Set the sql limit
    $page_limit = ($page - 1) * $results_per_page;

    $result = $users_table->limit_query($page_limit, $results_per_page, 'position', $user);
    $links = '';
    $links .= '<a href = "user.php?user='.$user.'&page=1" class="pagination_link"> First </a>';
    //display the link of the pages in URL  
    for ($page = 1; $page <= $number_of_pages; $page++) {
        $links .= '<a href = "user.php?user='.$user.'&page=' . $page . '" class="pagination_link">' . $page . ' </a>';
    }
    $links .= '<a href = "user.php?user='.$user.'&page=' . $number_of_pages . '" class="pagination_link"> Last </a>';

    ob_start();
    include __DIR__ . '../../templates/user.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine();
}
include __DIR__ . '../../templates/layout.html.php';
