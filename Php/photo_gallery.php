<?php
    // Database configuration
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'kasita_seminary';

    // Create connection
    $conn = new mysqli($host, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $media = $conn->query("SELECT * FROM photo_gallery");
?>
<?php include '../Php/generalHeader.php'; ?>

<section class="gallery">
    <h1>Photo Gallery</h1>
    <p>Explore the beautiful moments and events captured at Kasita Seminary. Here’s a glimpse of life at our seminary:</p>
    
    <div class="gallery-grid">
        <?php if ($media && $media->num_rows > 0): ?>
            <?php while ($item = $media->fetch_assoc()): ?>
                <div class="gallery-item">
                    <img src="<?= htmlspecialchars($item['file_path']) ?>" alt="<?= htmlspecialchars($item['event']) ?>">
                    <p><?= htmlspecialchars($item['event']) ?></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No media found.</p>
        <?php endif; ?>
    </div>
</section>

<footer>
    <p>&copy; 2025 Kasita Minor Seminary. All Rights Reserved.</p>
</footer>

<script src="../js/main.js"></script>

<?php $conn->close(); ?>
