<?php
require('dbconnect.php');

// Check if the ID is set in the URL
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Prepare and execute the delete query
    $sql = "DELETE FROM users WHERE id = $userId";

    if (mysqli_query($conn, $sql)) {
        // Redirect back to the users page after deletion
        header("Location: users.php");
        exit();
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
} else {
    // If no ID is provided in the URL, redirect to the users page
    header("Location: users.php");
    exit();
}
?>
