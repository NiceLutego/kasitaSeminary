<?php
// Academic Masters Page
include 'header.php';
?>
<h1 class="page-title">Academic Masters</h1>
<p class="intro-text">Welcome to the Academic Masters office page. Here you can find information about our academic team and their responsibilities.</p>

<div class="team-container">
    <?php
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'kasita_seminary');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT name, position, profile_pic, bio FROM academic_masters";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='academic-member'>";
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

<h2 class="authorities-title">Authorities of Academic Masters</h2>
<p>An experienced teacher will be the chief advisor to the seminary in all matters related to academics and will guide teachers and leaders in the following areas:</p>
<ul class="authorities-list">
    <li>Advisor for teaching and work,</li>
    <li>Head of the academic department,</li>
    <li>Classroom teachers, and</li>
    <li>Subject teachers.</li>
</ul>
<h2 class="authorities-title">Responsibilities Of Academic Masters</h2>
<ul class="authorities-list">
    <li>He/She will be the Secretary of the Academic Committee, which unites the Heads of all academic departments.</li>
    <li>He/She will collaborate with the Heads of academic departments in planning academic activities.</li>
    <li>He/She will receive reports on the use of resources from the Heads of academic departments and consolidate them to enable the seminary head to prepare the annual budget related to classroom supplies.</li>
    <li>He/She will oversee the procurement of materials and summaries for subjects and distribute them to the Heads of academic departments for their departments' use.</li>
    <li>He/She will prepare and organize all activities related to filling in student progress forms and ensure that these forms are completed and submitted on time. These forms include daily progress reports of students sent to the Tanzania National Examination Council (NECTA), progress reports sent to parents, and work/exam performance forms for Form Four  and Form Six students. He/She will ensure that all these records are kept within the school and properly archived.</li>
    <li>He/She will handle the filling of application forms for students registering for Form II/IV/V examinations following the laws and guidelines provided by the Seminary Inspector and the Tanzania National Examination Council (NECTA).</li>
    <li>He/She will collaborate with the Heads of Department to prepare reports on the needs of teachers according to their respective teaching categories in the seminary.</li>
    <li>He/She will advise the Heads of Department in managing the teaching of teachers and students involved in practical teaching exercises.</li>
    <li>In collaboration with the Heads of Department, he/she will oversee the preparation of work resolutions, lesson plans, teaching and filling of teaching logs (subject logbooks).</li>
    <li>He/She will schedule special times to inspect the overall teaching and learning processes.</li>
</ul>
<?php include 'footer.php'; ?>
