<?php
// School Management Team Page
include 'header.php';
?>
<h1>School Management Team</h1>
<p>Welcome to the School Management Team office page. Here you can find information about the School Management Team and their responsibilities.</p>

<div class="team-container">
    <?php
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'kasita_seminary');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT name, position, profile_pic, responsibility, bio FROM management_team";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='team-member'>";
            echo "<img src='" . htmlspecialchars($row['profile_pic']) . "' alt='Profile picture of " . htmlspecialchars($row['name']) . "' class='profile-pic'>";
            echo "<div class='member-info'>";
            echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
            echo "<p><strong>Position:</strong> " . htmlspecialchars($row['position']) . "</p>";
            echo "<p><strong>Responsibility:</strong> " . htmlspecialchars($row['responsibility']) . "</p>";
            echo "<p>" . htmlspecialchars($row['bio']) . "</p>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p class='no-members'>No team members found.</p>";
    }

    $conn->close();
    ?>
</div>

<?php include 'footer.php'; ?>
