<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Database {
    private static $host = "localhost";
    private static $db_name = "dream_archive";
    private static $username = "root";
    private static $password = "";
    private static $conn = null;

    public static function getConnection(){
        if(self::$conn === null){
            try{
                self::$conn = new PDO(
                    "mysql:host=" . self::$host . ";dbname=" . self::$db_name . ";charset=utf8m4",
                    self::$username,
                    self::$password
                );

                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $exception){
                die("Erro de conexao: " . $exception->getMessage());
            }
            return self::$conn;
        }
    }

}