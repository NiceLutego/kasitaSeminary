<?php
// Database configuration
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'kasita_seminary';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Photos - Kasita Seminary Admin</title>
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
                <h1>Upload Photos</h1>
            </header>
            <section class="media-actions">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label>Title:</label>
                    <input type="text" name="title" required><br><br>
                    
                    <label>Type:</label>
                    <select name="type" required>
                        <option value="image">Image</option>
                    </select><br><br>

                    <label>Upload Files:</label>
                    <input type="file" name="files[]" multiple required><br><br>

                    <button type="submit" name="upload" style="margin-left:5%; margin-top:2%; width:30%; font-size:1.6vw;">Upload Photo(s)</button>
                </form>

                <?php
                // Handle File Upload
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'], $_POST['type'], $_FILES['files'])) {
                    $title = htmlspecialchars($_POST['title']);
                    $type = $_POST['type'];
                    $files = $_FILES['files'];

                    $allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
                    $maxFileSize = 20 * 1024 * 1024; // 20MB per file
                    $targetDir = 'uploads/';

                    // Create uploads directory if not exists
                    if (!is_dir($targetDir)) {
                        mkdir($targetDir, 0777, true);
                    }

                    $uploadedFiles = [];
                    
                    foreach ($files['tmp_name'] as $key => $tmp_name) {
                        if ($files['error'][$key] === UPLOAD_ERR_OK) {
                            $fileMimeType = mime_content_type($tmp_name);
                            $fileSize = $files['size'][$key];

                            if (in_array($fileMimeType, $allowedImageTypes) && $fileSize <= $maxFileSize) {
                                $fileName = basename($files['name'][$key]);
                                $filePath = $targetDir . $fileName;

                                if (move_uploaded_file($tmp_name, $filePath)) {
                                    // Store the uploaded file path in an array
                                    $uploadedFiles[] = $filePath;
                                }
                            }
                        }
                    }

                    // Insert uploaded images into the database
                    if (!empty($uploadedFiles)) {
                        foreach ($uploadedFiles as $filePath) {
                            $stmt = $conn->prepare('INSERT INTO photo_gallery (event, file_path) VALUES (?, ?)');
                            $stmt->bind_param("ss", $title, $filePath);
                            $stmt->execute();
                            $stmt->close();
                        }
                        echo "<p style='color:green;'>Images uploaded successfully!</p>";
                    } else {
                        echo "<p style='color:red;'>No valid images uploaded!</p>";
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
