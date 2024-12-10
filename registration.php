
<?php
require('dbconnect.php');

$nameError = $emailError = $passwordError = $cpasswordError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $cpassword = trim($_POST['cpassword']);
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

    if (empty($password)) {
        $passwordError = "Password is required.";
        $error = true;
    }

    if (empty($cpassword)) {
        $cpasswordError = "Confirm Password is required.";
        $error = true;
    } elseif ($password != $cpassword) {
        $cpasswordError = "Passwords do not match.";
        $error = true;
    }

    if (!$error) {
        // Check if email already exists
        $sql = "SELECT id FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $emailError = "This email is already registered.";
        } else {
            // Insert new user data into the database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, email, password) VALUES ('$name', '$email', '$hashed_password')";

            if (mysqli_query($conn, $sql)) {
                echo "Registration successful!";
                header("Location: login.php");
            } else {
                echo "Something went wrong. Please try again.";
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="./css/registration.css">
</head>
<body>
    <form action="" method="post">
        <h1 class="h1">Registration</h1>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <?php if (!empty($nameError)) echo "<span class='error'>$nameError</span>"; ?>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <?php if (!empty($emailError)) echo "<span class='error'>$emailError</span>"; ?>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <?php if (!empty($passwordError)) echo "<span class='error'>$passwordError</span>"; ?>

        <label for="cpassword">Confirm Password:</label>
        <input type="password" id="cpassword" name="cpassword" required>
        <?php if (!empty($cpasswordError)) echo "<span class='error'>$cpasswordError</span>"; ?>

        <input type="submit" name="submit" value="Register">
        <a href="login.php">you have an account? login here.</a>
    </form>
</body>
</html>
