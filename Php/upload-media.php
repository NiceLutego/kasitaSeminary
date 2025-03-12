<?php
// Connect to the database
ob_start();
$conn = new mysqli('localhost', 'root', '', 'kasita_seminary');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload - Kasita Seminary Admin</title>
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
                    <li><a href="../Php/departments.php">Departments</a></li>
                    <li><a href="../Php/getMessages.php">Message Managements</a></li>
                    <li><a href="../Php/manage_photo.php">Photos Managements</a></li>
                    <li><a href="../Php/manage_events.php">Events Managements</a></li>
                    <li><a href="../Pages/index.html">Home</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <header>
                <h1>Upload News</h1>
            </header>

            <section class="media-actions">
            <form action="" method="POST" enctype="multipart/form-data">
                <label>Title:</label>
                <input type="text" name="title" required><br><br>
                <label>Type:</label>
                <select name="type" required>
                    <option value="image">Image</option>
                    <option value="video">Video</option>
                </select><br><br>
                <label>File:</label>
                <input type="file" name="file" required><br><br>
                <label for="description">Description:</label>
                <input type="text" name="description" id="description"><br><br>
                <button type="submit" name="upload" style="margin-left:40%;margin-top:2%;width:30%;font-size:1.6vw;">Upload</button>
            </form>
    <?php
    // Handle File Upload
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'], $_POST['type'], $_FILES['file'])) {
        $title = $_POST['title'];
        $type = $_POST['type'];
        $file = $_FILES['file'];
        $description = $_POST['description'];

        $allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $allowedVideoTypes = ['video/mp4', 'video/webm', 'video/ogg'];
        $maxFileSize = 20 * 1024 * 1024; // 20MB

        if ($file['error'] === UPLOAD_ERR_OK) {
            $fileMimeType = mime_content_type($file['tmp_name']);
            $fileSize = $file['size'];

            if (($type === 'image' && in_array($fileMimeType, $allowedImageTypes)) ||
                ($type === 'video' && in_array($fileMimeType, $allowedVideoTypes))) {

                if ($fileSize <= $maxFileSize) {
                    $targetDir = 'uploads/';
                    if (!is_dir($targetDir)) {
                        mkdir($targetDir, 0777, true);
                    }
                    $filePath = $targetDir . basename($file['name']);

                    if (move_uploaded_file($file['tmp_name'], $filePath)) {
                        $stmt = $conn->prepare('INSERT INTO media (title, type, file_path,description) VALUES (?, ?, ?,?)');
                        $stmt->execute([$title, $type, $filePath,$description]);
                        echo "<p style='color:green;'>File uploaded successfully!</p>";
                    } else {
                        echo "<p style='color:red;'>File upload failed!</p>";
                    }
                } else {
                    echo "<p style='color:red;'>File size exceeds the 5MB limit!</p>";
                }
            } else {
                echo "<p style='color:red;'>Invalid file type!</p>";
            }
        } else {
            echo "<p style='color:red;'>Error during file upload!</p>";
        }
    }
?>
            </section>
        </main>
    </div>
</body>
</html>
<?php

$conn->close();
?>