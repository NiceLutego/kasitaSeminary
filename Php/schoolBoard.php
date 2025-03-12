<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kasita_seminary";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch chairperson separately
$chairperson_sql = "SELECT name, position, photo, role FROM management_team WHERE position = 'Chairperson' LIMIT 1";
$chairperson_result = $conn->query($chairperson_sql);

// Fetch other management team members
$team_sql = "SELECT name, position, photo, role FROM management_team WHERE position != 'Chairperson' ORDER BY position_rank";
$team_result = $conn->query($team_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management Team</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
        }

        .chairperson-profile {
            text-align: center;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 20px;
            border-radius: 12px;
        }

        .chairperson-profile img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
        }

        .management-team {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .team-member {
            background: #eaeaea;
            margin: 10px;
            padding: 15px;
            border-radius: 12px;
            text-align: center;
            width: 200px;
        }

        .team-member img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .roles {
            margin-top: 40px;
            padding: 20px;
            background: #ddd;
            text-align: center;
        }

        @media (max-width: 600px) {
            .management-team {
                flex-direction: column;
            }

            .team-member {
                width: 90%;
            }
        }
    </style>
</head>
<body>
  <div class="language-selector">
        <form method="get" action="">
            <label for="language">Choose language:</label>
            <select name="lang" id="language" onchange="this.form.submit()">
                <option value="en" <?php echo $lang == 'en' ? 'selected' : ''; ?>>English</option>
                <option value="sw" <?php echo $lang == 'sw' ? 'selected' : ''; ?>>Swahili</option>
                <option value="fr" <?php echo $lang == 'fr' ? 'selected' : ''; ?>>French</option>
                <option value="fr" <?php echo $lang == 'fr' ? 'selected' : ''; ?>>French</option>
            </select>
        </form>
    </div>
    
    <h1>Kasita Minor Seminary Management Team</h1>

    <?php
    if ($chairperson_result->num_rows > 0) {
        $chairperson = $chairperson_result->fetch_assoc();
        echo "<div class='chairperson-profile'>";
        echo "<img src='uploads/" . htmlspecialchars($chairperson['photo']) . "' alt='Photo of " . htmlspecialchars($chairperson['name']) . "'>";
        echo "<h2>" . htmlspecialchars($chairperson['name']) . "</h2>";
        echo "<p>" . htmlspecialchars($chairperson['position']) . "</p>";
        echo "<p><strong>Role:</strong> " . htmlspecialchars($chairperson['role']) . "</p>";
        echo "</div>";
    }
    ?>

    <div class="management-team">
        <?php
        if ($team_result->num_rows > 0) {
            while ($row = $team_result->fetch_assoc()) {
                echo "<div class='team-member'>";
                echo "<img src='uploads/" . htmlspecialchars($row['photo']) . "' alt='Photo of " . htmlspecialchars($row['name']) . "'>";
                echo "<h2>" . htmlspecialchars($row['name']) . "</h2>";
                echo "<p>" . htmlspecialchars($row['position']) . "</p>";
                echo "<p><strong>Role:</strong> " . htmlspecialchars($row['role']) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No management team members found.</p>";
        }
        ?>
    </div>

    <div class="roles">
        <h2>Roles of the Management Team</h2>
        <p>The school management team plays an essential role in ensuring smooth operations and fostering an environment for academic and personal growth.</p>
    </div>
</body>
</html>

<?php
$conn->close();
?>