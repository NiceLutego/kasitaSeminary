<?php
// Academic Masters Page
include 'header.php';
?>
<h1 class="page-title">Class Teachers</h1>
<p class="intro-text">Welcome to the Class Teachers office page. Here you can find information about our class teachers team and their responsibilities.</p>

<div class="team-container">
    <?php
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'kasita_seminary');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT name, position, profile_pic,class, bio FROM class_teachers";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='class-teacher-member'>";
            echo "<img src='" . htmlspecialchars($row['profile_pic']) . "' alt='Profile of " . htmlspecialchars($row['name']) . "' class='profile-pic'>";
            echo "<div class='member-info'>";
            echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
            echo "<p class='position'><strong>Position:</strong> " . htmlspecialchars($row['position']) . "</p>";
            echo "<p class='bio'>" . htmlspecialchars($row['bio']) . "</p>";
            echo "<p class='class'><strong>Class:</strong> " . htmlspecialchars($row['class']) . "</p>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p class='no-members'>No members found.</p>";
    }

    $conn->close();
    ?>
</div>
<h2 class="authorities-title">Responsibilities of the Class Teacher</h2>
<ul class="authorities-list">
    <li>To maintain and update the daily attendance register for students.</li>
    <li>To keep records of student attendance in all subject lessons (subject logbook).</li>
    <li>To provide attendance reports of students to the Senior Teacher and Head of Department.</li>
    <li>To inspect the attendance of teachers and the teaching of lessons (subject logbook inspection) and take appropriate action if there is no report from the Senior Teacher.</li>
    <li>To receive and listen to any issues students have in the classroom and address them properly.</li>
    <li>To fully guide students in the classroom to ensure effective communication and feedback on daily progress.</li>
    <li>To organize and manage the classroom duties, including checking the cleanliness of the students.</li>
    <li>To ensure that the rules and procedures for classroom cleanliness and maintenance are posted on the classroom bulletin board.</li>
    <li>To manage the selection of class leaders.</li>
    <li>To keep records of academic progress and behavioral development of students in the class.</li>
    <li>To fill in and submit progress reports for students to their parents or guardians at the end of each term and offer advice as needed.</li>
    <li>To teach safety drills to students in the classroom to prepare them for potential emergencies.</li>
</ul>
<?php include 'footer.php'; ?>
