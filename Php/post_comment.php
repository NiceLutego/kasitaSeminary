<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'kasita_seminary');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $media_id = $_POST['media_id'];
    $username = $conn->real_escape_string($_POST['username']);
    $comment = $conn->real_escape_string($_POST['text']);

    if (!empty($username) && !empty($comment)) {
        $sql = "INSERT INTO comments (media_id, username, text) VALUES ('$media_id', '$username', '$comment')";

        if ($conn->query($sql) === TRUE) {
            header("location:media.php");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Please fill in all fields.";
    }
}

$conn->close();
?>
