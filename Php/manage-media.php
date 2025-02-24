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
                    <li><a href="#">Settings</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <header>
                <h1>Manage Media</h1>
            </header>

            <section class="media-actions">
                <form action="upload-media.php" method="POST" enctype="multipart/form-data">
                    <label for="media">Upload Media:</label>
                    <input type="file" name="media" id="media">
                    <button type="submit">Upload</button>
                </form>

                <h2>Existing Media Files</h2>
                <ul>
                    <li><img src="media/img1.jpg" alt="Media 1"><button>Delete</button></li>
                    <li><img src="media/img2.jpg" alt="Media 2"><button>Delete</button></li>
                    <!-- Add more media files here -->
                </ul>
            </section>
        </main>
    </div>
</body>
</html>
