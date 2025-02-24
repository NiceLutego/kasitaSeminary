<?php
$servername = "localhost";
$username = "root";  
$password = "";  
$database = "kasita_junior_seminary";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch messages
$sql = "SELECT * FROM messages ORDER BY created_at DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Messages</title>
    <link rel="stylesheet" href="admin.css">

    <style>
      body{
        background-color: lightgreen;
      }
    </style>
</head>
<body>
    <h2>Contact Messages</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <!-- <th>Phone</th> -->
            <th>Message</th>
            <th>Submitted At</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <!-- <td><?= $row['phone'] ?></td> -->
            <td><?= $row['message'] ?></td>
            <td><?= $row['created_at'] ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
