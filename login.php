<?php
session_start();
require('dbconnect.php');

$usernameError = $passwordError = $loginError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $error = false;

    // Validate form data
    if (empty($email)) {
        $usernameError = "Email is required.";
        $error = true;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $usernameError = "Invalid email format.";
        $error = true;
    }

    if (empty($password)) {
        $passwordError = "Password is required.";
        $error = true;
    }

    if (!$error) {
        // Check if the email exists and retrieve the role
        $sql = "SELECT id, password, role FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $hashed_password = $row['password'];
            $role = $row['role'];

            // Verify the password
            if (password_verify($password, $hashed_password)) {
                // Password is correct, start a session
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $role;

                // Redirect based on role
                if ($role === 'admin') {
                    header("Location: admin.php"); // Redirect to admin dashboard
                } else {
                    header("Location: home.php"); // Redirect to user dashboard
                }
                exit();
            } else {
                $loginError = "Incorrect password.";
            }
        } else {
            $loginError = "Email not found.";
        }
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <form action="" method="post">
        <h1>Login</h1>
        
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
        <?php if ($usernameError) echo "<p class='error'>$usernameError</p>"; ?>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <?php if ($passwordError) echo "<p class='error'>$passwordError</p>"; ?>
        
        <?php if ($loginError) echo "<p class='error'>$loginError</p>"; ?>
        
        <input type="submit" value="Login">
        <a href="registration.php">Don't have an account? Register here.</a>
    </form>
</body>
</html>
