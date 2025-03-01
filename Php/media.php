<?php
// Connect to the database
ob_start();
$conn = new mysqli('localhost', 'root', '', 'kasita_seminary');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Search functionality
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

// Fetch media (news, pictures, videos)
$query = "SELECT * FROM media";
if ($search) {
    $query .= " WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
}
$query .= " ORDER BY created_at DESC";
$media = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasita Seminary News</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; box-sizing: border-box; }
        nav { background: #007bff; color: white; padding: 10px 0; text-align: center; }
        nav a { color: white; margin: 0 15px; text-decoration: none; font-weight: bold; }
        nav a:hover { text-decoration: underline; }
        .container { display: flex; flex-direction: column; align-items: center; padding: 10px; }
        .search-bar { margin-bottom: 20px; }
        .search-bar input[type="text"] { padding: 8px; width: 80%; max-width: 400px; border-radius: 5px; border: 1px solid #ccc; }
        .search-bar button { padding: 8px; background: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; }
        .search-bar button:hover { background: #0056b3; }
        .media-item { width: 100%; max-width: 600px; background: #f9f9f9; margin-bottom: 20px; padding: 10px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); }
        .media-item img, .media-item video { width: 100%; border-radius: 10px; }
        .media-title { font-size: 1.5rem; font-weight: bold; margin: 10px 0; }
        .media-description { margin-bottom: 10px; }
        .comments-section { margin-top: 20px; }
        .comment { background: #fff; padding: 8px; margin-top: 5px; border-radius: 5px; box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05); }
        form { display: flex; flex-direction: column; }
        input[type="text"] { padding: 8px; margin-top: 5px; border-radius: 5px; border: 1px solid #ccc; }
        button { padding: 8px; background: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; margin-top: 5px; }
        button:hover { background: #0056b3; }
        footer { background: #007bff; color: white; text-align: center; padding: 10px 0; margin-top: 20px; }
    </style>
</head>
<body>

<nav>
    <a href="../Pages/index.html">Home</a>
    <a href="about.php">About</a>
    <a href="staff_profiles.php">Staff Profiles</a>
    <a href="login.php">Administration</a>
    <a href="departments.php">Staff Profiles</a>
    <a href="contact.php">Contact Us</a>
</nav>

<div class="container">
    <form class="search-bar" method="GET" action="">
        <input type="text" name="search" placeholder="Search news..." value="<?= htmlspecialchars($search) ?>">
        <button type="submit">Search</button>
    </form>

    <?php if ($media && $media->num_rows > 0): ?>
        <?php while ($item = $media->fetch_assoc()): ?>
            <div class="media-item">
                <div class="media-title"><?= htmlspecialchars($item['title']) ?></div>
                <div class="media-description"><?= htmlspecialchars($item['description']) ?></div>
                <?php if ($item['type'] === 'image'): ?>
                    <img loading="lazy" src="<?= htmlspecialchars($item['file_path']) ?>" alt="<?= htmlspecialchars($item['title']) ?>">
                <?php elseif ($item['type'] === 'video'): ?>
                    <video controls>
                        <source src="<?= htmlspecialchars($item['file_path']) ?>" type="video/mp4">
                    </video>
                <?php endif; ?>
                <div class="comments-section">
                    <h4>Comments</h4>
                    <?php
                    $comments = $conn->query("SELECT * FROM comments WHERE media_id = " . (int)$item['id'] . " ORDER BY created_at DESC");
                    while ($comment = $comments->fetch_assoc()): ?>
                        <div class="comment"> <strong><?= htmlspecialchars($comment['username']) ?>:</strong> <?= htmlspecialchars($comment['text']) ?> </div>
                    <?php endwhile; ?>
                    <form method="POST" action="post_comment.php">
                        <input type="hidden" name="media_id" value="<?= $item['id'] ?>">
                        <input type="text" name="username" placeholder="Your name" required>
                        <input type="text" name="text" placeholder="Add a comment..." required>
                        <button type="submit">Post Comment</button>
                    </form>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No media found.</p>
    <?php endif; ?>
</div>

<footer>
    &copy; <?= date('Y') ?> Kasita Minor Seminary. All rights reserved.
</footer>

<?php $conn->close(); ?>

</body>
</html>
