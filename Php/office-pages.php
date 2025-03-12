<?php
$offices = [
    'rector' => 'Rector',
    'vice_rector' => 'Vice Rector',
    'academic_masters' => 'Academic Masters',
    'training_mentor' => 'Training Mentor',
    'department_heads' => 'Department Heads',
    'subject_teacher' => 'Subject Teacher',
    'class_teacher' => 'Class Teacher',
    'student_welfare' => 'Student Welfare',
    'patron' => 'Patron',
    'sports_master' => 'Sports Master',
    'production_teacher' => 'Production Teacher',
    'duty_teacher' => 'Duty Teacher',
    'school_mgmt_team' => 'School Management Team'
];

foreach ($offices as $key => $title) {
    $filename = "$key.php";
    $content = "<?php\n";
    $content .= "// $title Page\n";
    $content .= "include 'header.php';\n";
    $content .= "?>\n";
    $content .= "<h1>$title</h1>\n";
    $content .= "<p>Welcome to the $title office page. Here you can find information about $title and their responsibilities.</p>\n";
    $content .= "<?php include 'footer.php'; ?>\n";

    file_put_contents($filename, $content);
}

echo "Office pages created successfully.";
?>
