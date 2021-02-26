<?php

    $url = getenv('JAWSDB_URL');
    $dbparts = parse_url($url);

    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'],'/');


    // $dsn = 'mysql:host=localhost;dbname=todolist';
    // $username = 'root';
    // $password = '';

    // try {
    //     $db = new PDO($dsn, $username, $password);
    //     //echo nl2br("database connected\n");
    // } catch (PDOException $e) {
    //     $error = $e->getMessage();
    //     include('view/error.php');
    //     exit();
    // }

    try {
        $db = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
        }
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }


    
?>