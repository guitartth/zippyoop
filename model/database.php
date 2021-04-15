<?php
    //HEROKU DATABASE CONNECTION
    
    $username = 'p85i5u4ijvnsgdh7';
    $password = 'dnpwoc1cixp0316c';


    try {
        $db = new PDO('mysql:host=j21q532mu148i8ms.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=j9ulzg6cb0nv774f', $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo $error_message;
        exit();
    }
    
    

    //LOCAL CONNECTION TESTING DATABASE SETUP
    /*
    $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
    $username = 'root';
    
    try {
        $db = new PDO($dsn, $username);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('./view/error.php');
        exit();
    }
    */
?>