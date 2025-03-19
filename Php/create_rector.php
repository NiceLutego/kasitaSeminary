<?php
include('db_config.php'); // Database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['res'],$_POST['bio'],$_POST['respect'])){
    $fullname = $_POST['name'] ?? '';
    $res = $_POST['res'] ?? '';
    $bio = $_POST['bio'] ?? '';
    $respect = $_POST['respect'] ?? '';
    $profile_pic = $_FILES['profile-pic'];

    $allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $maxFileSize = 20 * 1024 * 1024; // 20MB

    if ($profile_pic['error'] === UPLOAD_ERR_OK) {
        $fileMimeType = mime_content_type($profile_pic['tmp_name']);
        $fileSize = $profile_pic['size'];

        if ((in_array($fileMimeType, $allowedImageTypes))) {

            if ($fileSize <= $maxFileSize) {
                $targetDir = 'uploads/';
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0777, true);
                }
                $filePath = $targetDir . basename($profile_pic['name']);

                if (move_uploaded_file($profile_pic['tmp_name'], $filePath)) {
                    $stmt = $conn->prepare('INSERT INTO rector (name,profile_pic,responsibility,bio,respect) VALUES (?, ?,?,?,?)');
                    $stmt->execute([$fullname,$filePath,$res,$bio,$respect]);
                    echo "<p style='color:green;'>Rector uploaded successfully!</p>";
                } else {
                    echo "<p style='color:red;'>Rector upload failed!</p>";
                }
            } else {
                echo "<p style='color:red;'>Profile picture size exceeds the 20MB limit!</p>";
            }
        } else {
            echo "<p style='color:red;'>Invalid Image type!</p>";
        }
    } else {
        echo "<p style='color:red;'>Error during Profile upload!</p>";
    }

}
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
                    <li><a href="../Php/dashboard.php">Dashboard</a></li>
                    <li><a href="../Php/management-team.php">Management Team</a></li>
                    <li><a href="../Php/manage-rector.php">Rector</a></li>
                    <li><a href="../Php/manage-vice-rector.php">Vice Rector</a></li>
                    <li><a href="../Php/manage-academic-masters.php">Academic Masters</a></li>
                    <li><a href="../Php/manage-training-mentor.php">Training Mentor</a></li>
                    <li><a href="../Php/manage-department-heads.php">Departments Heads</a></li>
                    <li><a href="../Php/manage-subject-teacher.php">Subject Teacher</a></li>
                    <li><a href="../Php/manage-class-teacher.php">Class Teacher</a></li>
                    <li><a href="../Php/manage-student-welfare.php">Student Welfare</a></li>
                    <li><a href="../Php/manage-patron.php">Patrons</a></li>
                    <li><a href="../Pages/index.html">Home</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <header>
                <h1>Create Rector</h1>
            </header>
            <section class="admin-list">
            <form action="" method="post" enctype="multipart/form-data">
                <label for="respect">Initials:</label>
                <select name="respect" id="respect">
                  <option value="Rev Dr Fr" selected>Rev Dr Fr</option>
                </select>
                <label for="username">Full Name:</label>
                <input type="text" name="name" id="name"><br><br>
                <label for="responsibility">Responsibility:</label>
                <input type="text" name="res" id="res"><br><br>
                <label for="profile-pic">Profile Picture:</label>
                <input type="file" name="profile-pic" id="profile-pic"><br><br>
                <label for="bio">Bio:</label>
                <input type="text" name="bio" id="bio"><br><br>
                <button type="submit" name="upload" id="upload">Create Rector</button>
            </form>
            </section>
          </main>
    </div>
</body>
</html>
