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

    $newsQuery=$pdo->query("SELECT COUNT(*) FROM news_posts");
    $totalNewsPosts=$newsQuery->fetchColumn();

    $usersQuery=$pdo->query("SELECT COUNT(*) FROM users");
    $totalUsers=$usersQuery->fetchColumn();

    echo json_encode([
      'totalMedia'=>$totalMedia,
      'totalNewsPosts'=>$totalNewsPosts,
      'totalUsers'=>$totalUsers
    ]);


?>