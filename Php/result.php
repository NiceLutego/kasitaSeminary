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


// Handle result checking with prepared statements
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['student_number'])) {
  $student_number = filter_var($_POST['student_number'], FILTER_SANITIZE_STRING);
  $stmt = $conn->prepare("SELECT subject, score FROM results WHERE student_number = ?");
  $stmt->bind_param("s", $student_number);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
      echo "<div class='results-container'>";
      while ($row = $result->fetch_assoc()) {
          echo "<div class='result-card'>";
          echo "<h4>Subject: " . htmlspecialchars($row['subject']) . "</h4>";
          echo "<p>Score: " . htmlspecialchars($row['score']) . "</p>";
          echo "</div>";
      }
      echo "</div>";
  } else {
      echo "No results found for this student.";
  }
  $stmt->close();
}
