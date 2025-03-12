<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "kasita_seminary";

$conn = new mysqli($host,$username,$password,$dbname);

if($conn ->connect_error){
  die("Connection failed!.".$conn ->connect_error);
}

$result = $conn->query("SELECT * FROM `rector`");
// Rector Page
include 'header.php';
?>
<div class="rector-profile">
  <?php  ?>
</div>
<h1>Rector</h1>
<p>Welcome to the Rector office Page. Here you can find information about Rector and His responsibilities.</p>
<h2 class="authorities">The Authorities of Rector</h2>
<ul>
  <li>He represents the Diocese Bishop in the Seminary.</li>
  <li>To monitor and oversee the fulfilling of the education aim and purpose in the Seminary.</li>
  <li>To lead the whole Seminary community,which includes Teaching staff,Non-teaching staff and Students.</li>
  <li>He is the joint between the Seminary and other communities around the Seminary,Diocese Bishop,Governmant leaders,Parents and different orginazations.</li>
  <li>He is the overall controller and administrator of all activities and Administration issues in the Seminary.</li>
  <li>He is the one who should make sure that the school time table is in the acceptable ratio especially between the class hours and other activities.</li>
  <li>He ensures that all crucial and very important documents concerning Administration of the Seminary are available,then he should read and implement them.</li>
</ul>
<?php include 'footer.php'; ?>