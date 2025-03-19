<?php
// Subject Teacher Page
include 'header.php';
?>
<h1>Subject Teacher</h1>
<p>Welcome to the Subject Teacher office page. Here you can find information about Subject Teacher and their responsibilities.</p>

<div class="team-container">
    <?php
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'kasita_seminary');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT name, position, profile_pic, subject, bio FROM subject_teachers";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='subject-teacher'>";
            echo "<img src='" . htmlspecialchars($row['profile_pic']) . "' alt='Profile picture of " . htmlspecialchars($row['name']) . "' class='profile-pic'>";
            echo "<div class='member-info'>";
            echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
            echo "<p><strong>Position:</strong> " . htmlspecialchars($row['position']) . "</p>";
            echo "<p><strong>Subjects:</strong> " . htmlspecialchars($row['subject']) . "</p>";
            echo "<p>" . htmlspecialchars($row['bio']) . "</p>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>No Profile found.</p>";
    }

    $conn->close();
    ?>
</div>
<h2 class="authorities-title">Responsibilities of Subject Teacher</h2>
<ul class="authorities-list">
    <li>To enable students to gain knowledge and understanding of the subject they are being taught, as outlined in the syllabus for that subject.</li>
    <li>To ensure that students understand the material properly and can be supported in gaining the right information.</li>
    <li>He/She will prepare lesson plans to teach effectively.</li>
    <li>To provide exercises and quizzes to students to assess their understanding of the lessons taught. He/She will fill in and maintain the required records. He/She will have a procedure for reviewing students’ daily work to ensure that they have written the correct information as taught.</li>
    <li>To guide students to develop curiosity, self-confidence, critical thinking, and innovation among them. He/She will lead students in a way that helps them become independent and work diligently.</li>
    <li>To ensure that students attend classes, sit according to the timetable, behave appropriately in class, remain disciplined, and have enough work to do during the class time.</li>
    <li>To cooperate with other teachers in the daily nurturing and care of the students being taught.</li>
    <li>To receive and maintain teaching and learning materials from the Head of Department and distribute them to students.</li>
</ul>
<?php include 'footer.php'; ?>
