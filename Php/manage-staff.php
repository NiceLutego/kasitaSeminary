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
                    <li><a href="manage_staff_profiles.php">Staff Profiles</a></li>
                    <li><a href="../Pages/index.html">Home</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <header>
                <h1>Add Teachers</h1>
            </header>

            <section class="user-form">
                <form action="submit-teachers.php" method="POST" style="display:flex;flex-direction:column;">
                    <label for="teachername">
                        First Name:
                    </label>
                    <br>
                    <input type="text" name="firstname" id="firstname" required>
                    <br>
                    <label for="middlename">Middle Name:</label>

                    <input type="text" name="middlename" id="middlename" required>
                    <br>
                    <label for="lastname">Last Name:</label>
                    <input name="lastname" id="lastname" required><br>
                    <label for="subject">Subject:</label>
                
                    <select name="subject" id="subject">
                        <option value="English">English</option>
                        <option value="French">French</option>
                        <option value="Kiswahili">Kiswahili</option>
                        <option value="Geography">Geography</option>
                        <option value="Cs">Computer Science</option>
                        <option value="Graphics and Design">Graphics & Design</option>
                        <option value="Chemistry">Chemistry</option>
                        <option value="Physics">Physics</option>
                        <option value="Biology">Biology</option>
                        <option value="Mathematics">Mathematics</option>
                        <option value="Economics">Economics</option>
                        <option value="Business">Business</option>
                    </select>
                    <br>
                    <label for="salary">Salary:</label>
                    <input type="text" name="salary" id="salary">
                    <br>
                    <label for="phone">Phone:</label>
                    <input type="tel" name="phone" id="phone">
                    <br><br>
                    <button type="submit" name="upload" style="height:6vh;width:20vw;font-size:1.6vw;">Add Teacher</button>
                </form>
            </section>
        </main>
    </div>
</body>
</html>