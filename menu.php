<?php
session_start();
include('dbconnect.php');
include('navbar.php');

// Fetch categories
$categories = [];
$category_query = "SELECT DISTINCT category FROM products";
$result = mysqli_query($conn, $category_query);

while ($row = mysqli_fetch_assoc($result)) {
    $categories[] = $row['category'];
}

// Fetch products
$products = [];
$product_query = "SELECT * FROM products";
$result = mysqli_query($conn, $product_query);

while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}

if (isset($_GET['add_to_cart'])) {
    $productId = intval($_GET['add_to_cart']);
    $userId = $_SESSION['user_id'];

    // Fetch product details
    $product_query = "SELECT * FROM products WHERE id = $productId";
    $result = mysqli_query($conn, $product_query);
    $product = mysqli_fetch_assoc($result);

    // Get user's cart
    $cartQuery = "SELECT cart FROM users WHERE id = $userId";
    $cartResult = mysqli_query($conn, $cartQuery);
    $cartRow = mysqli_fetch_assoc($cartResult);
    $cart = json_decode($cartRow['cart'], true) ?: [];

    // Add product to cart
    if (isset($cart[$productId])) {
        $cart[$productId]['quantity']++;
    } else {
        $cart[$productId] = [
            'name' => $product['name'],
            'price' => $product['price'],
            'quantity' => 1,
            'image' => $product['image']
        ];
    }

    // Update cart in database
    $cartJson = json_encode($cart);
    $updateCartQuery = "UPDATE users SET cart = '$cartJson' WHERE id = $userId";
    mysqli_query($conn, $updateCartQuery);

    // Return a JSON response for AJAX
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'message' => 'Product added to cart.']);
        exit();
    }

    // Redirect to the same page
    header("Location: menu.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Page</title>
    <link rel="stylesheet" href="./css/menuPage.css"> <!-- Your CSS file -->
</head>

<body>
    <div class='mainmenu'>
        <div class="overlay1">
            <p class='p2'>Check out</p>
            <h1 class='menu-h1'>OUR MENUS</h1>
        </div>
    </div>

    <div class="linebg"></div>
    <div class="gasp1">
        <center>
            <div class="menu-text">
                <p class='menu-p1'>"THE FIRST CUP IS FOR THE GUEST, THE SECOND FOR</p>
                <p class='menu-p2'>ENJOYMENT, THE THIRD FOR THE SWORD</p>
            </div>
            <div class='menu-page'>
                <?php foreach ($categories as $category): ?>
                <div class="title">
                    <div onclick="filterCategory('<?php echo $category; ?>')" class="t1">
                        <div class="img">
                            <img id="img-<?php echo $category; ?>" src="img/<?php echo $category; ?>.jpg"
                                alt="<?php echo $category; ?>">
                        </div>
                        <h2 class='h2'><?php echo $category; ?></h2>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </center>
    </div>

    <h2 class='coffeetext'>Top menu near you</h2>
    <center>
        <div class="product-list">
            <?php foreach ($products as $product): ?>
            <div class="card" data-category="<?php echo $product['category']; ?>">
                <div class="img">
                    <img src="uploads/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                </div>
                <div class="card-content">
                    <div class="card-title"><?php echo $product['name']; ?></div>
                    <div class="card-description"><?php echo $product['description']; ?></div>
                    <div class="card-rating">
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                    </div>
                    <div class="addprice">
                        <div class="card-price">$<?php echo $product['price']; ?></div>
                        <button class='btn' onclick="addToCart(<?php echo $product['id']; ?>)">Add to Cart</button>

                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </center>

    <script>
    let currentCategory = 'All';

    function filterCategory(selectedCategory) {
        const cards = document.querySelectorAll('.card');

        // Toggle the selected category
        if (currentCategory === selectedCategory) {
            currentCategory = 'All';
        } else {
            currentCategory = selectedCategory;
        }

        // Display products based on the selected category
        cards.forEach(card => {
            if (currentCategory === 'All' || card.dataset.category === currentCategory) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });

        // Update category images based on selection
        document.querySelectorAll('.menu-page .img img').forEach(img => {
            img.classList.toggle('active', currentCategory !== 'All' && img.alt === currentCategory);
        });
    }


    function addToCart(productId) {
        fetch(`?add_to_cart=${productId}`, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                } else {
                    alert('Failed to add product to cart.');
                }
            })
            .catch(error => console.error('Error:', error));
    }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"
        integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"
        integrity="sha512-onMTRKJBKz8M1TnqqDuGBlowlH0ohFzMXYRNebz+yOcc5TQr/zAKsthzhuv0hiyUKEiQEQXEynnXCvNTOk50dg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="Product.js"></script>
</body>

</html>

<?php
require('footer.php');
?>