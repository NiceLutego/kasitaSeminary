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
session_start();
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
ini_set('session.use_only_cookies', 1);


// Fetch and display messages for the admin with pagination
if (isset($_SESSION['admin'])) {
  $sql = "SELECT name, email, message, created_at FROM messages ORDER BY created_at DESC LIMIT 20";
  $messages = $conn->query($sql);
  if ($messages->num_rows > 0) {
      echo "<div class='messages-container'>";
      while ($row = $messages->fetch_assoc()) {
          echo "<div class='message-card'>";
          echo "<strong>From:</strong> " . htmlspecialchars($row['name']) . " (" . htmlspecialchars($row['email']) . ")<br>";
          echo "<p>" . nl2br(htmlspecialchars($row['message'])) . "</p>";
          echo "<small>Received on: " . $row['created_at'] . "</small>";
          echo "</div>";
      }
      echo "</div>";
  } else {
      echo "No messages found.";
  }
} else {
  echo "Access denied.";
}
$conn->close();
?>