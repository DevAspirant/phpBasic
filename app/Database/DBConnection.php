<?php
class DBConnection
{
    private static $pdo;

    public static function make()
    {
        try {
            self::$pdo = self::$pdo ?: new PDO('mysql:host=localhost;dbname=php_basic', 'admin', '123456789');
            return self::$pdo;
        } catch (Exception $e) {
            echo 'Error = ' . $e;
            die($e->getMessage());
        }
    }

}

?>