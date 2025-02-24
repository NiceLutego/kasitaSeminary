<?php
// Database Connection
$pdo = new PDO('mysql:host=localhost;dbname=Kasita_Seminary', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Media Dashboard</title>
</head>
<body>
    <h2>Upload Media</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <label>Title:</label>
        <input type="text" name="title" required>
        <label>Type:</label>
        <select name="type" required>
            <option value="image">Image</option>
            <option value="video">Video</option>
        </select>
        <label>File:</label>
        <input type="file" name="file" required>
        <button type="submit" name="upload">Upload</button>
    </form>
    
    <?php
    // Handle File Upload
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'], $_POST['type'], $_FILES['file'])) {
        $title = $_POST['title'];
        $type = $_POST['type'];
        $file = $_FILES['file'];

        $allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $allowedVideoTypes = ['video/mp4', 'video/webm', 'video/ogg'];
        $maxFileSize = 5 * 1024 * 1024; // 5MB

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
                        $stmt = $pdo->prepare('INSERT INTO media (title, type, file_path) VALUES (?, ?, ?)');
                        $stmt->execute([$title, $type, $filePath]);
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

    // Fetch Media
    $media = $pdo->query('SELECT * FROM media')->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <h3>Uploaded Media</h3>
    <ul>
        <?php foreach ($media as $item): ?>
            <li>
                <strong><?php echo htmlspecialchars($item['title']); ?></strong> - <?php echo htmlspecialchars($item['type']); ?><br>
                <?php if ($item['type'] === 'image'): ?>
                    <img src="<?php echo htmlspecialchars($item['file_path']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" style="max-width:200px; max-height:200px;">
                <?php elseif ($item['type'] === 'video'): ?>
                    <video controls style="max-width:200px; max-height:200px;">
                        <source src="<?php echo htmlspecialchars($item['file_path']); ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
