<?php
try {
    $pdo = new PDO('mysql: host=localhost; dbname=pagination;','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //define total number of results you want per page
    $results_per_page = 10;

    //find the total number of results stored in the database  
    $query = "SELECT * FROM alphabet";  
    $result = $pdo->query($query);
    $number_of_result = $result->rowCount();

    //determine the total number of pages available  
    $number_of_page = ceil ($number_of_result / $results_per_page);
    //determine which page number visitor is currently on  
    if (!isset ($_GET['page']) || !$_GET['page'] >= 1 ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];  
    }
    //determine the sql LIMIT starting number for the results on the displaying page  
    $page_first_result = ($page-1) * $results_per_page;
    //retrieve the selected results from database   
    $query = "SELECT *FROM alphabet LIMIT " . $page_first_result . ',' . $results_per_page;  
    $result = $pdo->query($query);
    
       
    //display the retrieved result on the webpage  
    while ($row = $result->fetch()) {  
        echo $row['id'] . ' ' . $row['alphabet'] . '</br>';  
    }

    $links = '';
    $links.='<a href = "mypaging.php?page=1"> First </a>';
    //display the link of the pages in URL  
    for($page = 1; $page<= $number_of_page; $page++) {  
        $links.= '<a href = "mypaging.php?page=' . $page . '">' . $page . ' </a>';  
    }  
    $links.='<a href = "mypaging.php?page=' . $number_of_page . '"> Last </a>';
    echo $links;
} catch (PDOException $e) {
    echo "Error: ".$e->getMessage()." in ".$e->getFile()." on line ".$e->getLine();
}