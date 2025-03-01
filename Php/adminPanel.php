<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasita Seminary Admin Dashboard</title>
    <link rel="stylesheet" href="../Styles/admins.css">
      <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <div class="admin-container">
        <aside class="sidebar">
            <h2>Admin Panel</h2>
            <nav>
                <ul>
                    <li>
                        <a href="../Php/dashboard.php">Dashboard</a></li>
                    <li>
                    <a href="../Php/manage-media.php">Manage Media</a></li>
                    <li>    
                    <a href="../Php/post-news.php">Post News</a></li>
                    <li>   
                    <a href="../Php/manage-users.php">User Management</a></li>
                    <li> 
                    <a href="../Pages/index.html">Home</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <header>
                <h1>Welcome, Admin</h1>
            </header>

            <section class="dashboard-widgets">
                <div class="widget">
                    <h3>Total Media</h3>
                    <p>120</p>
                </div>
                <div class="widget">
                    <h3>Total News Posts</h3>
                    <p>45</p>
                </div>
                <div class="widget">
                    <h3>Registered Users</h3>
                    <p>300</p>
                </div>
            </section>

            <section class="admin-actions">
                <button onclick="location.href='manage-media.php'">Manage Media</button>
                <button onclick="location.href='post-news.php'">Post News</button>
                <button onclick="location.href='manage-users.php'">Manage Users</button>
            </section>
        </main>
    </div>
</body>
</html>
