<?php
$servername = "localhost";
$username = "root";  
$password = "";  
$database = "kasita_seminary";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form and results safely
$form = $_POST['form'] ?? '';
$results = $_POST['results'] ?? '';

// Check if form and results are set
if (!empty($form) && !empty($results)) {
    $form = $conn->real_escape_string($form);
    $results = $conn->real_escape_string($results);

    $query = "SELECT * FROM `$form` WHERE result = '$results'";

    $result = $conn->query($query);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }
} else {
    $result = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasita Junior Seminary - Result System</title>
    <link rel="stylesheet" href="../Styles/result.css">
</head>
<body>
    <header class="main-header">
        <h1>Welcome to Kasita Junior Seminary Result System</h1>
    </header>
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
              <a href="../Php/staff_profiles.php" class="header__nav__menu__item__link">Staff</a>
            </li>
            <li class="header__nav__menu__item">
              <a href="../Pages/login.html" class="header__nav__menu__item__link">Administration</a>
            </li>
            <li class="header__nav__menu__item">
              <a href="../Php/departments.php" class="header__nav__menu__item__link">Departments</a>
            </li>
            <li class="header__nav__menu__item">
              <a href="../Php/contacts.php" class="header__nav__menu__item__link">Contacts</a>
            </li>
          </ul>
      </nav>
    </div>
    <section class="form-section">
        <h2>Check Student Results</h2>
        <form action="" method="post">
            <select name="form" id="form">
              <option value="form_one_results" selected>Form One</option>
              <option value="form_two_results">Form Two</option>
              <option value="form_three_results">Form Three</option>
              <option value="form_four_results">Form Four</option>
              <option value="form_five_results">Form Five</option>
              <option value="form_six_results">Form Six</option>
            </select>
            <select name="results" id="results">
              <option value="terminal" selected>Terminal</option>
              <option value="july">July</option>
              <option value="august">August</option>
              <option value="mid-term">Mid-Term</option>
            </select>
            <button type="submit" id="submit" name="submit">Check Results</button>
        </form>

        <?php if ($result && $result->num_rows > 0): ?>
            <ul>
                <?php while ($row = $result->fetch_assoc()): ?>
                  <li>
                    <a style="list-style: none;" href="../uploads/<?php echo urlencode($row['file_path']); ?>" download="<?php echo htmlspecialchars(basename($row['file_path'])); ?>">
                        Download Results
                    </a>
                </li>

                <?php endwhile; ?>
            </ul>
        <?php elseif ($result && $result->num_rows === 0): ?>
            <p>No results found for the selected form and exam type.</p>
        <?php endif; ?>
    </section>

    <section class="contact-section">
        <h2>Contact Us</h2>
        <form action="../Php/contact.php" method="post">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </section>
    <footer class="main-footer">
      <div class="contacts__footer">
        <div class="contacts__footer__container">
          <div class="contacts__footer__container__column">
            <h3>About Us</h3>
            <p>St.Francis Junior Seminary-Kasita</p>
            <p>Ulanga,Morogoro,Tanzania</p>
            <p>Email: kasitajuniorseminary@gmail.com</p>
            <p>Phone: +255784397424</p>
          </div>
          <div class="contacts__footer__container__column">
            <h3>Quick Links</h3>
            <ul>
              <li><a href="../Pages/index.html">Home</a></li>
              <li><a href="../Php/about.php">About</a></li>
              <li><a href="../Php/services.php">Services</a></li>
              <li><a href="../Pages/login.html">Administration</a></li>
              <li><a href="../Php/privacy-plicy.php">Privacy and Policies</a></li>
            </ul>
          </div>
          <div class="contacts__footer__container__column">
            <h3>Follow Us</h3>
            <a href="#">Facebook</a>
            <a href="#"> YouTube</a>
            <a href="#">Instagram</a>
            <a href="#">LinkedIn</a>
            <a href="#">Twitter</a>
          </div>
        </div>
        <p class="contacts__footer__button">
          &copy; 2025 Kasita Seminary. All rights reserved.
        </p>
      </div>
    </footer>
    <script src="../js/main.js">
    </script>
</body>
</html>
