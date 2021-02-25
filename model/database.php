<?php
    $dsn = 'mysql:host=localhost;dbname=todolist';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
        //echo nl2br("database connected\n");
    } catch (PDOException $e) {
        $error = $e->getMessage();
        include('view/error.php');
        exit();
    }
?>