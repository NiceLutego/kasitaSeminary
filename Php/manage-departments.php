<?php
    // Database configuration
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'kasita_seminary';

    // Create connection
    $conn = new mysqli($host, $username, $password, $dbname);
    // Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form input
  $dname = $_POST['departmentname'] ?? '';
  $cname = $_POST['chairname'] ?? '';
  $bio = $_POST['bio'] ?? '';
  $filePath = $_POST['photo'] ?? '';

  // Prepare SQL query to insert teacher data
  $sql = "INSERT INTO departments (department_name, head_of_department, file_path,bio) VALUES ('$dname', '$cname', '$filePath', '$bio')";

  // Check if the query was successful
  if ($conn->query($sql) === TRUE) {
      header("location:manage-departments.php");
      exit();
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

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
                    <li><a href="manage-departments.php">Departments</a></li>
                    <li><a href="../Php/getMessages.php">Message Management</a></li>
                    <li><a href="../Php/manage_photo.php">Photos Management</a></li>
                    <li><a href="../Pages/index.html">Home</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <header>
                <h1>Manage Departments</h1>
            </header>

            <section class="user-form">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="departmentname">
                        Depatment Name:
                    </label>
                    <input type="text" name="departmentname" id="departmentname" required><br><br>
                    <label for="chairPersonName">Chair Person Name:</label>
                    <input type="text" name="chairname" id="chairname" required>
                    <label for="photo">Photo:</label>
                    <input type="file" name="photo" id="photo"><br>
                    <label for="bio">Bio:</label>
                    <input type="text" name="bio" id="bio"><br><br>
                    <button type="submit" name="upload">Add Department</button>
                </form>
            </section>

        </main>
    </div>
</body>
</html>
<?php

$conn->close();
?>
