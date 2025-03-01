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
    

    // Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form input
  $fname = $_POST['firstname'];
  $mname = $_POST['middlename'];
  $lname = $_POST['lastname'];
  $position = $_POST['position'];
  $photo = $_FILES['photo'];
  $bio = $_POST['bio'];

  $allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];

  $maxFileSize = 5 * 1024 * 1024; // 5MB

  if ($photo['error'] === UPLOAD_ERR_OK) {
    $fileMimeType = mime_content_type($photo['tmp_name']);
    $fileSize = $photo['size'];

    if ((in_array($fileMimeType, $allowedImageTypes))) {

        if ($fileSize <= $maxFileSize) {
            $targetDir = 'uploads/';
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            $filePath = $targetDir . basename($photo['name']);

            if (move_uploaded_file($photo['tmp_name'], $filePath)) {
                $stmt = $conn->prepare('INSERT INTO admins (first_name,middle_name,last_name,position_order,photo,bio) VALUES (?,?,?,?,?,?)');
                $stmt->execute([$fname,$mname,$lname,$position,$filePath,$bio]);
                echo "<p style='color:green;'>File uploaded successfully!</p>";
            } else {
                echo "<p style='color:red;'>File upload failed!</p>";
            }
        } else {
            echo "<p style='color:red;'>File size exceeds the 5MB limit!</p>";
        }
    } else {
        echo "<p style='color:red;'>Invalid file type!</p>";
    }
} else {
    echo "<p style='color:red;'>Error during file upload!</p>";
}

  // // Prepare SQL query to insert teacher data
  // $sql = "INSERT INTO admins (first_name, middle_name, last_name,position_order,bio) VALUES ('$fname', '$mname', '$lname', '$position','$bio')";

  // Check if the query was successful
}
// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teachers - Kasita Seminary Admin</title>
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
                <h1>Add Teachers</h1>
            </header>

            <section class="user-form">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="firstname">
                        First Name:
                    </label>
                    <input type="text" name="firstname" id="firstname" required>
                    <label for="middlename">Middle Name:</label>
                    <input type="text" name="middlename" id="middlename" required>

                    <label for="lastname">Last Name:</label>
                    <input name="lastname" id="lastname" required><br><br><br>
                    <label for="Position">Position:</label>
                    <select name="position" id="position">
                      <option value="Rector">Fr Rector</option>
                      <option value="vice-rector">Vice Rector</option>
                      <option value="Discipline-master">Descipline Master</option>
                      <option value="Spiritual-director">Spiritual Director</option>
                      <option value="deacon">Deacon</option>
                      <option value="frater">Frater</option>
                      <option value="academic-master">Academic Master</option>
                      <option value="teacher">Teacher</option>
                    </select>
                    <label for="photo">Photo:</label>
                    <input type="file" name="photo" id="photo">
                    <label for="bio">Bio:</label>
                    <input type="text" name="bio" id="bio"><br><br>
                    <button type="submit" name="upload">Add Individual</button>
                </form>
            </section>
        </main>
    </div>
</body>
</html>