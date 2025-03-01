<?php
$servername = "localhost";
$username = "root";  // Change if needed
$password = "";  // Change if you set a password
$database = "kasita_seminary";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO contact_messages (Full_Name, email, phone, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $full_name, $email, $phone, $message);

    if ($stmt->execute()) {
        header("location:contacts.php");
        exit(0);
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
