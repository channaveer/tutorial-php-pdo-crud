<?php
require_once './init.php';

$host           = 'localhost';
$db_name        = 'pdo_training';
$db_username    = 'root';
$db_password    = 'root';
$dsn            = 'mysql:host='. $host .';dbname='. $db_name;
$options        = [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ];
try {
    $pdo = new PDO($dsn, $db_username, $db_password);
} catch (PDOException $e) {
    exit($e->getMessage());
}
