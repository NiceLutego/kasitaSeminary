<?php
    // Database configuration
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'kasita_seminary';

    // Create connection
    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle media deletion
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remove'])) {
        $file_id = $_POST['id'] ?? '';

        if (!empty($file_id)) {
            $stmt = $conn->prepare("DELETE FROM media WHERE id = ?");
            $stmt->bind_param('i', $file_id);

            if ($stmt->execute()) {
                echo "<p>Media removed successfully!</p>";
            } else {
                echo "<p>Error: " . $stmt->error . "</p>";
            }
        }
    }

    // Fetch media
    $result = $conn->query('SELECT * FROM media');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Media - Kasita Seminary Admin</title>
    <link rel="stylesheet" href="../Styles/admins.css">
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
                    <li><a href="manage-departments.php">Departments</a></li>
                    <li><a href="../Php/getMessages.php">Message Management</a></li>
                    <li><a href="../Php/manage_photo.php">Photos Management</a></li>
                    <li><a href="../Pages/index.html">Home</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <header>
                <h1>Manage Media</h1>
            </header>

            <section class="media-actions">
                <h1 style="text-align:center;font-weight:600;">Welcome Admin - Manage your media here</h1>
                <h2>Existing Media Files</h2>
                <ul>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <li>  
                        <?= htmlspecialchars($row['file_path']); ?>&nbsp;&nbsp;&nbsp;
                        <form action="" method="POST" style="display:inline" onsubmit="return confirm('Are you sure you want to delete this media file?');">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']); ?>">
                            <button type="submit" value="Delete" name="remove">Delete</button>
                        </form>
                    </li>
                <?php endwhile; ?>
                </ul>
                <button type="button" onclick="location.href='upload-media.php'">Upload Media</button>
            </section>
        </main>
    </div>
</body>
</html>
<?php

$conn->close();
?>
