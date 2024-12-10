<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "coffeeshop";

$conn = mysqli_connect($host, $user, $password, $dbname);

// if (!$conn) {
//     echo "Connection failed: ";
// }
//  echo "Connection successful.";


// //create user table

 $usertbl = "CREATE TABLE users (
     id INT AUTO_INCREMENT PRIMARY KEY,
   username VARCHAR(50) NOT NULL UNIQUE,
     password VARCHAR(255) NOT NULL,
     email VARCHAR(100) NOT NULL UNIQUE,
     cart TEXT -- Stores cart data as JSON
 );";

//  if (mysqli_query($conn, $usertbl)) {
//      echo "Table users created successfully";
//  } else {
//       echo "Error creating table: ". mysqli_error($conn);
//  }

//  //create products table

 $producttbl = "CREATE TABLE products (
     id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    category VARCHAR(100) NOT NULL,
    image VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

//  if (mysqli_query($conn, $producttbl)) {
//       echo "Table products created successfully";
// } else {
//      echo "Error creating table: ". mysqli_error($conn);
//  }


//  //cretae orders table
 $ordertbl = "CREATE TABLE orders (
     id INT AUTO_INCREMENT PRIMARY KEY,
     customer_name VARCHAR(255) NOT NULL,
     product_name VARCHAR(255) NOT NULL,
     quantity INT NOT NULL,
     total_price DECIMAL(10, 2) NOT NULL,
     status ENUM('pending', 'completed', 'shipped', 'cancelled') DEFAULT 'pending',
     order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
 )";

//  if (mysqli_query($conn, $ordertbl)) {
//      echo "Table orders created successfully";
//  } else {
//      echo "Error creating table: ". mysqli_error($conn);
//  }

// ?>