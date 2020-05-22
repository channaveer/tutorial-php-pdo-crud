<?php
require_once './db.php';

/** Usually you do this */
// $userId = filter_input(INPUT_GET, 'user_id', FILTER_VALIDATE_INT);
/** For the sake of demo I am hard coding */
$userId = 2;
try {
    $userQuery = $pdo->prepare("
        DELETE FROM
            `users`
        WHERE
            `id` = :user_id
    ");
    $userQuery->execute([
        ':user_id'      => $userId
    ]);

    /** If no records were deleted then it will throw exception */
    if ($userQuery->rowCount() < 1) {
        throw new Exception('No records deleted.');
    }

    echo 'Deleted successfully.';
} catch (Exception $e) {
    /** Handle all your errors here */
    exit($e->getMessage());
}
