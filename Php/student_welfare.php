<?php
// Student Welfare Page
include 'header.php';
?>
<h1>Student Welfare</h1>
<p>Welcome to the Student Welfare office page. Here you can find information about Student Welfare and their responsibilities.</p>

<div class="team-container">
    <?php
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'kasita_seminary');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT name, position, profile_pic, responsibility, bio FROM student_welfare";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='student-welfare'>";
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
        echo "<p>No Profile found.</p>";
    }

    $conn->close();
    ?>
</div>

<h2 class="authorities-title">
    Authorities of the Students Welfare
</h2>
<p>The Senior Teacher in Charge of Guidance, Discipline, and Culture will be the chief advisor to the school on matters related to the physical, mental, and social development of students. He/She will collaborate with all teachers to ensure the overall well-being of students in accordance with national policies, aiming to help students become independent and responsible individuals within the classroom.

Under the Senior Teacher in Charge of Guidance, Discipline, and Culture, the following leaders will assist:Housemaster/Housemistress (In charge of student welfare in dormitories), Sports Coordinator,Culture Coordinator.</p>
<ul class="authorities-list">
    <li>To assist the Vice Rector of Seminary and other teachers in maintaining discipline.</li>
    <li>To collaborate with the School Council and the Teachers' Council in formulating and implementing school management policies and procedures.</li>
    <li>To keep records of disciplinary actions taken by teachers in the school and submit periodic reports on discipline issues to the Deputy Head of School.</li>
    <li>To educate students regularly on their responsibilities and rights in accordance with the school rules and regulations.</li>
</ul>
<h2 class="authorities-title">Responsibilities of the Students Welfare</h2>
<ul class="authorities-list">
    <li>To advise the Head of School on the selection of sports and cultural activities, including the management of boarding house activities and cultural programs.</li>
    <li>To collaborate with the sports and cultural coordinators to plan and implement sports and cultural activities within the school and prepare the annual budget needed for the development of these activities.</li>
    <li>To request, receive, distribute, and maintain all materials related to sports and cultural activities.</li>
    <li>To organize and conduct meetings with boarding house managers, coordinators, and teachers of sports and cultural activities in line with the school calendar.</li>
    <li> To work with senior teachers and other educational staff to complete the application forms for the training (e.g., Form IV) for students in the respective grade level.</li>
</ul>
<?php include 'footer.php'; ?>
