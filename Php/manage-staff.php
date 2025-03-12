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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['upload'])) {
    // Get form input
    $fname = $_POST['firstname'];
    $mname = $_POST['middlename'];
    $lname = $_POST['lastname'];
    $subject = $_POST['subject'];
    $phone = $_POST['phone'];
    $salary = $_POST['salary'];

    // Prepare SQL query to insert teacher data
    $sql = "INSERT INTO staff (first_name, middle_name, last_name,subject,salary, phone) VALUES ('$fname', '$mname', '$lname', '$subject','$salary','$phone')";

    // Check if the query was successful
    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>Teacher submitted successful!</p>";
    } else {
        echo "<p style='color:red;'>Teacher submission failed!</p>";
    }
}
// Handle worker deletion
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remove'])) {
    $fname = $_POST['name'] ?? '';
    $teacher_id = $_POST['teacher_id'] ?? '';

    if (!empty($fname) && !empty($teacher_id)) {
        $sql = "DELETE FROM workers WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $teacher_id);

        if ($stmt->execute()) {
            echo "<p style='color:green;'>Teacher removed successfully!</p>";
        } else {
            echo "<p style='color:red;'>Teacher removal failed!</p>";
        }
    } else {
        echo "<p style='color:red;'>There is no Teacher to delete</p>";
    }
}

$result = $conn ->query('SELECT * FROM staff');
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
                    <li><a href="manage-departments.php">Departments</a></li>
                    <li><a href="../Php/manage_photo.php">Photos Management</a></li>
                    <li><a href="../Pages/index.html">Home</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <header>
                <h1>Add Teachers</h1>
            </header>

            <section class="user-form">
                <form action="" method="POST" style="display:flex;flex-direction:column;" enctype="multipart/form-data">
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

            <section class="teachers-list">
                <h2>Registered Teachers</h2>
                <table border="1">
                    <tr>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['first_name']; ?></td>
                            <td><?php echo $row['middle_name']; ?></td>
                            <td><?php echo $row['last_name']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td>
                                <form action="" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this Teacher?')">
                                    <input type="hidden" name="name" value="<?php echo $fname; ?>">
                                    <input type="hidden" name="teacher_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="remove">Remove Worker</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </section>
        </main>
    </div>
</body>
</html>


<?php
$conn ->close();
?>