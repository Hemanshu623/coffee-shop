<?php
session_start();
include('navbar.php');
include('dbconnect.php');

// Get user ID from session
$userId = $_SESSION['user_id']; // Ensure this is set on login

// Retrieve all orders for the user
$query = "SELECT * FROM orders WHERE customer_name = (SELECT username FROM users WHERE id = $userId) ORDER BY order_date DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Tracking</title>
    <link rel="stylesheet" href="order-tracking.css"> <!-- Your CSS file -->
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

        .tracking-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #1f1f1f;
            border-radius: 8px;
            margin-top: 200px;
            margin-bottom: 100px;
        }

        .tracking-title {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }

        .order-table {
            width: 100%;
            border-collapse: collapse;
        }

        .order-table th,
        .order-table td {
            padding: 10px;
            border: 1px solid #333;
            text-align: left;
        }

        .order-table th {
            background-color: #2e2e2e;
        }

        .order-table tr:nth-child(even) {
            background-color: #2a2a2a;
        }

        .order-status {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="tracking-container">
        <h1 class="tracking-title">Order Tracking</h1>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table class="order-table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Order Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($order = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $order['id']; ?></td>
                            <td><?php echo htmlspecialchars($order['product_name']); ?></td>
                            <td><?php echo $order['quantity']; ?></td>
                            <td>$<?php echo number_format($order['total_price'], 2); ?></td>
                            <td class="order-status"><?php echo ucfirst($order['status']); ?></td>
                            <td><?php echo $order['order_date']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="empty-order">You have no orders.</p>
        <?php endif; ?>
    </div>
</body>

</html>

<?php
require('footer.php');
?>