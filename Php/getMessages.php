<?php
$servername = "localhost";
$username = "root";  
$password = "";  
$database = "kasita_seminary";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch messages
$sql = "SELECT * FROM contact_messages ORDER BY created_at DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasita Seminary message dashboard</title>
    <link rel="stylesheet" href="../Styles/admins.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Make sure jQuery is included -->
</head>
<body>
    <div class="admin-container">
        <aside class="sidebar">
            <h2>Admin Panel</h2>
            <nav>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="manage-media.php">Manage Media</a></li>
                    <li><a href="post-news.php">Post News</a></li>
                    <li><a href="manage-users.php">User Management</a></li>
                    <li><a href="../Php/getMessages.php">Message Management</a></li>
                    <li><a href="../Pages/index.html">Home</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <header>
                <h1>Welcome, Admin</h1>
            </header>
            <h2>Contact Messages</h2>
    <table border="1">
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
            <th>Submitted At</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['Full_Name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><?= $row['message'] ?></td>
            <td><?= $row['created_at'] ?></td>
        </tr>
        <?php } ?>
    </table>
 </main>
</div>
</body>
</html>

<?php
$conn->close();
?>
