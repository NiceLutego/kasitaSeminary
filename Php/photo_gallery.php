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
  <header class="header">
  <div class="header__logo">
     <span class="header__logo__burger"></span>
    </div>
    <nav class="header__nav">
        <ul class="header__nav__menu">
          <li class="header__nav__menu__item">
            <a href="../Pages/index.html" class="header__nav__menu__item__link">Home</a>
          </li>
          <li class="header__nav__menu__item">
            <a href="../Php/about.php" class="header__nav__menu__item__link">About</a>
          </li>
          <li class="header__nav__menu__item">
            <a href="../Php/staff_profiles.php" class="header__nav__menu__item__link">Staff</a>
          </li>
          <li class="header__nav__menu__item">
            <a href="../Pages/login.html" class="header__nav__menu__item__link">Administration</a>
          </li>
          <li class="header__nav__menu__item">
            <a href="../Php/departments.php" class="header__nav__menu__item__link">Departments</a>
          </li>
          <li class="header__nav__menu__item">
            <a href="../Php/photo_gallery.php" class="header__nav__menu__item__link">Photos</a></li>
          <li class="header__nav__menu__item">
            <a href="../Php/contacts.php" class="header__nav__menu__item__link">Contacts</a>
          </li>
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
    <script src="../js/main.js"></script>
</body>
</html>
<?php
 $conn->close();
?>