<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'kasita_seminary');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch admin profiles
$admins = $conn->query("SELECT * FROM admins ORDER BY position_order ASC");

// Fetch departments
$departments = $conn->query("SELECT * FROM departments ORDER BY name ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasita Seminary Staff Profiles</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; box-sizing: border-box; }
        .container { display: flex; flex-direction: column; align-items: center; padding: 20px; }
        .profile { width: 100%; max-width: 800px; background: #f9f9f9; margin-bottom: 20px; padding: 20px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); text-align: center; }
        .head-of-school { background: #007bff; color: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2); }
        .profile img { width: 150px; height: 150px; border-radius: 50%; object-fit: cover; margin-bottom: 10px; }
        .profile h2 { font-size: 1.8rem; margin: 0; }
        .profile h3 { font-size: 1.2rem; color: #555; margin: 5px 0; }
        .profile p { font-size: 1rem; color: #333; }
        .nav { background: #007bff; padding: 10px; display: flex; justify-content: center; }
        .nav a { color: white; text-decoration: none; padding: 10px 15px; position: relative; }
        .nav a:hover { background: #0056b3; }
        .dropdown { display: none; position: absolute; background: #f9f9f9; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); border-radius: 5px; }
        .nav a:hover .dropdown { display: block; }
        .dropdown a { color: #333; padding: 10px; display: block; }
        .dropdown a:hover { background: #ddd; }
    </style>
</head>
<body>
<div class="nav">
    <a href="../Pages/index.html">Home</a>
    <a href="about.php">About</a>
    <a href="about.php">Administration</a>
    <a href="departments.php">Departments
        <div class="dropdown">
            <?php while ($department = $departments->fetch_assoc()): ?>
                <a href="departments.php?id=<?= $department['id'] ?>"><?= htmlspecialchars($department['name']) ?></a>
            <?php endwhile; ?>
        </div>
    </a>
</div>

<div class="container">
    <?php while ($admin = $admins->fetch_assoc()): ?>
        <div class="profile <?= $admin['position'] === 'Head of School' ? 'head-of-school' : '' ?>">
            <img src="uploads/<?= htmlspecialchars($admin['photo']) ?>" alt="<?= htmlspecialchars($admin['name']) ?>">
            <h2><?= htmlspecialchars($admin['name']) ?></h2>
            <h3><?= htmlspecialchars($admin['position']) ?></h3>
            <p><?= htmlspecialchars($admin['bio']) ?></p>
        </div>
    <?php endwhile; ?>
</div>
</body>
</html>

<?php $conn->close(); ?>

