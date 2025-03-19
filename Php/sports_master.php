<?php
// Sports Master Page
include 'header.php';
?>
<h1>Sports Master</h1>
<p>Welcome to the Sports Master office page. Here you can find information about Sports Master and their responsibilities.</p>


<div class="team-container">
    <?php
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'kasita_seminary');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT name, position, profile_pic, responsibility, bio FROM sports_master";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='sports-master'>";
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
        echo "<p class='no-members'>No Profile found.</p>";
    }

    $conn->close();
    ?>
</div>
<h2 class="authorities-title">Responsibilities of the Sports Master</h2>
<ul class="authorities-list">
    <li>To manage the system that involves all students in sports activities within the school.</li>
    <li>To coordinate the preparation of budget estimates for the purchase of equipment and construction of facilities for use in sports activities, and submit them to the Senior Teacher in Charge of Guidance, Discipline, and Culture on time.</li>
    <li>To request, receive, distribute, maintain, and inspect sports equipment, as well as take care of the sports fields and facilities used for sporting activities.</li>
    <li>To collaborate with classroom teachers and boarding house supervisors in promoting the spirit, interest, and discipline of sports among students.</li>
    <li>To keep records of student participation and progress in sports activities within the school.</li>
</ul>
<?php include 'footer.php'; ?>
