<?php
$servername = "localhost";
$username = "root";  
$password = "";  
$database = "kasita_junior_seminary";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();

// Redirect to login page if the user is not an admin
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header('Location: login.html');
    exit();
}
// Handle admin login with hashed passwords
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'], $_POST['password'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT password FROM admins WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
}
    $stmt->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Panel</title>
    <link rel="stylesheet" href="../Styles/admin.css">
<!-- 
    <style>
        body{
            overflow: hidden;
            background-color: teal;
        }
        html{
            scroll-behavior: smooth;
        }

    </style> -->
</head>
<body>
    <h2>Welcome into the Admin Penel</h2>
    <!-- <table border="1">
        <tr class="table_header">
            <th class="tables_header_1">ID</th>
            <th class="tables_header_2">Full Name</th>
            <th class="tables_header_3">Email</th>
            <th class="tables_header_4">Phone</th>
            <th class="tables_header_5">Message</th>
            <th class="tables_header_6">Submitted At</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['Full_Name'] ?></td>
            <td><?= $row['Email'] ?></td>
            <td><?= $row['Phone'] ?></td>
            <td><?= $row['Messages'] ?></td>
            <td><?= $row['Submitted_At'] ?></td>
        </tr>
        <?php } ?>
    </table> -->
    <div class="container">
        <div class="container__1">
            <h2>Event News</h2>
            <div class="container__1__layer">
                
            </div>
        </div>
        <div class="container__2">
            <h1>View Panel</h1>
            <p><a href="../Php/getMessages.php"></a></p>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
