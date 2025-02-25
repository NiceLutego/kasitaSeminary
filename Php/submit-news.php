<?php
// Database configuration
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'kasita_seminary';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['date'], $_POST['title'], $_POST['content'])) {
  $date = filter_var($_POST['date']);
  $title = filter_var($_POST['title']);
  $content = htmlspecialchars($_POST['content']);

  if ($date && $title && $content) {
      $stmt = $conn->prepare("INSERT INTO new_post (event_date, title, content) VALUES (?, ?, ?)");
      $stmt->bind_param("sss", $date, $title, $content);
      if ($stmt->execute()) {
          
      } else {
          echo "Error: " . $stmt->error;
      }
      $stmt->close();
  } else {
      echo "Invalid input.";
  }
}

$sql = "SELECT * FROM new_post ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Uploaded news</title>
  <link rel="stylesheet" href="../Styles/newsFetch.css">
</head>
<body>
  <main class="uploaded_haeder">
    <h1>Your News are here</h1>
  </main>
  <table border="1">
    <tr>
      <th>ID</th>
      <th>TITLE</th>
      <th>CONTENT</th>
      <th>DATE</th>
      <th>POSTED AT</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
    <td><?= $row['id'] ?></td>
            <td><?= $row['title'] ?></td>
            <td><?= $row['content'] ?></td>
            <td><?= $row['event_date'] ?></td>
            <td><?= $row['created_at'] ?></td>
    </tr>
    <?php } ?>
  </table>
</body>
</html>
<?php
$conn->close();
?>