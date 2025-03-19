<?php
// Vice Rector Page
include 'header.php';
?>
<h1>Vice Rector</h1>
<p>Welcome to the Vice Rector office page. Here you can find information about Vice Rector and their responsibilities.</p>

<div class="team-container">
    <?php
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'kasita_seminary');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT name,profile_pic, responsibility, bio FROM vice_rector";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='vice-rector'>";
            echo "<img src='" . htmlspecialchars($row['profile_pic']) . "' alt='Profile picture of " . htmlspecialchars($row['name']) . "' class='profile-pic'>";
            echo "<div class='member-info'>";
            echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
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

<h2 class="authorities-title">Authorities of the Vice Rector</h2>
<p>Due to the workload of the Rector of Seminary and the emphasis on delegation and shared leadership, the school should have a Deputy Head of Seminary who will serve as a vital link between the Rector of Seminary and both the seminary community and external stakeholders.</p>
<ul class="authorities-list">
    <li>He will serve as the Deputy Head of Seminary.</li>
    <li>He will act on behalf of the Rector of Seminary when the Rector is absent.</li>
    <li>He will represent the Rector of Seminary whenever necessary.</li>
    <li>He will be responsible for regularly updating the Rector of Seminary on teachers', staff's, and students' opinions and concerns regarding the overall management of the seminary.</li>
    <li>He will handle all matters related to student discipline in consultation with the Senior Teacher in charge of student welfare, the disciplinary committee, and all teachers, while also keeping records of disciplinary actions taken.</li>
    <li>He will oversee and lead all Seminary Council activities in consultation with the Rector of Seminary.</li>
    <li>He will manage student registration procedures by implementing initial admission guidelines for new students.</li>
    <li>He will ensure that the seminary follows a structured daily routine for all activities.</li>
    <li>He will supervise the work performance of all non-teaching staff.</li>
    <li>He will oversee the use of seminary vehicles.</li>
</ul>

<?php include 'footer.php'; ?>
