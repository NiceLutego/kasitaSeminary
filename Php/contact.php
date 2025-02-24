<?php
// Database configuration
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'kasita_junior_seminary';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Secure session settings
// session_start();
// ini_set('session.cookie_httponly', 1);
// ini_set('session.cookie_secure', 1);
// ini_set('session.use_only_cookies', 1);

// Handle contact form submissions with input validation
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'], $_POST['email'], $_POST['message'])) {
  $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
  $message = htmlspecialchars($_POST['message']);

  if ($name && $email && $message) {
      $stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
      $stmt->bind_param("sss", $name, $email, $message);
      if ($stmt->execute()) {
          echo "Message sent successfully!";
      } else {
          echo "Error: " . $stmt->error;
      }
      $stmt->close();
  } else {
      echo "Invalid input.";
  }
}
$conn->close();
?>