<?php
// Database configuration
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'kasita_seminary';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['date'], $_POST['title'], $_POST['content'])) {
  $date = filter_var($_POST['date']);
  $title = filter_var($_POST['title']);
  $content = htmlspecialchars($_POST['content']);

  if ($date && $title && $content) {
      $stmt = $conn->prepare("INSERT INTO new_post (event_date, title, content) VALUES (?, ?, ?)");
      $stmt->bind_param("sss", $date, $title, $content);
      if ($stmt->execute()) {
          header("location:post-news.php");
          exit();
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
