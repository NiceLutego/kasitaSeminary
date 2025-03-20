<?php
// Training Mentor Page
include 'header.php';
?>
<h1>Training Mentor</h1>
<p>Welcome to the Training Mentor office page. Here you can find information about Training Mentor and their responsibilities.</p>

<div class="team-container">
    <?php
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'kasita_seminary');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT name, position, profile_pic, bio FROM training_mentor";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='training-mentor'>";
            echo "<img src='" . htmlspecialchars($row['profile_pic']) . "' alt='Profile picture of " . htmlspecialchars($row['name']) . "' class='profile-pic'>";
            echo "<div class='member-info'>";
            echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
            echo "<p><strong>Position:</strong> " . htmlspecialchars($row['position']) . "</p>";
            echo "<p>" . htmlspecialchars($row['bio']) . "</p>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>No members found.</p>";
    }

    $conn->close();
    ?>
</div>
<h2 class="authorities-title">Authorities Of the Training Mentor</h2>
<p>In collaboration with the subject teachers, he/she will be an advisor to students in all matters related to career and training development.</p>
<ul class="authorities-list">
    <li>He/She will handle obtaining information related to students' career plans.</li>
    <li>He/She will collect and organize information about career plans (career development) for students in order to help them understand and make informed choices about the subjects and jobs that suit them.</li>
    <li>He/She will assess students' abilities and match them with appropriate educational and career paths.</li>
    <li>He/She will collaborate with both subject teachers and home room teachers in assisting students facing personal issues that may affect their behavior or academic progress (Counseling).</li>
</ul>
<?php include 'footer.php'; ?>
