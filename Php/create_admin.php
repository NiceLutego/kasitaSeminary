<?php
include('db_config.php'); // Database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'])){
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if($username && $password){
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert into the admin table
        $query = "INSERT INTO admin (username, password) VALUES ('$username', '$hashed_password')";

        // Execute the query
        if (mysqli_query($conn, $query)) {
             echo "Admin user created successfully.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

}
// Admin username and password (you can change this)
// $username = 'admin';
// $password = 'rector'; // Use a strong password
mysqli_close($conn); // Close the connection
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
                    <li><a href="manage-departments.php">Departments</a></li>
                    <li><a href="../Php/getMessages.php">Message Management</a></li>
                    <li><a href="../Php/manage_photo.php">Photos Management</a></li>
                    <li><a href="../Php/manage_events.php">Events Management</a></li>
                    <li><a href="../Pages/index.html">Home</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <header>
                <h1>Welcome, Admin</h1>
            </header>
            <section class="admin-list">
            <form action="" method="post" enctype="multipart/form-data" onsubmit="return confirm('Are sure you want to craete this admin account?')">
                <label for="username">User Name:</label>
                <input type="text" name="username" id="username"><br><br>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password"><br><br>

                <button type="submit" name="upload" id="upload">Create Admin</button>
            </form>
            </section>
        </main>
    </div>
</body>
</html>
