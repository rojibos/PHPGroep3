<?php
//define('DB_HOST','localhost');
//define('DB_USER', 'root');
//define('DB_PASS','');
//define('DB_NAME', 'haarlemfestival');
//
define('DB_HOST','localhost');
define('DB_USER', 'hfa3');
define('DB_PASS', 'vlbEv6Vs');
define('DB_NAME', 'hfa3_db');

class Database
{
    protected function dbconnenct()
    {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
            $pdo = new PDO($dsn, DB_USER, DB_PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return false;
        }
    }
}