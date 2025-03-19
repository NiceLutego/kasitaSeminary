<?php
// Duty Teacher Page
include 'header.php';
?>
<h1>Duty Teacher</h1>
<p>Welcome to the Duty Teacher office page. Here you can find information about Duty Teacher and their responsibilities.</p>

<div class="rector-container">
    <?php
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'kasita_seminary');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT name, position, profile_pic, responsibility, bio FROM duty_teacher";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='teacher-on-duty'>";
            echo "<img src='" . htmlspecialchars($row['profile_pic']) . "' alt='Profile picture of " . htmlspecialchars($row['name']) . "' class='profile-pic'>";
            echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
            echo "<p><strong>Position:</strong> " . htmlspecialchars($row['position']) . "</p>";
            echo "<p><strong>Responsibility:</strong> " . htmlspecialchars($row['responsibility']) . "</p>";
            echo "<p>" . htmlspecialchars($row['bio']) . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>No Profile found.</p>";
    }

    $conn->close();
    ?>
</div>

<?php include 'footer.php'; ?>
