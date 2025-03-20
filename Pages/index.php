<?php
include '../Php/generalHeader.php';
?>
  <div class="main">
    <!-- This is the home page -->
    <div class="home" id="home">
      <div class="home__1">
        <div class="overlay">
          <h1 class="welcome-text"><?php echo $lang['Welcome to']; ?> 
            <div class="animated-text">
              <span>K</span><span>a</span><span>s</span><span>i</span><span>t</span><span>a</span>
              <span>S</span><span>e</span><span>m</span><span>i</span><span>n</span><span>a</span><span>r</span><span>y</span>
            </div></h1>
          <p><?php echo $lang['Your gateway to academic success']; ?></p>
        </div>
        <!-- KASITA SEMINARY -->
        <div class="buttons">
          <button  type="button" class="news" id="news" onclick="location.href='../Php/news.php'">
            <?php echo $lang['Notice board'];?>
          </button>
          <button  type="button" class="news" id="news" onclick="location.href='../Php/media.php'">
            <?php echo $lang['View news']; ?>
          </button>
          <button class="results" onclick="location.href='../Php/result.php'">
            <?php echo $lang['View results']; ?>
          </button>
        </div>
        
        <!-- Announcements Section -->
        <section class="announcements">
          <h2><?php echo $lang['Latest announcements']; ?></h2>
          <div class="announcement-slider">
            <div class="slides">
              <div class="slide">
                <img src="../Images/kasita1.jpg" alt="Form Six Results">
                <p>Form Six Results 2025 are out! <a href="../Php/result.php">Check now</a></p>
              </div>
              <div class="slide">
                <img src="../images/announcement2.jpg" alt="Announcement 2">
                <p>Admissions for next academic year are open. <a href="#contact">Apply Now</a></p>
              </div>
              <div class="slide">
                <img src="../images/announcement3.jpg" alt="Announcement 3">
                <p>New school uniforms available at the administration office.</p>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
    <footer class="footer">
      <div class="footer__links">
        <a href="../Pages/index.php"><?php echo $lang['home'];?></a>
        <a href="../Php/about.php"><?php echo $lang['about'];?></a>
        <a href="../Php/staff_profiles.php"><?php echo $lang['staff'];?></a>
        <a href="../Pages/login.html"><?php echo $lang['administration'];?></a>
        <a href="../Php/photo_gallery.php"><?php echo $lang['photos'];?></a>
        <a href="../Php/contacts.php"><?php echo $lang['contacts'];?></a>
      </div>
      <p>&copy; 2025 <?php echo $lang['kasita_seminary_rights'];?></p>
    </footer>
  <script src="../js/main.js"></script>
  <script>
    // JavaScript for automatic sliding effect
    let index = 0;
    function showSlides() {
      let slides = document.querySelectorAll(".slide");
      slides.forEach(slide => slide.style.display = "none");
      index++;
      if (index > slides.length) { index = 1; }
      slides[index - 1].style.display = "block";
      setTimeout(showSlides, 3000); // Change slide every 3 seconds
    }
    document.addEventListener("DOMContentLoaded", showSlides);
  </script>
  <style>
    .announcements {
      width: 100%;
      max-width: 800px;
      margin: auto;
      text-align: center;
      background: #f8f8f8;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .announcement-slider {
      position: relative;
      overflow: hidden;
      width: 100%;
      height: 250px;
    }
    .slides {
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .slide {
      display: none;
      width: 100%;
      text-align: center;
    }
    .slide img {
      width: 100%;
      max-height: 200px;
      object-fit: cover;
      border-radius: 10px;
    }
    .slide p {
      font-size: 16px;
      margin-top: 10px;
    }
  </style>
</body>
</html>