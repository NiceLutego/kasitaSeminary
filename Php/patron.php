<?php
// Academic Masters Page
include 'header.php';
?>
<h1 class="page-title">Patrons</h1>
<p class="intro-text">Welcome to the Patrons office page. Here you can find information about our Patrons team and their responsibilities.</p>

<div class="team-container">
    <?php
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'kasita_seminary');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT name, position, profile_pic, domitory, bio FROM patron";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='patron-member'>";
            echo "<img src='" . htmlspecialchars($row['profile_pic']) . "' alt='Profile of " . htmlspecialchars($row['name']) . "' class='profile-pic'>";
            echo "<div class='member-info'>";
            echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
            echo "<p class='position'><strong>Position:</strong> " . htmlspecialchars($row['position']) . "</p>";
            echo "<p class='bio'>" . htmlspecialchars($row['bio']) . "</p>";
            echo "<p class='domitory'><strong>Domitory:</strong> " . htmlspecialchars($row['domitory']) . "</p>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p class='no-members'>No members found.</p>";
    }

    $conn->close();
    ?>
</div>
<h2 class="authorities-title">Responsibilities of Patron</h2>
<p>The Housemaster/Mistress (Mlezi Mkuu) is responsible for fostering a good relationship and cooperation with the students assigned to them by doing the following:</p>
<ul class="authorities-list">
    <li>To know all their students by name, appearance, and behavior.</li>
    <li>To supervise the students' well-being and development, including personal hygiene, cleanliness of the dormitory, and their environment.</li>
    <li>To receive and welcome new students into the house, guiding them in adapting to their new environment.</li>
    <li>To manage matters related to student discipline, in collaboration with assistant housemasters/mistresses and prefects.</li>
    <li>To organize regular meetings for the house in accordance with the school calendar to discuss issues concerning student life.</li>
    <li>To oversee the preparation and implementation of house activities with the help of assistants and prefects.</li>
    <li>To supervise the implementation of cultural and sports activities.</li>
    <li>To receive, distribute, maintain, and inspect the equipment provided for running house activities.</li>
    <li>To supervise safety drills (emergency drills) for students.</li>
</ul>
<?php include 'footer.php'; ?>
