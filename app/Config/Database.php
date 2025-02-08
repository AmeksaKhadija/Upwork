<?php 
namespace app\Config;
use PDO;
use PDOException;
class Database 
{
    private static $servername = "localhost";
    private static $username = "postgres";
    private static $password = "0000";
    private static $port = "5432";
    private static $dbname = "upwork";
    private static $connexion;
    private static $instance;
    public static $counter = 0;

    private function __construct(){
        if (!self::$connexion) {
            try {
               
                self::$connexion = new PDO(
                    "pgsql:host=" . self::$servername .
                    ";dbname=" . self::$dbname .
                    ";port=" .self::$port.
                    ";user=" . self::$username . 
                    ";password=" . self::$password
                );
               
                self::$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }

    }

    public static function getInstance() {
        if(!self::$instance){
            self::$instance = new Database();
            self::$counter++;
        }
            return self::$instance ;
        }

    public function getConnection(){
        return self::$connexion;
    }


}