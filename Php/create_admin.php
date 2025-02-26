<?php
include('db_config.php'); // Database connection file

// Admin username and password (you can change this)
$username = 'admin';
$password = 'rector'; // Use a strong password

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert into the admin table
$query = "INSERT INTO admin (username, password) VALUES ('$username', '$hashed_password')";

// Execute the query
if (mysqli_query($conn, $query)) {
    echo "Admin user created successfully.";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn); // Close the connection
?>
