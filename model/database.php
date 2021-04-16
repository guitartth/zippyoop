<?php
// OOP Database 
class Database
{
    private static $dsn = 'mysql:host=j21q532mu148i8ms.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
    private static $username = 'p85i5u4ijvnsgdh7';
    private static $password = 'dnpwoc1cixp0316c';
    private static $db;

    private function __construct()
    {/* empty on purpose */
    }

    public static function getDB()
    {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(
                    self::$dsn,
                    self::$username,
                    self::$password
                );
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('../errors/database_error.php');
                exit();
            }
        }
        return self::$db;
    }
}
    


    //HEROKU DATABASE CONNECTION
    /*
    $username = 'p85i5u4ijvnsgdh7';
    $password = 'dnpwoc1cixp0316c';


    try {
        $db = new PDO('mysql:host=j21q532mu148i8ms.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=j9ulzg6cb0nv774f', $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo $error_message;
        exit();
    }
    */
    

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