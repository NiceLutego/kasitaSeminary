<?php
// Connection settings (adjust these as needed)
$servername = "localhost";
$username = "root";  // Change to your database username
$password = "";      // Change to your database password
$dbname = "kasita_seminary";  // Database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form input
    $fname = $_POST['firstname'];
    $mname = $_POST['middlename'];
    $lname = $_POST['lastname'];
    $parentName = $_POST['parentname'];
    $phone = $_POST['phone'];
    $form = $_POST['form'];

    // Prepare SQL query to insert teacher data
    $sql = "INSERT INTO $form (first_name, middle_name, last_name,parent_name) VALUES ('$fname', '$mname', '$lname', '$parentName')";

    // Check if the query was successful
    if ($conn->query($sql) === TRUE) {
      header("Location: manage-students.php");
      exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
