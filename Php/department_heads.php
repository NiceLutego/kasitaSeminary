<?php
// Academic Masters Page
include 'header.php';
?>
<h1 class="page-title">departments Heads</h1>
<p class="intro-text">Welcome to the Department Heads office page. Here you can find information about our Department Heads team and their responsibilities.</p>

<div class="team-container">
    <?php
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'kasita_seminary');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT name, position, profile_pic, responsibility, bio FROM department_heads";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='department-heads-member'>";
            echo "<img src='" . htmlspecialchars($row['profile_pic']) . "' alt='Profile of " . htmlspecialchars($row['name']) . "' class='profile-pic'>";
            echo "<div class='member-info'>";
            echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
            echo "<p class='position'><strong>Position:</strong> " . htmlspecialchars($row['position']) . "</p>";
            echo "<p class='bio'>" . htmlspecialchars($row['bio']) . "</p>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p class='no-members'>No members found.</p>";
    }

    $conn->close();
    ?>
</div>
<h2 class="authorities-title">Authorities of the Departments Heads</h2>
<p>Heads of academic departments are essential in ensuring the success of teaching and learning. Therefore, it is advised that their selection be based on special qualifications such as skills, experience, and work commitment as outlined in the service structure. The Heads of Department will carry out the following duties:</p>
<ul class="authorities-list">
    <li>They will coordinate all teaching activities for the subject they manage in the school by doing the following: Coordinating the acquisition of summaries and materials related to the subject and distributing them to teachers, Coordinating the preparation of work resolutions, lesson plans, and teaching methods within their department, Reviewing the results of exercises and internal exams given to students in that subject to ensure they align with the syllabus, resolutions, and subject logbooks.</li>
    <li>They will prepare the annual budget for their department based on existing budget guidelines to help the school head create the overall school budget.</li>
    <li>They will collaborate with other department heads in distributing funds for various departmental needs, including purchasing materials.</li>
    <li> He/She will request, receive, and maintain the necessary teaching materials for the subject according to the established procedures. He/She will arrange a special system for distributing materials to teachers and students and ensure there is a procedure for returning these materials when they are no longer needed. He/She will conduct inspections of the materials and infrastructure within the department and provide information on any damaged or lost items so that appropriate action can be taken.</li>
    <li>He/She will initiate and develop small libraries within their department for the use of teachers and students, to ease access to books and promote reading culture.</li>
    <li>He/She will regularly invite experts from various fields to interact with students and teachers with the goal of motivating students to love their studies.</li>
    <li>He/She will organize monthly meetings with the teachers of their department to provide an opportunity for discussion on teaching success and challenges. During these meetings, teachers can share knowledge and experiences. The minutes of these meetings will be kept by a designated secretary. Senior Teachers and the School Head may also be invited to these meetings.</li>
    <li>He/She will initiate and oversee subject clubs.</li>
</ul>
<?php include 'footer.php'; ?>
