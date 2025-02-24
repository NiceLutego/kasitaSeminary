<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - Kasita Seminary Admin</title>
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
                    <li><a href="settings.php">Settings</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <header>
                <h1>Settings</h1>
            </header>

            <section class="settings-form">
                <form action="update-settings.php" method="POST">
                    <label for="site-name">Site Name:</label>
                    <input type="text" name="site-name" id="site-name" required>

                    <label for="site-email">Contact Email:</label>
                    <input type="email" name="site-email" id="site-email" required>

                    <button type="submit">Save Settings</button>
                </form>
            </section>
        </main>
    </div>
</body>
</html>
