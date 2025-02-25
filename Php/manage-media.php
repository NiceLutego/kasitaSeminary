<?php
    // Database Connection
    $pdo = new PDO('mysql:host=localhost;dbname=Kasita_Seminary', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // Fetch Media
    $media = $pdo->query('SELECT * FROM media')->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Media - Kasita Seminary Admin</title>
    <link rel="stylesheet" href="../Styles/admins.css">
</head>
<body>
    <div class="admin-container">
        <aside class="sidebar">
            <h2>Admin Panel</h2>
            <nav>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="manage-media.php">Manage Media</a></li>
                    <li><a href="post-news.php">Post News</a></li>
                    <li><a href="manage-users.php">User Management</a></li>
                    <li><a href="../Pages/index.html">Home</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <header>
                <h1>Manage Media</h1>
            </header>

            <section class="media-actions">
                <h1 style="text-align:center;font-weight:600;">Welcome Admin-manage your media here</h1>
                <h2>Existing Media Files</h2>
                <ul>
                    <li>  
                    <img src="<?php echo htmlspecialchars($item['file_path'])?>"><button>Delete</button></li>
                    <!-- <li><img src="media/img2.jpg" alt="Media 2"><button>Delete</button></li> -->
                    <!-- Add more media files here -->
                </ul>
                <button type="button" onclick="location.href='upload-media.php'">Upload News</button>
            </section>
        </main>
    </div>
</body>
</html>
