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
        <a href="../Pages/index.php"><?php echo $lang['home'];?></a>
        <a href="../Php/about.php"><?php echo $lang['about'];?></a>
        <a href="../Php/staff_profiles.php"><?php echo $lang['staff'];?></a>
        <a href="../Php/photo_gallery.php"><?php echo $lang['photos'];?></a>
        <a href="../Php/contacts.php"><?php echo $lang['contacts'];?></a>
      </div>
      <p>&copy; 2025 <?php echo $lang['kasita_seminary_rights'];?></p>
    </footer>
    <script src="../js/main.js"></script>
</body>
</html>

<?php $conn->close(); ?>

