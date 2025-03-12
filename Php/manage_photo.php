<?php
    // Database configuration
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'kasita_seminary';

    // Create connection
    $conn = new mysqli($host, $username, $password, $dbname);


    $result = $conn ->query('SELECT * FROM photo_gallery');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Photos- Kasita Seminary Admin</title>
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
                    <li><a href="../Php/getMessages.php">Message Management</a></li>
                    <li><a href="manage_photo.php">Photo Management</a></li>
                    <li><a href="../Pages/index.html">Home</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <header>
                <h1>Manage Photos</h1>
            </header>
            <section class="media-actions">
                <h1 style="text-align:center;font-weight:600;">Welcome Admin - Manage your Photos here</h1>
                <h2>Posted Photos</h2>
                <ul>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <li>  
                        <?= htmlspecialchars($row['event']); ?>&nbsp;&nbsp;&nbsp;
                        <form action="" method="POST" style="display:inline" onsubmit="return confirm('Are you sure you want to delete this photo?');">
                            <input type="hidden" name="photo_id" value="<?= htmlspecialchars($row['id']); ?>">
                            <button type="submit" value="Delete" name="remove">Delete</button>
                        </form>
                    </li>
                <?php endwhile; ?>
                </ul>
                <button type="button" onclick="location.href='upload-photos.php'">Upload Photo</button>
            </section>
        </main>
    </div>
</body>
</html>
<?php

$conn->close();
?>