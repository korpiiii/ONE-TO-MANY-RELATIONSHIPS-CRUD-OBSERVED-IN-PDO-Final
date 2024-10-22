<?php
require_once 'dbConfig.php';
require_once 'models.php';

// Get the unitownerId from the query string
if (isset($_GET['unitownerId'])) {
    $unitowner_id = $_GET['unitownerId'];

    // Delete the unitowner from the database
    $success = Unitowner::deleteUnitowner($pdo, $unitowner_id);

    if ($success) {
        header('Location: index.php');
        exit;
    } else {
        echo 'Failed to delete unitowner.';
    }
} else {
    die('Invalid request.');
}
?>
