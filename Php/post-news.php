<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post News - Kasita Seminary Admin</title>
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
                    <li><a href="#">Settings</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <header>
                <h1>Post News</h1>
            </header>

            <section class="news-form">
                <form action="submit-news.php" method="POST">
                    <label for="title">News Title:</label>
                    <input type="text" name="title" id="title" required>

                    <label for="content">Content:</label>
                    <textarea name="content" id="content" rows="5" required></textarea>

                    <button type="submit">Post News</button>
                </form>
            </section>
        </main>
    </div>
</body>
</html>
