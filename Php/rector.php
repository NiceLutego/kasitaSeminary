<?php
// Rector Page
include 'header.php';
?>
<h1 class="page-title">Rector's Office</h1>
<div class="container">
    <?php
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'kasita_seminary');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT name, profile_pic, responsibility, bio, respect FROM rector";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='rector-profile'>";
            echo "<img src='" . htmlspecialchars($row['profile_pic']) . "' alt='Profile of " . htmlspecialchars($row['name']) . "' class='profile-pic'>";
            echo "<div class='rector-info'>";
            echo "<h3>" . htmlspecialchars($row['respect']) . '. ' . htmlspecialchars($row['name']) . "</h3>";
            echo "<p class='rector-role'><strong>Role:</strong> " . htmlspecialchars($row['responsibility']) . "</p>";
            echo "<p class='rector-bio'>" . htmlspecialchars($row['bio']) . "</p>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p class='no-profile'>No Profile found.</p>";
    }

    $conn->close();
    ?>
</div>

<h2 class="authorities-title">Authorities of the Rector</h2>
<ul class="authorities-list">
  <li>Represents the Diocese Bishop in the Seminary.</li>
  <li>Oversees the fulfillment of the seminary’s educational goals.</li>
  <li>Leads the entire seminary community, including teaching and non-teaching staff, and students.</li>
  <li>Acts as the link between the seminary, diocese, government, parents, and organizations.</li>
  <li>Has overall control and administration of seminary activities.</li>
  <li>Ensures that the school timetable maintains a balanced ratio between class hours and extracurricular activities.</li>
  <li>Ensures the availability and implementation of crucial administrative documents.</li>

</ul>
<h2 class="authorities-title">Responsibilities</h2>
 <ul class="authorities-list">
    <li>He will receive various guidelines related to education in all its aspects and oversee their implementation.</li>
    <li>He will communicate with the Director of the Council by receiving and forwarding various reports as required or by submitting letters from employees and parents to the Director of the Council. He/She should not refuse to forward letters.</li>
    <li>He must obtain approval from the Director of the Council when considering making major administrative changes. For example:Closing the school before the scheduled time,Increasing streams/classes,Not making decisions that will negatively affect parents/guardians and students due to minor human errors.</li>
    <li>He will implement the recommendations of school inspectors regarding the overall development of the school.</li>
    <li>He will monitor the availability of qualified staff, necessary equipment, and adequate infrastructure to ensure the successful implementation of education goals.</li>
    <li>He will assign teachers duties and responsibilities based on their profession, expertise, work experience, skills, and capabilities in various fields.</li>
    <li>He will ensure that all required syllabuses for the approved curriculum are available.</li>
    <li>He will ensure that teachers prepare lesson plans and schemes of work for their subjects and that all taught content is recorded in the official Subject Log Book, which he will review regularly. The Head of School is the internal supervisor of the seminary's development.</li>
    <li> He will emphasize that teachers and other staff responsible for teaching in classrooms also have the duty of guiding and mentoring students to ensure they are nurtured according to national ethical values.</li>
    <li>He will inspect the teaching of all subjects to ensure they align with the subject syllabus and are appropriate for the respective grade level. This will help the Head of Seminary understand teachers' strengths and weaknesses and provide necessary support.</li>
    <li>He will serve as the Chairperson of the Academic Committee at the seminary.</li>
    <li>He will serve as the Chairperson of the Entrepreneurship Committee at the seminary and ensure that the seminary has solid entrepreneurial plans that enable it to achieve self-sustainability.</li>
    <li>He/She will ensure that all teachers teach subjects that they have been trained in.</li>
    <li>He will ensure that all teachers prepare lesson schemes, lesson plans, lesson notes, teaching and learning materials, exercises, and student assessments.</li>
    <li>He will ensure that all teachers set, administer, and mark exams to assess student progress.</li>
    <li>He will ensure that all teachers assign tasks to students and mark their exercises.</li>
    <li>He will ensure that all teachers prepare reports on students' work and submit them to the seminary administration.</li>
    <li>He will oversee and ensure that all teachers keep records of students' academic progress and submit them to the relevant authorities.</li>
    <li>He will encourage all teachers to conduct educational research, especially in their respective subjects at the seminary.</li>
    <li>He will supervise the preparation of teachers' timetables, ensure their implementation, and provide reports to the seminary administration.</li>
    <li>He will encourage all staff members to work together in instilling in students a culture of respect for their guardians, student leaders, and the good reputation of their seminary.</li>
    <li>He will monitor and ensure that teachers oversee Subject Clubs at the seminary.</li>
    <li>He will ensure that all teachers prepare a work plan and prioritize their assigned responsibilities.</li>
    <li>He will ensure that all teachers maintain and properly manage the materials and equipment assigned to them.</li>
    <li>He will ensure that teachers provide expert advice at higher levels on various academic matters based on their assigned responsibilities.</li>
    <li>He will supervise teachers to ensure they prepare students mentally, physically, socially, and spiritually by teaching them good behavior and conduct so they understand their responsibilities in society.</li>
    <li>He will follow up and require teachers to provide guidance and counseling to students.</li>
    <li>He will supervise teachers to create a conducive learning and teaching environment at the seminary.</li>
    <li>He will oversee the preparation of all financial reports each month and ensure they are submitted to the relevant authorities on time.</li>
    <li>He will be responsible for responding to all financial audit queries as they arise and ensure timely submission.</li>
    <li>He will ensure that all collected funds are deposited into the bank immediately before any usage.</li>
    <li>He will oversee and ensure that all seminary payments comply with the procedures set by the Council.</li>
    <li>He will ensure that the seminary's annual budget is prepared on time.</li>
    <li>He will facilitate the existence of a ledger for recording all purchased and distributed materials for use and ensure they are audited monthly.</li>
    <li>He will supervise the preparation of the Seminary Plan and its implementation (Action Plan).</li>
    <li>He will supervise and ensure that teachers fully comply with the Terms and Conditions of Service and the Code of Professional Conduct.</li>
    <li>He is responsible for understanding the teachers and non-teaching staff under his/her leadership to effectively assign duties based on their behavior and capabilities.</li>
    <li>He will listen to and understand the personal challenges and problems of teachers and other staff under him and address them accordingly.</li>
    <li>He will collaborate with the Discipline Committee to instill good behavior among students based on the country's ethical principles. This behavior should emphasize justice, equality, cooperation, respect, and work as the foundation of life.</li>
    <li>He should emphasize teamwork in leadership while ensuring that everyone remains accountable for their respective responsibilities.</li>
    <li>He will lead the teachers’ meeting to fill out student behavior assessment forms (for Form 4 students and Form 6 students) and submit them to the National Examinations Council of Tanzania (NECTA).</li>
    <li>The Head of Seminary should understand the community surrounding the seminary to build and maintain a good relationship and cooperation with it.</li>
    <li>He should be aware of government and institutional leaders and involve them in the development of the seminary.</li>
    <li>The Head of School should communicate regularly with parents regarding their children's progress and challenges to ensure their proper education and upbringing.</li>
 </ul>
<?php include 'footer.php'; ?>
