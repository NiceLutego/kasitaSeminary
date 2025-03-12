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

// Handle student results submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_results'])) {
    $form = $_POST['form'] ?? '';
    $resultType = $_POST['results'] ?? '';
    $databaseName = $form . "_results";

    // File upload handling
    if (isset($_FILES['filepath']) && $_FILES['filepath']['error'] == 0) {
        $targetDir = '../uploads/results/';
        $fileName = basename($_FILES['filepath']['name']);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow only PDF files
        if ($fileType == 'pdf') {
            if (move_uploaded_file($_FILES['filepath']['tmp_name'], $targetFilePath)) {
                // Insert file path and result type into database
                $stmt = $conn->prepare("INSERT INTO `$databaseName` (file_path, result) VALUES (?, ?)");
                $stmt->bind_param('ss', $targetFilePath, $resultType);

                if ($stmt->execute()) {
                    echo "<p>Results added successfully!</p>";
                } else {
                    echo "<p>Error: " . $stmt->error . "</p>";
                }
            } else {
                echo "<p>Failed to upload file.</p>";
            }
        } else {
            echo "<p>Only PDF files are allowed.</p>";
        }
    } else {
        echo "<p>Please select a valid file.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Students Results - Kasita Seminary Admin</title>
    <link rel="stylesheet" href="../Styles/admins.css">
    <style>
        select, input {
            height: 5vh;
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
                    <li><a href="Student_results.php">Students Results</a></li>
                    <li><a href="manage-departments.php">Departments</a></li>
                    <li><a href="../Pages/index.html">Home</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <header>
                <h1>Manage Student Results</h1>
            </header>

            <section class="results-form">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="form">Form:</label>
                    <select name="form" id="form">
                        <option value="form_one">Form One</option>
                        <option value="form_two">Form Two</option>
                        <option value="form_three">Form Three</option>
                        <option value="form_four">Form Four</option>
                        <option value="form_five">Form Five</option>
                        <option value="form_six">Form Six</option>
                    </select><br><br>

                    <label for="resultType">Results:</label>
                    <select name="results" id="results">
                        <option value="terminal">Terminal June</option>
                        <option value="july">July</option>
                        <option value="august">August</option>
                        <option value="mid-term">Mid-Term September</option>
                        <option value="october">October</option>
                        <option value="november">November</option>
                        <option value="annual">Annual December/June</option>
                    </select><br><br>

                    <label for="file">File (PDF only):</label>
                    <input type="file" name="filepath" id="filepath" accept="application/pdf"><br><br>

                    <button type="submit" name="add_results">Add Results</button>
                </form>
            </section>
        </main>
    </div>
</body>
</html>
