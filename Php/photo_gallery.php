<?php
    // Database configuration
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'kasita_seminary';

    // Create connection
    $conn = new mysqli($host, $username, $password, $dbname);

    $media = $conn ->query("SELECT * FROM photo_gallery");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Gallery - Kasita Minor Seminary</title>
    <link rel="stylesheet" href="../Styles/style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../Pages/index.html">Home</a></li>
                <li><a href="../Php/about.php">About Us</a></li>
                <li><a href="../Php/staff_profiles.php">Staff</a></li>
                <li><a href="../Php/school-calender.php">School Calendar</a></li>
                <li><a href="../Php/photo_gallery.php">Photo Gallery</a></li>
                <li><a href="../Php/contacts.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="gallery">
        <h1>Photo Gallery</h1>
        <p>Explore the beautiful moments and events captured at Kasita Seminary. Here’s a glimpse of life at our seminary:</p>
        
        <ul class="gallery-grid">
        <?php if ($media && $media->num_rows > 0): ?>
            <?php while ($item = $media->fetch_assoc()): ?>
            <li class="gallery-item">
                <img src="<?= htmlspecialchars($item['file_path']) ?>" alt="<?= htmlspecialchars($item['event']) ?>">
                <p><?= htmlspecialchars($item['event']) ?></p>
            </li>
            <?php endwhile; ?>
    <?php else: ?>
        <p>No media found.</p>
    <?php endif; ?>
    </ul>
    </section>

    <footer>
        <p>&copy; 2025 Kasita Minor Seminary. All Rights Reserved.</p>
    </footer>
</body>
</html>
<?php
 $conn->close();
?>