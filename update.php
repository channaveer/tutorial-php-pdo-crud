<?php
require_once './db.php';

/** Usually you do this */
// $userId = filter_input(INPUT_GET, 'user_id', FILTER_VALIDATE_INT);
/** For the sake of demo I am hard coding */
$userId = 1;
$firstName = 'Balaji1';
$lastName = 'Vishwanath1';
try {
    $userQuery = $pdo->prepare("
        UPDATE 
            `users`
        SET
            `first_name`    = :first_name,
            `last_name`     = :last_name
        WHERE
            `id` = :user_id
    ");
    $userQuery->execute([
        ':first_name'   => $firstName,
        ':last_name'    => $lastName,
        ':user_id'      => $userId
    ]);

    /** If no records were updated then it will throw exception */
    if ($userQuery->rowCount() < 1) {
        throw new Exception('No records updated.');
    }

    echo 'Updated successfully.';
} catch (Exception $e) {
    /** Handle all your errors here */
    exit($e->getMessage());
}
