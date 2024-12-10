<?php
require('dbconnect.php');
require('header.php');

// Fetch all users from the database
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
    <link rel="stylesheet" href="header.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #e0e0e0;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-left: 270px;
            padding: 20px;
            max-width: 60%;
        }

        h1 {
            color: #BB86FC;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #1E1E1E;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #333;
        }

        th, td {
            padding: 12px;
            text-align: left;
            color: #e0e0e0;
        }

        th {
            background-color: #BB86FC;
            color: #1E1E1E;
        }

        tr:hover {
            background-color: #333;
        }

        .action-buttons a {
            padding: 5px 10px;
            margin-right: 5px;
            background-color: #BB86FC;
            color: #1E1E1E;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .action-buttons a:hover {
            background-color: #A56DDB;
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
            <li><a href="productlist.php">All Products</a></li>
            <li><a href="order.php">Orders</a></li>
            <li><a href="users.php" class="active">Users</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="container">
        <h1>All Users</h1>
        
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td class="action-buttons">
                            <a href="delete_user.php?id=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
