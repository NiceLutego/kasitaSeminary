<?php
session_start();

// Set language based on user selection
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

// Default language
$lang = $_SESSION['lang'] ?? 'en';

// Load language file
$lang_file = "../languages/" . $lang . ".php";
if (file_exists($lang_file)) {
    include($lang_file);
} else {
    include("../languages/en.php"); // Fallback to English
}
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KASITA SEMINARY</title>
  <link rel="stylesheet" href="../Styles/main.css">
  <link rel="stylesheet" href="../Styles/about.css">
  <link rel="stylesheet" href="../Styles/contacts.css">
  <link rel="stylesheet" href="../Styles/style.css">
  <link rel="stylesheet" href="../Styles/history.css">
  <link rel="stylesheet" href="../Styles/mission-vision.css">
  <link rel="stylesheet" href="../Styles/staff.css">
  <link rel="stylesheet" href="../Styles/generalHeader.css">
  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>
<div class="header">
    <div class="header__logo">
        <span class="header__logo__burger"></span>
    </div>
    <nav class="header__nav">
        <ul class="header__nav__menu">
            <li class="header__nav__menu__item">
                <a href="../Pages/index.php" class="header__nav__menu__item__link"><?php echo $lang['home']; ?></a>
            </li>
            <li class="header__nav__menu__item">
                <a href="javascript:void(0);" class="header__nav__menu__item__drop"><?php echo $lang['about']; ?></a>
                <div class="dropdown">
                    <a href="../Php/about.php"><?php echo $lang['about_school']; ?></a>
                    <a href="../Php/our-history.php"><?php echo $lang['our_history']; ?></a>
                    <a href="../Php/mission-vision.php"><?php echo $lang['mission_vision']; ?></a>
                    <a href="../Php/staff_profiles.php"><?php echo $lang['staff_members']; ?></a>
                </div>
            </li>
            <li class="header__nav__menu__item">
                <a href="javascript:void(0);" class="header__nav__menu__item__drop"><?php echo $lang['administration']; ?></a>
                <div class="dropdown">
                    <a href="../Php/school_mgmt_team.php"><?php echo $lang['school_mgmt_team']; ?></a>
                    <a href="../Php/rector.php"><?php echo $lang['rector']; ?></a>
                    <a href="../Php/vice_rector.php"><?php echo $lang['vice_rector']; ?></a>
                    <a href="../Php/academic_masters.php"><?php echo $lang['academic_masters']; ?></a>
                    <a href="../Php/training_mentor.php"><?php echo $lang['training_mentor']; ?></a>
                    <a href="../Php/department_heads.php"><?php echo $lang['department_heads']; ?></a>
                    <a href="../Php/subject_teacher.php"><?php echo $lang['subject_teacher']; ?></a>
                    <a href="../Php/class_teacher.php"><?php echo $lang['class_teacher']; ?></a>
                    <a href="../Php/student_welfare.php"><?php echo $lang['student_welfare']; ?></a>
                    <a href="../Php/patron.php"><?php echo $lang['patron']; ?></a>
                    <a href="../Php/sports_master.php"><?php echo $lang['sports_master']; ?></a>
                    <a href="../Php/production_teacher.php"><?php echo $lang['production_teacher']; ?></a>
                    <a href="../Php/duty_teacher.php"><?php echo $lang['duty_teacher']; ?></a>
                </div>
            </li>
            <li class="header__nav__menu__item">
                <a href="../Php/photo_gallery.php" class="header__nav__menu__item__link"><?php echo $lang['photos']; ?></a>
            </li>
            <li class="header__nav__menu__item">
                <a href="../Php/contacts.php" class="header__nav__menu__item__link"><?php echo $lang['contacts']; ?></a>
            </li>
            <li class="header__nav__menu__item language-item">
                <form method="get" action="">
                    <select name="lang" id="language" onchange="this.form.submit()" class="language-selector">
                        <option value="en" <?php echo (isset($_GET['lang']) && $_GET['lang']== 'en') ? 'selected' : ''; ?>>English</option>
                        <option value="sw" <?php echo (isset($_GET['lang']) && $_GET['lang']== 'sw') ? 'selected' : ''; ?>>Swahili</option>
                        <option value="it" <?php echo (isset($_GET['lang']) && $_GET['lang']== 'it') ? 'selected' : ''; ?>>Italian</option>
                        <option value="es" <?php echo (isset($_GET['lang']) && $_GET['lang']== 'es') ? 'selected' : ''; ?>>Spanish</option>
                        <option value="de" <?php echo (isset($_GET['lang']) && $_GET['lang']== 'de') ? 'selected' : ''; ?>>German</option>
                        <option value="fr" <?php echo (isset($_GET['lang']) && $_GET['lang']== 'fr') ? 'selected' : ''; ?>>French</option>
                        <option value="ar" <?php echo (isset($_GET['lang']) && $_GET['lang']== 'ar') ? 'selected' : ''; ?>>Arabic</option>
                        <option value="zh" <?php echo (isset($_GET['lang']) && $_GET['lang']== 'zh') ? 'selected' : ''; ?>>Chinese</option>
                        <option value="ru" <?php echo (isset($_GET['lang']) && $_GET['lang']== 'ru') ? 'selected' : ''; ?>>Russia</option>
                        <option value="hi" <?php echo (isset($_GET['lang']) && $_GET['lang']== 'hi') ? 'selected' : ''; ?>>Hindi</option>
                        <!-- Add more language options here -->
                    </select>
                </form>
            </li>
        </ul>
    </nav>
</div>
