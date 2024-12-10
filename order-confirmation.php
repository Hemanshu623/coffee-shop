<?php
session_start();
include('navbar.php');
include('dbconnect.php');

// Fetch the last inserted order (assumed to be the most recent one for the session)
$userId = $_SESSION['user_id']; // Ensure this is set on login

// Retrieve the last order from the orders table
$query = "SELECT * FROM orders WHERE customer_name = (SELECT username FROM users WHERE id = $userId) ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $query);
$order = mysqli_fetch_assoc($result);

if (!$order) {
    // Handle the case where no order was found
    echo "No order found.";
    exit();
}

// Clear the cart after placing the order
// updateUserCart($userId, []); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="order-confirmation.css"> <!-- Your CSS file -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            background-color: #FFFBF2;
            overflow-x: hidden;

        }

        ::-webkit-scrollbar {
            display: none;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #e0e0e0;
            margin: 0;
            padding: 0;
        }

        .confirmation-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #1f1f1f;
            border-radius: 8px;
            text-align: center;
            margin-top: 200px;
        }

        .confirmation-title {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .confirmation-message {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .continue-shopping-btn {
            display: inline-block;
            width: 200px;
            padding: 10px;
            text-align: center;
            background-color: #ff9800;
            color: #121212;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .continue-shopping-btn:hover {
            background-color: #e68900;
        }
    </style>
</head>

<body>
    <div class="confirmation-container">
        <h1 class="confirmation-title">Order Confirmation</h1>
        <div class="confirmation-message">
            <p>Thank you for your purchase!</p>
            <p>Your order has been placed successfully and is now being processed.</p>
        </div>
        <a href="menu.php" class="continue-shopping-btn">Continue Shopping</a>
    </div>
</body>

</html>

<?php
require('footer.php');
?>