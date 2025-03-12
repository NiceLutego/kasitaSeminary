<?php
    // Database configuration
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'kasita_seminary';

    // Create connection
    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['upload'])) {
        $date = filter_var($_POST['date']);
        $title = filter_var($_POST['title']);
        $content = htmlspecialchars($_POST['content']);
      
        if ($date && $title && $content) {
            $stmt = $conn->prepare("INSERT INTO new_post (event_date, title, content) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $date, $title, $content);
            if ($stmt->execute()) {
                echo "<p style='green;'>The notes posted successful!</p>";
            } else {
                echo "<p style='color:red;'>The notes posting failed!</p>";
            }
            $stmt->close();
        } else {
            echo "Invalid input.";
        }
      }

    // Handle news deletion
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remove'])) {
        $new_id = $_POST['id'] ?? '';

        if (!empty($new_id)) {
            $stmt = $conn->prepare("DELETE FROM new_post WHERE id = ?");
            $stmt->bind_param('i', $new_id);

            if ($stmt->execute()) {
                echo "<p>News removed successfully!</p>";
            } else {
                echo "<p>Error: " . $stmt->error . "</p>";
            }
        }
    }

    // Fetch Media
    $result = $conn->query('SELECT * FROM new_post');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post News - Kasita Seminary Admin</title>
    <link rel="stylesheet" href="../Styles/admins.css">
</head>
<body>
    <div class="admin-container">
        <aside class="sidebar">
            <h2>Admin Panel</h2>
            <nav>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="manage-media.php">Manage Media</a></li>
                    <li><a href="post-news.php">Post News</a></li>
                    <li><a href="manage-users.php">User Management</a></li>
                    <li><a href="manage-departments.php">Departments</a></li>
                    <li><a href="../Php/getMessages.php">Message Management</a></li>
                    <li><a href="manage_photo.php">Photo Management</a></li>
                    <li><a href="../Pages/index.html">Home</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <header>
                <h1>Post News</h1>
            </header>

            <section class="news-form">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="date">Date:</label>
                    <input type="date" name="date" id="date" required><br><br>
                    <label for="title">News Title:</label>
                    <input type="text" name="title" id="title" required><br><br>

                    <label for="content">Content:</label>
                    <textarea name="content" id="content" rows="5" required></textarea><br><br>

                    <button type="submit">Post News</button>
                </form>
                <h2>Posted news on the Notice Board.</h2>
                <table>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['title']); ?></td>
                            <td>
                                <form action="" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this news?');">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']); ?>">
                                    <button type="submit" name="remove">Delete News</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </section>
        </main>
    </div>
</body>
</html>
