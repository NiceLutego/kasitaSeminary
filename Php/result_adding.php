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

// Handle adding results
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['student_number'], $_POST['fullname'], $_POST['kiswahili'],$_POST['english'],$_POST['french'],$_POST['civics'],$_POST['cs'],$_POST['historia'],$_POST['physics'],$_POST['chemistry'],$_POST['biology'],$_POST['geography'],$_POST['basicMath'],$_POST['bibleKnowledge'])) {
  $student_number = filter_var($_POST['student_number']);
  $fullname = filter_var($_POST['fullname']);
  $kiswahili = filter_var($_POST['kiswahili'], FILTER_VALIDATE_INT);
  $english = filter_var($_POST['english'], FILTER_VALIDATE_INT);
  $french = filter_var($_POST['french'], FILTER_VALIDATE_INT);
  $civics = filter_var($_POST['civics'], FILTER_VALIDATE_INT);
  $cs = filter_var($_POST['cs'], FILTER_VALIDATE_INT);
  $historia = filter_var($_POST['historia'], FILTER_VALIDATE_INT);
  $physics = filter_var($_POST['physics'], FILTER_VALIDATE_INT);
  $chemistry = filter_var($_POST['chemistry'], FILTER_VALIDATE_INT);
  $biology = filter_var($_POST['biology'], FILTER_VALIDATE_INT);
  $geography = filter_var($_POST['geography'], FILTER_VALIDATE_INT);
  $bibleKnowledge = filter_var($_POST['bibleKnowledge'], FILTER_VALIDATE_INT);
  $basicMath = filter_var($_POST['basicMath'], FILTER_VALIDATE_INT);

  if ($student_number && $fullname) {
      $stmt = $conn->prepare("INSERT INTO form_One_result_march (Student_Number,Full_Name ,Kiswahili,English,French,Civics,Computer_Science,Historia_Ya_Tanzania,Physics,Chemistry,Biology,Geography,Basic_Mathematics,Bible_Knowledge) VALUES (?, ?, ?,?,?,?,?,?,?,?,?,?,?,?)");
      $stmt->bind_param("ssi", $student_number, $fullname, $kiswahili,$english,$french,$civics,$cs,$historia,$physics,$chemistry,$biology,$geography,$basicMath,$bibleKnowledge);
      if ($stmt->execute()) {
          echo "Result added successfully!";
      } else {
          echo "Error: " . $stmt->error;
      }
      $stmt->close();
  } else {
      echo "Invalid result input.";
  }
}

$conn->close();
?>
