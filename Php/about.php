<?php
include '../Php/generalHeader.php';
?>  
<div class="about" id="about">
    <div class="about__header">
      <h1 class="about__header__text">
        <?php echo $lang['about_kasita_seminary'];?>
      </h1>
    </div>
    <div class="about__name">
      <div class="about__name__container">
          <p class="about__name__container__paragraph">
            <?php echo $lang["Kasita Seminary is a distinguished institution located in Mahenge, within the Ulanga District of Tanzania's Morogoro Region. Mahenge serves as the administrative center of Ulanga District. The seminary is approximately 214 kilometers (133 miles) from Morogoro Municipal. This distance underscores the seminary's accessibility for those traveling from the regional capital. Established to provide holistic education, Kasita Seminary emphasizes not only academic excellence but also the spiritual and physical development of its students. The institution is committed to nurturing self-discipline, spiritual growth, and physical well-being, ensuring that seminarians are well-prepared for their future roles in the priesthood. The serene environment of Mahenge offers an ideal setting for reflection, study, and personal growth, aligning with the seminary's mission to develop well-rounded individuals dedicated to serving both God and their communities."];?>
          </p>
          <span class="about__name__container__image">
            
          </span>
      </div>
      <button type="button" onclick="location.href='../Php/ordinary_level.php'" class="seebtn"><?php echo $lang['see_more'];?></button>
    </div>
<footer class="footer">
  <div class="footer__links">
    <a href="../Pages/index.html"><?php echo $lang['home'];?></a>
    <a href="../Php/about.php"><?php echo $lang['about'];?></a>
    <a href="../Php/staff_profiles.php"><?php echo $lang['staff_members'];?></a>
    <a href="../Php/photo_gallery.php"><?php echo $lang['photos'];?></a>
    <a href="../Php/contacts.php"><?php echo $lang['contacts'];?></a>
  </div>
  <p>&copy; 2025 <?php echo $lang['kasita_seminary_rights'];?></p>
</footer>
    <script src="../js/main.js"></script>
</body>
</html>