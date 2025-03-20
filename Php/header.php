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
  <title></title>
  <link rel="stylesheet" href="../Styles/header.css">
  <link rel="stylesheet" href="../Styles/footer.css">
  <link rel="stylesheet" href="../Styles/profile-styles.css">
</head>
<body>
<nav>
  <div class="logo">
    <a href="index.php">Kasita Minor Seminary</a>
  </div>
  <ul class="nav-links">
    <li><a href="../Pages/index.php"><?php echo $lang['home'];?></a></li>
    <li class="dropdown">
      <a href="javascript:void(0);"><?php echo $lang['about'];?></a>
      <ul class="dropdown-content">
        <li><a href="../Php/about.php"><?php echo $lang['about_school'];?></a></li>
        <li><a href="../Php/our-history.php"><?php echo $lang['our_history'];?></a></li>
        <li><a href="../Php/mission-vision.php"><?php echo $lang['mission_vision'];?></a></li>
        <li><a href="../Php/staff_profiles.php"><?php echo $lang['staff_members'];?></a></li>
      </ul>
    </li>
    <li class="dropdown">
      <a href="javascript:void(0);"><?php echo $lang['offices'];?></a>
      <ul class="dropdown-content">
        <li><a href="../Php/school_mgmt_team.php"><?php echo $lang['school_mgmt_team'];?></a></li>
        <li><a href="../Php/rector.php"><?php echo $lang['rector'];?></a></li>
        <li><a href="../Php/vice_rector.php"><?php echo $lang['vice_rector'];?></a></li>
        <li><a href="../Php/academic_masters.php"><?php echo $lang['academic_masters'];?></a></li>
        <li><a href="../Php/training_mentor.php"><?php echo $lang['training_mentor'];?></a></li>
        <li><a href="../Php/department_heads.php"><?php echo $lang['department_heads'];?></a></li>
        <li><a href="../Php/subject_teacher.php"><?php echo $lang['subject_teacher'];?></a></li>
        <li><a href="../Php/class_teacher.php"><?php echo $lang['class_teacher'];?></a></li>
        <li><a href="../Php/student_welfare.php"><?php echo $lang['student_welfare'];?></a></li>
        <li><a href="../Php/patron.php"><?php echo $lang['patron'];?></a></li>
        <li><a href="../Php/sports_master.php"><?php echo $lang['sports_master'];?></a></li>
        <li><a href="../Php/production_teacher.php"><?php echo $lang['production_teacher'];?></a></li>

        <!-- Add other offices here -->
      </ul>
    </li>
    <li><a href="../Php/photo_gallery.php"><?php echo $lang['photos'];?></a></li>
    <li><a href="../Php/contacts.php"><?php echo $lang['contacts'];?></a></li>
    <li><a href="#" id="mode-toggle"><?php echo $lang['mode'];?></a></li>
    <li>
      <form action="" method="get" >
        <select name="lang" id="lang" onchange="this.form.submit()" class="language-selector">
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
        </select>
      </form>
  </li>
  </ul>
  <div class="menu-icon" id="menu-icon">
    <span>&#9776;</span>
  </div>
 </nav>
<script src="../js/header.js"></script>