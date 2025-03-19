<?php
    //database connection
    $host = 'localhost'; // your database host
    $dbname = 'kasita_seminary'; // your database name
    $username = 'root'; // your database username
    $password = ''; // your database password

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasita Seminary Admin Dashboard</title>
    <link rel="stylesheet" href="../Styles/admins.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Make sure jQuery is included -->
</head>
<body>
    <div class="admin-container">
        <aside class="sidebar">
            <h2>Admin Panel</h2>
            <nav>
                <ul>
                    <li><a href="../Php/dashboard.php">Dashboard</a></li>
                    <li><a href="../Php/management-team.php">Management Team</a></li>
                    <li><a href="../Php/manage-rector.php">Rector</a></li>
                    <li><a href="../Php/manage-vice-rector.php">Vice Rector</a></li>
                    <li><a href="../Php/manage-academic-masters.php">Academic Masters</a></li>
                    <li><a href="../Php/manage-training-mentor.php">Training Mentor</a></li>
                    <li><a href="../Php/manage-department-heads.php">Departments Heads</a></li>
                    <li><a href="../Php/manage-subject-teacher.php">Subject Teacher</a></li>
                    <li><a href="../Php/manage-class-teacher.php">Class Teacher</a></li>
                    <li><a href="../Php/manage-student-welfare.php">Student Welfare</a></li>
                    <li><a href="../Php/manage-patron.php">Patrons</a></li>
                    <li><a href="../Php/manage-sports-master.php">Sports Masters</a></li>
                    <li><a href="../Php/manage-production-teacher.php">Production Teachers</a></li>
                    <li><a href="../Pages/index.php">Home</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <header>
                <h1>Welcome, Admin</h1>
            </header>

            <section class="dashboard-widgets">
                <div class="widget">
                    <h3>Management Team</h3>
                    <p id="management-team">Loading...</p> <!-- IDs added for dynamic updates -->
                </div>
                <div class="widget">
                    <h3>Academic Masters</h3>
                    <p id="academic-masters">Loading...</p>
                </div>
                <div class="widget">
                    <h3>Training Mentors</h3>
                    <p id="training-mentor">Loading...</p>
                </div>
            </section>

            <section class="admin-actions">
                <button onclick="location.href='management-team.php'">Management Team</button>
                <button onclick="location.href='manage-academic-masters.php'">Academic Masters</button>
                <button onclick="location.href='manage-training-mentor.php'">Training Mentors</button>
            </section>
        </main>
    </div>

    <script>
        $(document).ready(function() {
            function updateWidgets() {
                $.ajax({
                    url: 'get-dashboard-data.php',
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#management-team').text(data.totalManagementTeam);
                        $('#academic-masters').text(data.totalAcademicMasters);
                        $('#training-mentor').text(data.totalTrainingMentor);
                    },
                    error: function() {
                        $('#management-team').text('Error');
                        $('#academic-masters').text('Error');
                        $('#training-mentor').text('Error');
                    }
                });
            }
            
            updateWidgets(); // Update on page load
        });
    </script>
</body>
</html>
