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
                    <li><a href="manage-staff.php">Staff Management</a></li>
                    <li><a href="manage-workers.php">Workers Management</a></li>
                    <li><a href="manage-students.php">Students Management</a></li>
                    <li><a href="../Pages/index.html">Home</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <header>
                <h1>Manage Users</h1>
            </header>

            <section class="user-list" style="display:flex;flex-direction:row;gap:3vw;align-items:center;justify-content:center;">
                <button onclick="location.href='manage-staff.php'" style="height:6vh;width:20vw;font-size:3vw;">Add Teachers</button>
                <button onclick="location.href='manage-workers.php'" style="height:6vh;width:20vw;font-size:3vw;">Add Workers</button>
                <button onclick="location.href='manage-students.php'" style="height:6vh;width:20vw;font-size:3vw;">Add Students</button>
            </section>
        </main>
    </div>
</body>
</html>
