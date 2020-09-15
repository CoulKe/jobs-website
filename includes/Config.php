<?php
try {
    $pdo = new PDO('mysql: host=localhost; dbname=mentor_project; charset=utf8mb4;', 'root', '');
    
} catch (PDOException $e) {
    echo 'ERROR: '.$e->getMessage().' in '.$e->getFile().' on line '.$e->getLine();
}