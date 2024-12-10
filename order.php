<?php
require('dbconnect.php');

// Fetch orders from the database
$orderQuery = "SELECT * FROM orders";
$orderResult = mysqli_query($conn, $orderQuery);

// Check if a status update request was made
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'])) {
    $orderId = $_POST['order_id'];
    $newStatus = $_POST['status'];

    // Update the order status in the database
    $updateQuery = "UPDATE orders SET status = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($stmt, "si", $newStatus, $orderId);

    if (mysqli_stmt_execute($stmt)) {
        $message = "Order status updated successfully.";
    } else {
        $message = "Failed to update the order status.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="./css/header.css">
    <style>
        .container {
            margin-left: 270px;
            padding: 20px;
        }

        h1 {
            margin-bottom: 20px;
            color: #BB86FC;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            color: #e0e0e0;
        }

        table th, table td {
            padding: 12px;
            /* border: 1px solid #333; */
        }

        table th {
            background-color: #1E1E1E;
        }

        select {
            padding: 5px;
            background-color: #2e2e2e;
            color: #e0e0e0;
            border: none;
            border-radius: 5px;
        }

        button {
            padding: 5px 10px;
            background-color: #BB86FC;
            border: none;
            border-radius: 5px;
            color: #1E1E1E;
            cursor: pointer;
        }

        button:hover {
            background-color: #A56DDB;
        }

        .message {
            background-color: #2e2e2e;
            color: #BB86FC;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .tr1{
            text-align: justify;  
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="admin.php">Dashboard</a></li>
            <li><a href="add_product.php">Add Product</a></li>
            <li><a href="productlist.php">All product</a></li>
            <li><a href="order.php" class="active">Orders</a></li>
            <li><a href="users.php">Users</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="container">
        <h1>Orders</h1>

        <!-- Display message if any -->
        <?php if (!empty($message)): ?>
            <div class="message"><?php echo $message; ?></div>
        <?php endif; ?>

        <!-- Orders Table -->
        <table>
            <thead>
                <tr class="tr1">
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($order = mysqli_fetch_assoc($orderResult)): ?>
                    <tr>
                        <td><?php echo $order['id']; ?></td>
                        <td><?php echo htmlspecialchars($order['customer_name']); ?></td>
                        <td><?php echo htmlspecialchars($order['product_name']); ?></td>
                        <td><?php echo htmlspecialchars($order['quantity']); ?></td>
                        <td>$<?php echo number_format($order['total_price'], 2); ?></td>
                        <td>
                            <form method="POST" action="order.php">
                                <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                                <select name="status">
                                    <option value="pending" <?php echo $order['status'] === 'pending' ? 'selected' : ''; ?>>Pending</option>
                                    <option value="shipped" <?php echo $order['status'] === 'shipped' ? 'selected' : ''; ?>>Shipped</option>
                                    <option value="completed" <?php echo $order['status'] === 'completed' ? 'selected' : ''; ?>>Completed</option>
                                    <option value="cancelled" <?php echo $order['status'] === 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                                </select>
                        </td>
                        <td>
                                <button type="submit">Update</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
