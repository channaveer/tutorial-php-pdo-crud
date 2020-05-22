<?php
require_once './db.php';

/** Usually you do this */
// $userId = filter_input(INPUT_GET, 'user_id', FILTER_VALIDATE_INT);
/** For the sake of demo I am hard coding */
$userId = 1;
try {
    $userQuery = $pdo->prepare("
        SELECT 
            `id`, `first_name`, `last_name`, `email`, `password`
        FROM
            `users`
        WHERE
            `id` = :user_id
    ");
    $userQuery->execute([
        ':user_id'   => $userId,
    ]);
    $user = $userQuery->fetch(PDO::FETCH_ASSOC);
    /*
        $user = $userQuery->fetch(PDO::FETCH_OBJ);
            OR
        $user = $userQuery->fetchObject();
     */
    if (!$user) {
        throw new Exception('User details not found');
    }

    echo '<pre>';
    print_r($user);
} catch (Exception $e) {
    /** Handle all your errors here */
    exit($e->getMessage());
}
