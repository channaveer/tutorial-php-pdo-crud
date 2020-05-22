<?php
require_once './db.php';

try {
    $userQuery = $pdo->prepare("
        SELECT 
            `id`, `first_name`, `last_name`, `email`, `password`
        FROM
            `users`
    ");
    $userQuery->execute();
    
    $users = $userQuery->fetchAll(PDO::FETCH_OBJ);

    if (!$users) {
        throw new Exception('User details not found');
    }

    echo '<pre>';
    print_r($users);
} catch (Exception $e) {
    /** Handle all your errors here */
    exit($e->getMessage());
}
