<?php
include '../assets/sidebar.php';
include '../assets/database.php';
$year = date('Y');
$teacher_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_type = $_SESSION['user_type'];
?>

<link rel="stylesheet" href="../css//courses.css">
<div class="course_div">
    <?php
    $j = 1;
     $i = 1;
    while ($j <= 4) { ?>
        <div class="courses_main_div">
            <a href="assignedTeacher.php?semester=<?php echo $i ?>"><svg>
                    <rect></rect>
                </svg>Semester <?php echo $i ?></a>
                <?php $i++; ?>
            <a href="assignedTeacher.php?semester=<?php echo $i ?>"><svg>
                    <rect></rect>
                </svg>Semester <?php echo $i ?></a>
                <?php $i++; ?>
        </div>
    <?php $j++; } ?>
</div>
</div>
</body>

</html>