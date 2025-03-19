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

<?php
include '../Php/generalHeader.php';
?>
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

