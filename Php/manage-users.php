<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users - Kasita Seminary Admin</title>
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
                <h1>Manage Users</h1>
            </header>

            <section class="user-list">
                <h2>Registered Users</h2>
                <ul>
                    <li>User 1 <button>Delete</button></li>
                    <li>User 2 <button>Delete</button></li>
                    <!-- Add more users here -->
                </ul>

                <button onclick="location.href='add-user.php'">Add New User</button>
            </section>
        </main>
    </div>
</body>
</html>
