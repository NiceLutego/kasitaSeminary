<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KASITA SEMINARY</title>
  <link rel="stylesheet" href="../Styles/contacts.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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

  <div class="main-content">
    <!-- Contacts Section -->
    <div class="contacts" id="contact">
      <div class="contacts__container">
          <h2 class="contact-form-heading">Contact Us Form</h2>
          <div class="contacts__container__1">
              <form class="contacts__container__1__contactForm" action="../Php/submit_contact.php" method="post">
                  <div class="contacts__container__1__contactForm__form-group">
                      <label for="contactForm__form-group__fullName">Full Name:</label>
                      <input type="text" id="fullName" name="fullName" required placeholder="Your Full Name">
                  </div>
                  <div class="contacts__container__1__contactForm__form-group">
                      <label for="email">Email:</label>
                      <input type="email" id="email" name="email" required placeholder="Your Email Address">
                  </div>
                  <div class="contacts__container__1__contactForm__form-group">
                      <label for="phone">Phone:</label>
                      <input type="text" id="phone" name="phone" required placeholder="Your Phone Number">
                  </div>
                  <div class="contacts__container__1__contactForm__form-group">
                      <label for="message">Message:</label>
                      <textarea id="message" name="message" required></textarea>
                  </div>
                  <button type="submit">Submit</button>
              </form>
          </div>
      </div>
    </div>
  </div>

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
        <a href="#">FaceBook</a>
        <a href="#">Twitter</a>
        <a href="#">Instagram</a>
        <a href="#">LinkedIn</a>
      </div>
    </div>
    <p class="contacts__footer__button">
      &copy; 2025 Kasita Seminary. All rights reserved.
    </p>
  </div>

  <script src="../js/main.js"></script>
</body>
</html>
