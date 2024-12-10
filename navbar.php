<?php
error_reporting(0);
session_start();
include 'dbconnect.php';

// Assuming the user's ID is stored in the session
$userId = $_SESSION['user_id'];

// Fetch the cart JSON from the users table
$query = "SELECT cart FROM users WHERE id = $userId";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Decode the JSON data from the cart field and count the items
$cartData = json_decode($row['cart'], true);
$cartItemCount = is_array($cartData) ? count($cartData) : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="navbar-container">
        <div class='navbar-max'>
            <div>
                <div class="nav-links">
                    <a class="nav-link" href="home.php">HOME</a>
                    <a class="nav-link" href="about.php">ABOUT</a>
                    <a class="nav-link" href="menu.php">MENU</a>
                    <a class="nav-link" href="protfolio.php">PORTFOLIO</a>
                    <a class="nav-link" href="blog.php">BLOG</a>
                    <a class="nav-link" href="contact.php">CONTACT&nbsp;US</a>
                </div>
            </div>
            <div>
                <div class="logo">
                    <a href="home.php">
                        <img src="img/logo.webp" alt="Logo" />
                    </a>
                </div>
            </div>
            <div class='flex'>
                <div class="social-icons">
                    <a class="icon" href="https://facebook.com">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a class="icon" href="https://instagram.com">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a class="icon" href="https://yelp.com">
                        <i class="bi bi-yelp"></i>
                    </a>
                    <a class="icon" href="">
                        <i class="bi bi-search"></i>
                    </a>
                </div>
                <div class="contact-number">234.567.3455</div>
                <div class="cartitem">
                    <a href="cart.php">
                        <i class="bi bi-cart carticon"></i>
                    </a>
                    <div class="cart-count"><?php echo $cartItemCount; ?></div>
                </div>
                <a href="order-tracking.php" class="a">Track&nbsp;Your&nbsp;Orders</a>
                <a href="logout.php">
                    <button class='nav-btn'>logout</button>
                </a>
            </div>
        </div>
        <div class="hr"></div>
    </div>

    
</body>
</html>
