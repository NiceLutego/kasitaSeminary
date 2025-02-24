<?php
    //database connection
    $host = 'localhost'; // your database host
    $dbname = 'kasita_seminary'; // your database name
    $username = 'root'; // your database username
    $password = ''; // your database password

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasita Seminary Admin Dashboard</title>
    <link rel="stylesheet" href="../Styles/admins.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Make sure jQuery is included -->
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
                <h1>Welcome, Admin</h1>
            </header>

            <section class="dashboard-widgets">
                <div class="widget">
                    <h3>Total Media</h3>
                    <p id="total-media">Loading...</p> <!-- IDs added for dynamic updates -->
                </div>
                <div class="widget">
                    <h3>Total News Posts</h3>
                    <p id="total-news">Loading...</p>
                </div>
                <div class="widget">
                    <h3>Registered Users</h3>
                    <p id="total-users">Loading...</p>
                </div>
            </section>

            <section class="admin-actions">
                <button onclick="location.href='manage-media.php'">Manage Media</button>
                <button onclick="location.href='post-news.php'">Post News</button>
                <button onclick="location.href='manage-users.php'">Manage Users</button>
            </section>
        </main>
    </div>

    <script>
        $(document).ready(function() {
            function updateWidgets() {
                $.ajax({
                    url: 'get-dashboard-data.php',
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#total-media').text(data.totalMedia);
                        $('#total-news').text(data.totalNewsPosts);
                        $('#total-users').text(data.totalUsers);
                    },
                    error: function() {
                        $('#total-media').text('Error');
                        $('#total-news').text('Error');
                        $('#total-users').text('Error');
                    }
                });
            }
            
            updateWidgets(); // Update on page load
        });
    </script>
</body>
</html>
