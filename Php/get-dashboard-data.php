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

    $mediaQuery=$pdo->query("SELECT COUNT(*) FROM media");
    $totalMedia=$mediaQuery->fetchColumn();

    $departmentsQuery=$pdo->query("SELECT COUNT(*) FROM departments");
    $totalDepartments=$departmentsQuery->fetchColumn();

    $staffQuery=$pdo->query("SELECT COUNT(*) FROM staff");
    $totalStaff=$staffQuery->fetchColumn();

    $schoolManagementTeam = $pdo ->query("SELECT COUNT(*) FROM management_team");
    $totalManagementTeam = $schoolManagementTeam ->fetchColumn();

    $academicMasters = $pdo ->query("SELECT COUNT(*) FROM academic_masters");
    $totalAcademicMasters = $academicMasters ->fetchColumn();

    $trainingMentor = $pdo ->query("SELECT COUNT(*) FROM training_mentor");
    $totalTrainingMentor = $trainingMentor->fetchColumn();

    echo json_encode([
      'totalMedia'=>$totalMedia,
      'totalNewsPosts'=>$totalDepartments,
      'totalUsers'=>$totalStaff
    ]);


?>