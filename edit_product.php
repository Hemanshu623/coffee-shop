<?php
require('dbconnect.php');
require('header.php');

// Get product details
$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['pname'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image = $_FILES['productimage']['name'];

    if ($image) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image);
        move_uploaded_file($_FILES['productimage']['tmp_name'], $target_file);
        $sql = "UPDATE products SET name = '$productName', description = '$description', price = '$price', category = '$category', image = '$image' WHERE id = $id";
    } else {
        $sql = "UPDATE products SET name = '$productName', description = '$description', price = '$price', category = '$category' WHERE id = $id";
    }

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
    <title>Edit Product</title>
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
    <h1>Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="pname">Product Name:</label>
        <input type="text" id="pname" name="pname" value="<?php echo $product['name']; ?>" required><br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?php echo $product['description']; ?></textarea><br><br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" value="<?php echo $product['price']; ?>" required><br><br>

        <label for="category">Category:</label>
        <select id="category" name="category" required>
            <option value="hotcoffee" <?php if ($product['category'] == 'hotcoffee') echo 'selected'; ?>>Hot Coffee</option>
            <option value="coldcoffee" <?php if ($product['category'] == 'coldcoffee') echo 'selected'; ?>>Cold Coffee</option>
            <option value="bakery" <?php if ($product['category'] == 'bakery') echo 'selected'; ?>>Bakery</option>
            <option value="lunch" <?php if ($product['category'] == 'lunch') echo 'selected'; ?>>Lunch</option>
        </select><br><br>

        <label for="productimage">Product Image:</label>
        <input type="file" id="productimage" name="productimage"><br><br>
        <img src="uploads/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" width="100"><br><br>

        <input type="submit" value="Update Product">
    </form>
    </div>
</body>
</html>
