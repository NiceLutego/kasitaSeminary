<?php
    // Database configuration
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'kasita_seminary';

    // Create connection
    $conn = new mysqli($host, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>

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
                    <li><a href="manage-staff.php">Staff Management</a></li>
                    <li><a href="manage-workers.php">Workers Management</a></li>
                    <li><a href="manage-students.php">Students Management</a></li>
                    <li><a href="../Pages/index.html">Home</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <header>
                <h1>Add Workers</h1>
            </header>

            <section class="user-form">
                <form action="submit-workers.php" method="POST">
                    <label for="firstname">
                        First Name:
                    </label>
                    <input type="text" name="firstname" id="firstname" required>
                    <label for="middlename">Middle Name:</label>
                    <input type="text" name="middlename" id="middlename" required>

                    <label for="lastname">Last Name:</label>
                    <input name="lastname" id="lastname" required><br><br>
                    <label for="place">Working Area:</label>
                    <input type="text" name="place" id="place">
                    <label for="phone">Phone:</label>
                    <input type="tel" name="phone" id="phone">
                    <label for="salary">Salary:</label>
                    <input type="text" name="salary" id="salary">
                    <br><br>
                    <button type="submit" name="upload">Add Worker</button>
                </form>
            </section>
        </main>
    </div>
</body>
</html>