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
    <link rel="stylesheet" href="../Styles/media.css">
</head>
<body>

<div class="header">
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
          <li class="header__nav__menu__item"><a href="../Php/photo_gallery.php" class="header__nav__menu__item__link">Photos</a></li>
          <li class="header__nav__menu__item">
            <a href="../Php/contacts.php" class="header__nav__menu__item__link">Contacts</a>
          </li>
        </ul>
    </nav>
  </div>

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

<div class="contacts__footer">
    <div class="contacts__footer__container">
      <div class="contacts__footer__container__column">
        <h3>About Us</h3>
        <p>St.Francis Junior Seminary-Kasita</p>
        <p>P.O.Box 103</p>
        <p>Ulanga,Morogoro,Tanzania</p>
        <p>Email: kasitajuniorseminary@gmail.com</p>
        <p>Phone: +255784397424</p>
      </div>
      <div class="contacts__footer__container__column">
        <h3>Quick Links</h3>
        <ul>
          <li><a href="../Pages/index.html">Home</a></li>
          <li><a href="../Php/about.php">About</a></li>
          <li><a href="../Php/services.php">Services</a></li>
          <li><a href="../Pages/login.html">Administration</a></li>
          <li><a href="../Php/privacy-plicy.php">Privacy and Policies</a></li>
        </ul>
      </div>
      <div class="contacts__footer__container__column">
        <h3>Follow Us</h3>
        <a href="#">Facebook</a>
        <a href="#"> YouTube</a>
        <a href="#">Instagram</a>
        <a href="#">LinkedIn</a>
        <a href="#">X</a>
      </div>
    </div>
    <p class="contacts__footer__button">
      &copy; 2025 Kasita Seminary. All rights reserved.
    </p>
  </div>


<?php $conn->close(); ?>
<script src="../js/main.js"></script>
</body>
</html>
