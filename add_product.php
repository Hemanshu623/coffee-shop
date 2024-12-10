<?php
require('dbconnect.php');
require('header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['pname'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image = $_FILES['productimage']['name'];

    // Move the uploaded file to the "uploads" directory
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES['productimage']['tmp_name'], $target_file);

    // Insert the product details into the database
    $sql = "INSERT INTO products (name, description, price, category, image) 
            VALUES ('$productName', '$description', '$price', '$category', '$image')";

    if (mysqli_query($conn, $sql)) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
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

        form {
            background-color: #1E1E1E;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            color: #e0e0e0;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #BB86FC;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            background-color: #2e2e2e;
            color: #e0e0e0;
        }

        input[type="file"] {
            margin-bottom: 20px;
            color: #e0e0e0;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #BB86FC;
            border: none;
            border-radius: 5px;
            color: #1E1E1E;
            cursor: pointer;
        }

        input[type="submit"]:hover {
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
            <li><a href="add_product.php" class="active">Add Product</a></li>
            <li><a href="productlist.php">All product</a></li>
            <li><a href="order.php">Orders</a></li>
            <li><a href="users.php">Users</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="container">
        <h1>Add Product</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="pname">Product Name:</label>
            <input type="text" id="pname" name="pname" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" required>

            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <option value="hotcoffee">Hot Coffee</option>
                <option value="coldcoffee">Cold Coffee</option>
                <option value="bakery">Bakery</option>
                <option value="lunch">Lunch</option>
            </select>

            <label for="productimage">Product Image:</label>
            <input type="file" id="productimage" name="productimage" required>

            <input type="submit" value="Add Product">
        </form>
    </div>
</body>
</html>
