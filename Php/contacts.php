<?php
include '../Php/generalHeader.php';
?>
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
        <p>P.O.Box 103</p>
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
        <a href="#">twitter</a>
      </div>
    </div>
    <p class="contacts__footer__button">
      &copy; 2025 Kasita Seminary. All rights reserved.
    </p>
  </div>

  <script src="../js/main.js"></script>
</body>
</html>
