<?php
require_once './db.php';
try {
    $userQuery = $pdo->prepare("
        INSERT INTO `users`
            (`first_name`, `last_name`, `email`, `password`)
        VALUES
            (:first_name, :last_name, :email, :password)
    ");
    $user = $userQuery->execute([
        ':first_name'   => 'Channaveer',
        ':last_name'    => 'Hakari',
        ':email'        => 'someemail@gmail.com',
        /** For the sake of demonstration I am using MD5, using hash for more secure */
        ':password'     => md5('password')
    ]);

    if (!$user) {
        throw new Exception('Error in adding user details');
    }

    $lastInsertedIs = $pdo->lastInsertId();
} catch (Exception $e) {
    /** Handle all your errors here */
    exit($e->getMessage());
}
