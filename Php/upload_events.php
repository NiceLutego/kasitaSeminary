<?php
// Connect to the database
ob_start();
$conn = new mysqli('localhost', 'root', '', 'kasita_seminary');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload - Kasita Seminary Admin</title>
    <link rel="stylesheet" href="../Styles/admins.css">
</head>
<body>
    <div class="admin-container">
        <aside class="sidebar">
            <h2>Admin Panel</h2>
            <nav>
                <ul>
                    <li><a href="../Php/dashboard.php">Dashboard</a></li>
                    <li><a href="../Php/manage-media.php">Manage Media</a></li>
                    <li><a href="../Php/post-news.php">Post News</a></li>
                    <li><a href="../Php/manage-users.php">User Management</a></li>
                    <li><a href="../Php/departments.php">Departments</a></li>
                    <li><a href="../Php/getMessages.php">Message Managements</a></li>
                    <li><a href="../Php/manage_photo.php">Photos Managements</a></li>
                    <li><a href="../Php/manage_events.php">Events Managements</a></li>
                    <li><a href="../Pages/index.html">Home</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <header>
                <h1>Upload News</h1>
            </header>

            <section class="media-actions">
            <form action="" method="POST" enctype="multipart/form-data">
                <label>Title:</label>
                <input type="text" name="title" required><br><br>
                <label>Date:</label>
                <input type="date" name="date" id="date"><br><br>
                <label>Starting:</label>
                <input type="time" name="start" id="start"><br><br>
                <label>Finishing:</label>
                <input type="time" name="finish" id="finish"><br><br>
                <label>Location:</label>
                <input type="text" name="location" id="location"><br><br>
                <label for="description">Description:</label>
                <input type="text" name="description" id="description"><br><br>
                <button type="submit" name="upload" style="margin-left:10%;margin-top:2%;width:30%;font-size:1.6vw;">Upload</button>
            </form>
            <?php
              if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'], $_POST['date'], $_POST['start'],$_POST['finish'],$_POST['location'],$_POST['description'])) {
                $title = filter_var($_POST['title']);
                $event_date = filter_var($_POST['date']);
                $startingTime = filter_var($_POST['start']);
                $finishingTime = filter_var($_POST['finish']);
                $location = filter_var($_POST['location']);
                $description = filter_var($_POST['description']);
          
          
                  if($title && $event_date && $startingTime && $finishingTime && $location && $description){
                    $stmt = $conn->prepare("INSERT INTO events (title, event_date, start_time, finish_time,location,description) VALUES (?, ?, ?, ?,?,?)");
                    $stmt->bind_param("ssssss", $title, $event_date, $startingTime, $finishingTime,$location,$description); 
          
                    if ($stmt->execute()) {
                      echo "<p style='color:green;'>Event successful submitted.</p>";
                    } else {
                      echo "<p style='color:red;'></p>";
                      }
                      $stmt->close();
                  }
                    else {
                    echo "Invalid input.";
                    }
            }
            
            ?>
            </section>
        </main>
    </div>
</body>
</html>

<?php 
  $conn->close();
?>