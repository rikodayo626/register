<?php
    function db() {
        try {
            $dsn = 'mysql:dbname=rutlakadai;host=localhost';
            $user = 'root';
            $pass = 'rutla';
            $pdo = new PDO($dsn, $user, $pass);
            return $pdo;
        } catch (PDOException $e) {
            echo $e -> getMessage();
            return $db = null;
        }
    }
?>

