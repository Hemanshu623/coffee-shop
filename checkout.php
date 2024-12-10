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

// Function to create an order
function createOrder($userId, $cart, $shippingDetails, $paymentDetails) {
    global $conn;

    // Insert each product in the cart into the orders table
    foreach ($cart as $productId => $item) {
        $query = "INSERT INTO orders (customer_name, product_name, quantity, total_price, status, order_date) VALUES (
            '{$shippingDetails['name']}',
            '{$item['name']}',
            {$item['quantity']},
            {$item['price']} * {$item['quantity']},
            'pending',
            NOW()
        )";
        mysqli_query($conn, $query);
    }
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
    header("Location: checkout.php");
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
    header("Location: checkout.php");
    exit();
}

// Function to remove item
if (isset($_GET['remove'])) {
    $productId = intval($_GET['remove']);
    if (isset($cart[$productId])) {
        unset($cart[$productId]);
        updateUserCart($userId, $cart);
    }
    header("Location: checkout.php");
    exit();
}

// Handle checkout
if (isset($_POST['checkout'])) {
    // Collect shipping and payment details
    $shippingDetails = [
        'name' => $_POST['name'],
        'address' => $_POST['address'],
        'city' => $_POST['city'],
        'state' => $_POST['state'],
        'zip' => $_POST['zip'],
        'country' => $_POST['country']
    ];

    $paymentDetails = [
        'card_number' => $_POST['card-number'],
        'expiry_date' => $_POST['expiry-date'],
        'cvv' => $_POST['cvv']
    ];

    // Create the order
    createOrder($userId, $cart, $shippingDetails, $paymentDetails);

    // Clear the cart after placing the order
    updateUserCart($userId, []);

    // Redirect to order confirmation page
    header("Location: menu.php");
    exit();
}

// Calculate total
$total = 0;
foreach ($cart as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="./css/checkout.css"> <!-- Your CSS file -->
</head>

<body>
    <div class="checkout-container">
        <h1 class="checkout-title">Checkout</h1>
        <form method="POST">
            <div class="checkout-content">
                <div class="order-review">
                    <h2 class="section-title">Order Review</h2>
                    <div class="order-summary">
                        <div class="order-header">
                            <div class="header-item">Image</div>
                            <div class="header-item">Title</div>
                            <div class="header-item">Price</div>
                            <div class="header-item">Quantity</div>
                            <div class="header-item">Total</div>
                        </div>
                        <div class="order-body">
                            <?php if (empty($cart)): ?>
                            <p class="empty-cart">Your cart is empty.</p>
                            <?php else: ?>
                            <?php foreach ($cart as $productId => $item): ?>
                            <div class="order-item">
                                <img class="item-image" src="uploads/<?php echo $item['image']; ?>"
                                    alt="<?php echo $item['name']; ?>" />
                                <p class="item-title"><?php echo $item['name']; ?></p>
                                <p class="item-price">$<?php echo $item['price']; ?></p>
                                <p class="item-quantity"><?php echo $item['quantity']; ?></p>
                                <p class="item-total">$<?php echo $item['price'] * $item['quantity']; ?></p>
                            </div>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="order-summary">
                        <h2 class="summary-total">Total: $<?php echo $total; ?></h2>
                    </div>
                </div>

                <div class="shipping-details">
                    <h2 class="section-title">Shipping Details</h2>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" required>
                    </div>
                    <div class="form-group">
                        <label for="state">State</label>
                        <input type="text" id="state" name="state" required>
                    </div>
                    <div class="form-group">
                        <label for="zip">ZIP Code</label>
                        <input type="text" id="zip" name="zip" required>
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" id="country" name="country" required>
                    </div>
                </div>

                <div class="payment-details">
                    <h2 class="section-title">Payment Information</h2>
                    <div class="form-group">
                        <label for="card-number">Card Number</label>
                        <input type="text" id="card-number" name="card-number" required>
                    </div>
                    <div class="form-group">
                        <label for="expiry-date">Expiry Date</label>
                        <input type="text" id="expiry-date" name="expiry-date" required>
                    </div>
                    <div class="form-group">
                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv" name="cvv" required>
                    </div>
                </div>
            </div>
            <button class="checkout-btn" type="submit" name="checkout">Proceed to Checkout</button>
        </form>
    </div>
</body>

</html>

<?php
require('footer.php');
?>