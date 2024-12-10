<?php
require('dbconnect.php');
include('navbar.php');

// Initialize error messages
$nameError = $emailError = $messageError = "";

// Initialize feedback message
$feedback = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and trim form data
    $name = trim($_POST['name']);
    $subject = trim($_POST['subject']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
    $error = false;

    // Validate form data
    if (empty($name)) {
        $nameError = "Name is required.";
        $error = true;
    }

    if (empty($email)) {
        $emailError = "Email is required.";
        $error = true;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format.";
        $error = true;
    }

    if (empty($message)) {
        $messageError = "Message is required.";
        $error = true;
    }

    if (!$error) {
        // Prepare the SQL statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO contact (name, subject, email, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $subject, $email, $message);

        if ($stmt->execute()) {
            // Send email functionality (update with your email)
            $to = "your-email@example.com";
            $body = "Name: $name\nEmail: $email\nSubject: $subject\nMessage:\n$message";

            if (mail($to, $subject, $body)) {
                $feedback = "Message sent successfully! Your message has also been recorded.";
            } else {
                $feedback = "Message recorded, but failed to send the email. Please try again.";
            }
        } else {
            $feedback = "Failed to record your message. Please try again.";
        }

        $stmt->close();
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee House Contact</title>
    <link rel="stylesheet" href="./css/contact.css"> <!-- Link to your custom CSS -->
</head>
<body>

    <!-- Hero Section -->
    <div class='mainmenu'>
        <div class="overlay1">
            <p class='p2'>MAKE A</p>
            <h1 class='menu-h1'>CONTACT</h1>
        </div>
    </div>

    <!-- Locations Section -->
    <section class="locations">
    <h2>Original Cafe</h2>

    <!-- Bethesda Crescent - Full-width item -->
    <div class="location-item full-width">
        <img src="img/bethesda.webp" alt="Bethesda Crescent">
        <div class="location-text">
            <h3>BETHESDA CRESCENT</h3>
            <p>7475 Wisconsin Avenue, Bethesda, MD 20814</p>
            <button>Get Directions</button>
        </div>
    </div>

    <!-- Cross Street Market and Mt. Vernon side-by-side -->
    <div class="location-grid">
        <!-- Cross Street Market -->
        <div class="location-item half-width">
            <img src="img/cross.webp" alt="Cross Street Market">
            <div class="location-text">
                <h3>CROSS STREET MARKET</h3>
                <p>1065 S. Charles St, Baltimore, MD 21230</p>
                <button>Get Directions</button>
            </div>
        </div>

        <!-- Mt. Vernon -->
        <div class="location-item half-width">
            <img src="img/mt-v.webp" alt="Mt. Vernon">
            <div class="location-text">
                <h3>MT. VERNON</h3>
                <p>520 Park Avenue, Baltimore, MD 21201</p>
                <button>Get Directions</button>
            </div>
        </div>
    </div>
</section>

    <!-- Contact Form Section -->
    <section class="contact-form">
       <center> <h2>Wanna Get In Touch</h2></center>
        <?php
        if (!empty($feedback)) {
            echo "<p class='feedback'>$feedback</p>"; // Display feedback after form submission
        }
        ?>
        <form method="POST">
            <input type="text" name="name" placeholder="Name" value="<?php echo htmlspecialchars($name ?? '', ENT_QUOTES); ?>" required>
            <input type="text" name="subject" placeholder="Subject" value="<?php echo htmlspecialchars($subject ?? '', ENT_QUOTES); ?>" required>
            <input type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email ?? '', ENT_QUOTES); ?>" required>
            <textarea name="message" placeholder="Message" required><?php echo htmlspecialchars($message ?? '', ENT_QUOTES); ?></textarea>
            <button type="submit">Send</button>
        </form>
    </section>

<?php
// Include footer
include 'footer.php'; 
?>

</body>
</html>
