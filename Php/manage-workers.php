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
        $place = $_POST['place'];
        $phone = $_POST['phone'];
        $salary = $_POST['salary'];

        // Prepare SQL query to insert teacher data
        $sql = "INSERT INTO workers (first_name, middle_name, last_name,place,phone,salary) VALUES ('$fname', '$mname', '$lname', '$place','$phone','$salary')";

        // Check if the query was successful
        if ($conn->query($sql) === TRUE) {
            echo "<p style='color:green;'>Worker submitted successful.</p>";
        } else {
            echo "<p style='color:red;'>Worker submission failed!</p>";
        }
    }
    // Handle worker deletion
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remove'])) {
        $fname = $_POST['name'] ?? '';
        $worker_id = $_POST['worker_id'] ?? '';

        if (!empty($fname) && !empty($worker_id)) {
            $sql = "DELETE FROM workers WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $worker_id);

            if ($stmt->execute()) {
                echo "<p style='color:green;'>Worker removed successfully!</p>";
            } else {
                echo "<p style='color:red;'>Worker removal failed!</p>";
            }
        } else {
            echo "<p style='color:red;'>There is no Worker to delete</p>";
        }
    }

    $result = $conn ->query('SELECT * FROM workers');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage workers - Kasita Seminary Admin</title>
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
                    <li><a href="manage-departments.php">Departments</a></li>
                    <li><a href="../Php/getMessages.php">Message Management</a></li>
                    <li><a href="manage_photo.php">Photo Management</a></li>
                    <li><a href="../Pages/index.html">Home</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <header>
                <h1>Add Workers</h1>
            </header>

            <section class="user-form">
                <form action="" method="POST" style="display:flex;flex-direction:column;" enctype="multipart/form-data">
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
                    <button type="submit" name="upload" style="height:6vh;width:20vw;font-size:1.6vw;">Add Worker</button>
                </form>
            </section>

            <section class="workers-list">
                <h2>Registered Workers</h2>
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
                                <form action="" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this Worker?')">
                                    <input type="hidden" name="name" value="<?php echo $fname; ?>">
                                    <input type="hidden" name="worker_id" value="<?php echo $row['id']; ?>">
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