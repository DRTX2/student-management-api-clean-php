<?php
declare (strict_types=1);
namespace App\Infraestructure\Persistence;

use PDO;
use PDOException;

class PdoConnection{
    private const SERVER = "localhost";
    private const PORT = "3306";
    private const DATABASE="soa";
    private const USER="root";
    private const PASSWORD="root";

    public static function connect(){
        $dsn="mysql:host=".self::SERVER.";port:".self::PORT.";dbname=".self::DATABASE.";charset=utf8";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"//luego de conectarnos a la bd establece codificacion de car
        ];
        
        try{
            return new PDO($dsn, self::USER, self::PASSWORD, $options);
        }catch(PDOException $e){
            die("Error in connection: ".$e->getMessage());
        }
    }
}

