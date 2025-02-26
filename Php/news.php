<?php

// Database Connection
$pdo = new PDO('mysql:host=localhost;dbname=Kasita_Seminary', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$media = $pdo->query('SELECT * FROM media')->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kasita News</title>
    <link rel="stylesheet" href="../Styles/main.css">
</head>
<body>
<div class="header">
    <div class="header__logo">
     <span class="header__logo__burger"></span>
    </div>
    <nav class="header__nav">
        <ul class="header__nav__menu">
          <li class="header__nav__menu__item">
            <a href="../Pages/index.html" class="header__nav__menu__item__link">Home</a>
          </li>
          <li class="header__nav__menu__item">
            <a href="../Php/about.php" class="header__nav__menu__item__link">About</a>
          </li>
          <li class="header__nav__menu__item">
            <a href="../Pages/login.html" class="header__nav__menu__item__link">Administration</a>
          </li>
          <li class="header__nav__menu__item">
            <a href="../Php/departments.php" class="header__nav__menu__item__link">Departments</a>
          </li>
          <li class="header__nav__menu__item">
            <a href="../Php/contacs.php" class="header__nav__menu__item__link">Contacts</a>
          </li>
        </ul>
    </nav>
  </div>
  <main class="news_bar" id="news_bar">
    <h2>Navigate bottom of this page to view latest news</h2>
    <section class="notice_board" id="notice_board">
      <div class="main-notice-section" 
             id="notice-bord-sction">
            <div class="notice-container">
                <div class="notice-bord">
                  <h2 class="notice-bord-heading">
                      School Notice Board
                  </h2>
                  <div>
                    <ul>
                      <li>
                        <i>August 8, 2024:</i>
                          This is Workers day.It is the national
                          Republic holiday
                                    
                          <span class="new-text">New</span>
                      </li>
                      <li>
                        <i>August 15, 2024:</i> 
                          Science fair showcasing 
                          innovative student projects. 
                        <span class="new-text">New</span>
                      </li>
                      <li>
                        <i>October 14, 2024:</i> 
                          Talents show including the followings:
                          dance, music, and drama performances. 
                        <span class="new-text">New</span>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="event-card">
                  <h2 class="event-heading">Upcoming Events</h2>
                  <div class="event-details">
                      <div class="event">
                          <h3>Parents' Day.</h3>
                          <p>Date: August 31, 2024</p>
                          <p>Time: 9:00 AM - 12:00 PM</p>
                          <p>Location: School Main Hall</p>
                          <p>
                            <strong>Description:</strong> 
                            This day the parents of the kasita seminary seminarians will be having the meeting with the school adminstration.
                            </p>
                      </div>
                      <div class="event">
                          <h3>English Reinforcement.</h3>
                          <p>Date: october 04, 2024</p>
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
                          <p>Date: October 14, 2024</p>
                          <p>Time: 2:00 PM - 5:00 PM</p>
                          <p>Location: School Main Hall</p>
                          <p>
                                <strong>Description:</strong> 
                                This day will comprise two events which is remembering mwl.Julius Kambarage Nyerere and talents will be shown by the students.
                            </p>
                      </div>
                  </div>
              </div>
      </section>
    </main>

    <h2 class="posts_header">Latest News from Kasita Seminary.</h2>
    <ul class="posts_list">
        <?php foreach ($media as $item): ?>
            <li>
                <strong class="post_title"><?php echo htmlspecialchars($item['title']); ?></strong><strong><?php echo htmlspecialchars($item['created_at'])?></strong><br>
                <?php if ($item['type'] === 'image'): ?>
                    <img class="post_image" src="<?php echo htmlspecialchars($item['file_path']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" width="200">
                <?php elseif ($item['type'] === 'video'): ?>
                    <video class="post_video"width="400" height="240" controls>
                        <source src="<?php echo htmlspecialchars($item['file_path']); ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
