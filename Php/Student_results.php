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
        $month = $_POST['month'] ?? '';
        $databaseName = $form . $month;
        $student_id = $_POST['student_id'] ?? '';
        $subjects = [
            'basic_math', 'chemistry', 'physics', 'biology', 'geography', 'computer_science',
            'history', 'civics', 'tanzania_history', 'english', 'french', 'bible_knowledge',
            'economics', 'kiswahili', 'divinity', 'advanced_math', 'general_studies'
        ];

        $scores = [];
        foreach ($subjects as $subject) {
            $scores[$subject] = $_POST[$subject] ?? 0;
        }

        $sum = array_sum($scores);
        $average = $sum / count($subjects);

        // Calculate grade
        if ($average >= 75) {
            $grade = 'A';
        } elseif ($average >= 65) {
            $grade = 'B';
        } elseif ($average >= 45) {
            $grade = 'C';
        } elseif ($average >= 30) {
            $grade = 'D';
        } else {
            $grade = 'F';
        }

        $sql = "INSERT INTO $databaseName (student_id, basic_math, chemistry, physics, biology, geography, computer_science, history, civics, tanzania_history, english, french, bible_knowledge, economics, kiswahili, divinity, advanced_math, general_studies, total, average, grade) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Build the full array of parameters
            $params = array_merge([$student_id], array_values($scores), [$sum, $average, $grade]);

            // The format string (based on the number of params)
            $format = 'i' . str_repeat('i', count($scores)) . 'dds';

            // Pass the format string and unpacked parameters
            $stmt->bind_param($format, ...$params);

            if ($stmt->execute()) {
                echo "<p>Results added successfully!</p>";
            } else {
                echo "<p>Error: " . $stmt->error . "</p>";
            }
        } else {
            echo "<p>SQL Error: " . $conn->error . "</p>";
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
    <title>Manage Students Results - Kasita Seminary Admin</title>
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
                    <li><a href="Student_results.php">Students Results</a></li>
                    <li><a href="../Pages/index.html">Home</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <header>
                <h1>Manage Student Results</h1>
            </header>

            <section class="results-form">
                <form action="" method="POST" id="form">
                    <label for="form">Form:</label>
                    <select name="form" id="form">
                        <option value="form_one">Form One</option>
                        <option value="form_two">Form Two</option>
                        <option value="form_three">Form Three</option>
                        <option value="form_four">Form Four</option>
                        <option value="form_five">Form Five</option>
                        <option value="form_six">Form Six</option>
                    </select>
                    <label for="student_id">Student ID:</label>
                    <input type="number" name="student_id" required><br>
                    <label for="month">Month:</label>
                    <select name="month" id="month" class="month">
                        <option value="_terminal">Terminal 2025</option>
                        <option value="_july">July 2025</option>
                        <option value="_august">August 2025</option>
                        <option value="_mid-term">Mid-term 2025</option>
                        <option value="_october">October 2025</option>
                        <option value="_november">November 2025</option>
                        <option value="_annual">Annual</option>
                    </select><br>
                    <?php
                        foreach ([
                            'Basic Mathematics', 'Chemistry', 'Physics', 'Biology', 'Geography', 'Computer Science',
                            'History', 'Civics', 'Tanzania History', 'English', 'French', 'Bible Knowledge',
                            'Economics', 'Kiswahili', 'Divinity', 'Advanced Mathematics', 'General Studies'
                        ] as $subject) {
                            $field_name = strtolower(str_replace(' ', '_', $subject));
                            echo "<label for='$field_name'>$subject:</label>";
                            echo "<input type='number' name='$field_name' min='0' max='100'><br>";
                        }
                    ?>
                    <button type="submit" name="add_results">Add Results</button>
                </form>
            </section>
        </main>
    </div>
</body>
</html>
