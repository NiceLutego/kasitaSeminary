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

    // Handle student form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['upload'])) {
        $class = $_POST['class'] ?? '';
        $form = $_POST['form'] ?? '';
        $firstname = $_POST['firstname'] ?? '';
        $middlename = $_POST['middlename'] ?? '';
        $lastname = $_POST['lastname'] ?? '';
        $parentname = $_POST['parentname'] ?? '';
        $phone = $_POST['phone'] ?? '';

        $valid_forms = ['form_one', 'form_two', 'form_three', 'form_four', 'form_five', 'form_six'];

        if (!empty($class) && !empty($form) && !empty($firstname) && !empty($lastname) && in_array($form, $valid_forms)) {
            $sql = "INSERT INTO $form (class, first_name, middle_name, last_name, parent_name, phone) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssssss', $class, $firstname, $middlename, $lastname, $parentname, $phone);

            if ($stmt->execute()) {
                echo "<p>Student added successfully!</p>";
            } else {
                echo "<p>Error: " . $stmt->error . "</p>";
            }
        } else {
            echo "<p>Please fill in all required fields and select a valid form.</p>";
        }
    }

    // Handle student deletion
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remove'])) {
        $form = $_POST['form'] ?? '';
        $student_id = $_POST['student_id'] ?? '';

        if (!empty($form) && !empty($student_id)) {
            $sql = "DELETE FROM $form WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $student_id);

            if ($stmt->execute()) {
                echo "<p>Student removed successfully!</p>";
            } else {
                echo "<p>Error: " . $stmt->error . "</p>";
            }
        } else {
            
        }
    }

    $form = $_POST['form'] ?? 'form_one';
    $result = $conn->query("SELECT * FROM $form");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Students - Kasita Seminary Admin</title>
    <link rel="stylesheet" href="../Styles/admins.css">
    <style>
        input{
            width: 70%;
        }
    </style>
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
                    <li><a href="Student_results.php">Student Results</a></li>
                    <li><a href="manage-departments.php">Departments</a></li>
                    <li><a href="../Php/manage_photo.php">Photos Management</a></li>
                    <li><a href="../Pages/index.html">Home</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <header>
                <h1>Manage Students</h1>
            </header>

            <section class="user-form">
                <form action="" method="POST" style="display:flex;flex-direction:column;" enctype="multipart/form-data">
                    <label for="class">Class:</label>
                    <select name="class" id="class">
                        <option value="science">Science</option>
                        <option value="arts">Arts</option>
                        <option value="business">Business</option>
                    </select><br>
                    <label for="form">Form:</label>
                    <select name="form" id="form">
                        <option value="form_one">Form One</option>
                        <option value="form_two">Form Two</option>
                        <option value="form_three">Form Three</option>
                        <option value="form_four">Form Four</option>
                        <option value="form_five">Form Five</option>
                        <option value="form_six">Form Six</option>
                    </select>
                    <br>
                    <label for="firstname">First Name:</label>
                    <input type="text" name="firstname" id="firstname" required><br>
                    <label for="middlename">Middle Name:</label>
                    <input type="text" name="middlename" id="middlename" required><br>
                    <label for="lastname">Last Name:</label>
                    <input name="lastname" id="lastname" required><br>
                    <label for="parentname">Parent Name:</label>
                    <input type="text" name="parentname" id="parentname"><br>
                    <label for="phone">Phone:</label>
                    <input type="tel" name="phone" id="phone"><br><br>
                    <button type="submit" name="upload" style="height:6vh;width:20vw;font-size:1.6vw;">Add Student</button>
                </form>
            </section>

            <section class="student-list">
                <h2>Registered<?php echo" ". $form ?> Students</h2>
                <table border="1">
                    <tr>
                        <th>ID</th>
                        <th>Class</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Parent Name</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['class']; ?></td>
                            <td><?php echo $row['first_name']; ?></td>
                            <td><?php echo $row['middle_name']; ?></td>
                            <td><?php echo $row['last_name']; ?></td>
                            <td><?php echo $row['parent_name']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td>
                                <form action="" method="POST" style="display:inline;">
                                    <input type="hidden" name="form" value="<?php echo $form; ?>">
                                    <input type="hidden" name="student_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="remove">Remove Student</button>
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
