<?php
    // Database configuration
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'kasita_seminary';

    // Create connection
    $conn = new mysqli($host, $username, $password, $dbname);
    
    //fetch news
    $result = $conn ->query('SELECT * FROM new_post');
    $output = $conn ->query('SELECT * FROM events');


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasita Seminary Notice Board</title>
    <link rel="stylesheet" href="../Styles/newsPage.css">
</head>
<body>
<div class="header">
    <div class="header__logo">
        <span class="header__logo__burger"></span>
    </div>
    <nav class="header__nav" id="nav-menu">
        <ul class="header__nav__menu">
            <li class="header__nav__menu__item"><a href="../Pages/index.php" class="header__nav__menu__item__link">Home</a></li>
            <li class="header__nav__menu__item"><a href="../Php/about.php" class="header__nav__menu__item__link">About</a></li>
            <li class="header__nav__menu__item"><a href="../Php/staff_profiles.php" class="header__nav__menu__item__link">Staff</a></li>
            <li class="header__nav__menu__item"><a href="../Pages/login.html" class="header__nav__menu__item__link">Administration</a></li>
            <li class="header__nav__menu__item"><a href="../Php/departments.php" class="header__nav__menu__item__link">Departments</a></li>
            <li class="header__nav__menu__item"><a href="../Php/contacts.php" class="header__nav__menu__item__link">Contacts</a></li>
        </ul>
    </nav>
</div>
<main class="news_bar">
    <section class="notice_board">
        <div class="notice-container">
            <div class="notice-bord">
                <h2>School Notice Board</h2>
                <ul>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <li><i><?php echo $row['event_date'];?>:</i><?php echo $row['title'];?>.<?php echo $row['content'];?>.<span class="new-text">New</span></li>
                    <?php endwhile; ?>
                </ul>
            </div>
            <div class="event-card">
                  <h2 class="event-heading">Upcoming Events</h2>
                  <div class="event-details">
                    <?php while ($row = $output->fetch_assoc()): ?>
                      <div class="event">
                          <h3><?php echo $row['title'];?></h3>
                          <p>Date: <?php echo $row['event_date'];?></p>
                          <p>Time:  <?php echo $row['start_time'];?> -  <?php echo $row['finish_time'];?></p>
                          <p>Location:  <?php echo $row['location'];?></p>
                          <p>
                            <strong>Description:</strong> 
                            <?php echo $row['description'];?>
                            </p>
                      </div>
                      <?php endwhile; ?>
                      <!-- <div class="event">
                          <h3>English Reinforcement.</h3>
                          <p>Date: october 04, 2025</p>
                          <p>Time: 9:00 AM - 12:00 PM</p>
                          <p>Location: School Main Hall</p>
                          <p>
                            <strong>Description:</strong> 
                            English reinforcement programs.
                            It may be dabate or speaking skills.
                            </p>
                      </div>
                      <div class="event">
                          <h3>Talent day</h3>
                          <p>Date: October 14, 2025</p>
                          <p>Time: 2:00 PM - 5:00 PM</p>
                          <p>Location: School Main Hall</p>
                          <p>
                                <strong>Description:</strong> 
                                This day will comprise two events which is remembering mwl.Julius Kambarage Nyerere and talents will be shown by the students.
                            </p>
                      </div> -->
                  </div>
              </div>
    </section>
</main>
<script src="../js/main.js"></script>
</body>
</html>
