<?php
// Production Teacher Page
include 'header.php';
?>
<h1>Production Teacher</h1>
<p>Welcome to the Production Teacher office page. Here you can find information about Production Teacher and their responsibilities.</p>

<div class="team-container">
    <?php
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'kasita_seminary');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT name, position, profile_pic, responsibility, bio FROM production_teachers";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='production-teacher'>";
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
        echo "<p class='no-members'>No members found.</p>";
    }

    $conn->close();
    ?>
</div>
<h2 class="authorities-title">Responsibilities of Production Teachers</h2>
<ul class="authorities-list">
    <li>To provide guidance on entrepreneurial activities.</li>
    <li>To participate in the meetings of the seminary's entrepreneurship committee and the Seminary Council.</li>
    <li>To prepare and maintain all records related to entrepreneurship activities in the seminary.</li>
    <li>To collaborate in the process of evaluating the implementation of entrepreneurship plans within the seminary, working together with subject teachers and other experts.</li>
    <li>To provide guidance on the distribution of responsibilities for managing project funds.</li>
    <li>To supervise the progress of projects.</li>
    <li>To manage the maintenance of equipment and buildings used for entrepreneurship activities.</li>
    <li>To keep records of income and expenditures arising from school projects.</li>
</ul>
<?php include 'footer.php'; ?>
