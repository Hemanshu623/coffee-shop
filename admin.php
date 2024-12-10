<?php
require('dbconnect.php'); 
// require('header.php');

// Fetch data for dashboard widgets (example queries, modify as needed)
$totalProductsQuery = "SELECT COUNT(*) AS total_products FROM products";
$totalOrdersQuery = "SELECT COUNT(*) AS total_orders FROM orders";
$totalUsersQuery = "SELECT COUNT(*) AS total_users FROM users";
$totalRevenueQuery = "SELECT SUM(total_price) AS total_revenue FROM orders WHERE status='completed'";

$totalProductsResult = mysqli_query($conn, $totalProductsQuery);
$totalOrdersResult = mysqli_query($conn, $totalOrdersQuery);
$totalUsersResult = mysqli_query($conn, $totalUsersQuery);
$totalRevenueResult = mysqli_query($conn, $totalRevenueQuery);

$totalProducts = mysqli_fetch_assoc($totalProductsResult)['total_products'];
$totalOrders = mysqli_fetch_assoc($totalOrdersResult)['total_orders'];
$totalUsers = mysqli_fetch_assoc($totalUsersResult)['total_users'];
$totalRevenue = mysqli_fetch_assoc($totalRevenueResult)['total_revenue'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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

        .dashboard-widgets {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .widget {
            background-color: #1E1E1E;
            padding: 20px;
            border-radius: 10px;
            width: 23%;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .widget h3 {
            margin-bottom: 15px;
            color: #e0e0e0;
        }

        .widget p {
            font-size: 24px;
            color: #BB86FC;
        }

        .recent-activity {
            background-color: #1E1E1E;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .recent-activity h3 {
            color: #BB86FC;
            margin-bottom: 20px;
        }

        .recent-activity ul {
            list-style-type: none;
            padding: 0;
            color: #e0e0e0;
        }

        .recent-activity ul li {
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #333;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="admin.php" class="active">Dashboard</a></li>
            <li><a href="add_product.php">Add Product</a></li>
            <li><a href="productlist.php">All product</a></li>
            <li><a href="order.php">Orders</a></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="logout.php">Log out</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="container">
        <h1>Admin Dashboard</h1>

        <!-- Dashboard Widgets -->
        <div class="dashboard-widgets">
            <div class="widget">
                <h3>Total Products</h3>
                <p><?php echo $totalProducts; ?></p>
            </div>
            <div class="widget">
                <h3>Total Orders</h3>
                <p><?php echo $totalOrders; ?></p>
            </div>
            <div class="widget">
                <h3>Total Users</h3>
                <p><?php echo $totalUsers; ?></p>
            </div>
            <div class="widget">
                <h3>Total Revenue</h3>
                <p>$<?php echo number_format($totalRevenue, 2); ?></p>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="recent-activity">
            <h3>Recent Activity</h3>
            <ul>
                <li>Order #1234 has been completed.</li>
                <li>Product "Laptop" has been added.</li>
                <li>User "JohnDoe" registered.</li>
                <li>Order #1235 has been shipped.</li>
                <!-- Add more recent activities as needed -->
            </ul>
        </div>
    </div>
</body>
</html>
