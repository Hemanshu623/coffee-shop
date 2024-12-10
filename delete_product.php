<?php
require('dbconnect.php');

$id = $_GET['id'];

// Delete the product from the database
$sql = "DELETE FROM products WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    header("Location: admin.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
