<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'kasita_seminary');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch admin profiles
$admins = $conn->query("SELECT * FROM admins");

// Fetch departments
$departments = $conn->query("SELECT * FROM departments");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasita Seminary Staff Profiles</title>
    <link rel="stylesheet" href="../Styles/staff.css">
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
            <a href="../Php/departments.php" class="header__nav__menu__item__link">Departments
            <div class="dropdown">
            <?php while ($department = $departments->fetch_assoc()): ?>
                <a href="departments.php?id=<?= $department['id'] ?>"><?= htmlspecialchars($department['department_name']) ?></a>
            <?php endwhile; ?>
        </div>
            </a>
          </li>
          <li class="header__nav__menu__item">
            <a href="../Php/contacts.php" class="header__nav__menu__item__link">Contacts</a>
          </li>
        </ul>
    </nav>
  </div>
<div class="container">
    <?php while ($admin = $admins->fetch_assoc()): ?>
        <div class="profile <?= $admin['position_order'] === 'Rector' ? 'Rector' : '' ?>">
            <img loading="lazy" src="<?= htmlspecialchars($admin['photo']) ?>" alt="<?= htmlspecialchars($admin['first_name']." ".$admin['last_name']) ?>">
            <h2><?= htmlspecialchars($admin['first_name']."  ".$admin['last_name']) ?></h2>
            <h3><?= htmlspecialchars($admin['position_order']) ?></h3>
            <p><?= htmlspecialchars($admin['bio']) ?></p>
        </div>
    <?php endwhile; ?>
</div>
<footer class="footer">
      <div class="footer__links">
        <a href="../Pages/index.html">Home</a>
        <a href="../Php/about.php">About</a>
        <a href="../Php/staff_profiles.php">Staff</a>
        <a href="../Pages/login.html">Administration</a>
        <a href="../Php/departments.php">Departments</a>
        <a href="../Php/contacts.php">Contact</a>
      </div>
      <p>&copy; 2025 Kasita Seminary. All Rights Reserved.</p>
    </footer>
    <script src="../js/main.js"></script>
</body>
</html>

<?php $conn->close(); ?>

