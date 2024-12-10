<?php
session_start();
include('navbar.php');
include('dbconnect.php');

// Function to fetch the user's cart from the database
function getUserCart($userId) {
    global $conn;
    $query = "SELECT cart FROM users WHERE id = $userId";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return json_decode($row['cart'], true) ?: [];
}

// Function to update the user's cart in the database
function updateUserCart($userId, $cart) {
    global $conn;
    $cartJson = json_encode($cart);
    $query = "UPDATE users SET cart = '$cartJson' WHERE id = $userId";
    mysqli_query($conn, $query);
}

// Get user ID from session
$userId = $_SESSION['user_id']; // Ensure this is set on login

// Initialize cart if it doesn't exist
$cart = getUserCart($userId);

// Function to increase quantity
if (isset($_GET['increase'])) {
    $productId = intval($_GET['increase']);
    if (isset($cart[$productId])) {
        $cart[$productId]['quantity']++;
        updateUserCart($userId, $cart);
    }
    header("Location: cart.php");
    exit();
}

// Function to decrease quantity
if (isset($_GET['decrease'])) {
    $productId = intval($_GET['decrease']);
    if (isset($cart[$productId])) {
        if ($cart[$productId]['quantity'] > 1) {
            $cart[$productId]['quantity']--;
        } else {
            unset($cart[$productId]);
        }
        updateUserCart($userId, $cart);
    }
    header("Location: cart.php");
    exit();
}

// Function to remove item
if (isset($_GET['remove'])) {
    $productId = intval($_GET['remove']);
    if (isset($cart[$productId])) {
        unset($cart[$productId]);
        updateUserCart($userId, $cart);
    }
    header("Location: cart.php");
    exit();
}

// Calculate total
$total = 0;
foreach ($cart as $item) {
    $total += $item['price'] * $item['quantity'];
}

// Handle checkout request
if (isset($_POST['checkout'])) {
    // Redirect to checkout page
    header("Location: checkout.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="./css/cart.css"> <!-- Your CSS file -->
</head>
<body>
    <div class="cart-container">
        <h1 class="cart-title">Your Shopping Cart</h1>
        <div class="cart-items">
            <div class="cart-header">
                <div class="header-item">Image</div>
                <div class="header-item">Title</div>
                <div class="header-item">Price</div>
                <div class="header-item">Quantity</div>
                <div class="header-item">Total</div>
                <div class="header-item">Action</div>
            </div>
            <div class="cart-body">
                <?php if (empty($cart)): ?>
                    <p class="empty-cart">Your cart is empty.</p>
                <?php else: ?>
                    <?php foreach ($cart as $productId => $item): ?>
                        <div class="cart-item">
                            <img class="item-image" src="uploads/<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" />
                            <p class="item-title"><?php echo $item['name']; ?></p>
                            <p class="item-price">$<?php echo $item['price']; ?></p>
                            <div class="item-quantity">
                                <a class="quantity-btn" href="?increase=<?php echo $productId; ?>">+</a>
                                <?php echo $item['quantity']; ?>
                                <a class="quantity-btn" href="?decrease=<?php echo $productId; ?>">-</a>
                            </div>
                            <p class="item-total">$<?php echo $item['price'] * $item['quantity']; ?></p>
                            <a class="item-remove" href="?remove=<?php echo $productId; ?>">Remove</a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="cart-summary">
            <h2 class="summary-total">Total: $<?php echo $total; ?></h2>
            <form method="post" action="">
                <button type="submit" name="checkout" class="checkout-btn">Proceed to Checkout</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php
require('footer.php');
?>
