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

    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['remove'])){
      $id = $_POST['id'] ?? '';

      if(!empty($id)){
        $stmt = $conn ->prepare("DELETE FROM department_heads WHERE id = ?");
        $stmt ->bind_param("i",$id);
        if($stmt ->execute()){
          echo "<p style='color:green;'>The member is deleted successful.</p>";
        }
        else{
          echo "<p style='color:red;'>Error .".$stmt->error."</p>";
        }
      }
    }
    $result = $conn ->query("SELECT * FROM department_heads");
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
                    <li><a href="../Pages/index.html">Home</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <header>
                <h1>Department Heads</h1>
            </header>
            <h3>Kasita Seminary Department Heads</h3>
            <table border="1">
              <tr>
                <th>Name</th>
                <th>Responsibility</th>
                <th>Department</th>
                <th>Bio</th>
                <th>Action</th>
              </tr>
              <?php while($row =$result->fetch_assoc()):?>
              <tr>
                  <td><?=htmlspecialchars($row['name']);?></td>
                  <td><?=htmlspecialchars($row['responsibility']);?></td>
                  <td><?=htmlspecialchars($row['department']);?></td>
                  <td><?=htmlspecialchars($row['bio']);?></td>
                  <td>
                    <form action="" method="post" enctype="multipart/form-data" onsubmit="return confirm('Are you sure,you want to remove this member?');">
                      <input type="hidden" name="id" value="<?=htmlspecialchars($row['id']);?>">
                      <button type="submit" name="remove" value="delete">Remove</button>
                    </form>
                  </td>
              </tr>
              <?php endwhile;?>
            </table><br><br>
            <form action="../Php/create_department_head.php" method="post">
              <button type="submit">Create new Department Head</button>
            </form>

        </main>
    </div>
</body>
</html>