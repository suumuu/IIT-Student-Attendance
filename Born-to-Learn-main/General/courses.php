<?php
include '../assets/sidebar.php';
?>

<link rel="stylesheet" href="../css//courses.css">
<div class="course_div">
    <?php
    $j = 1;
    $i = 1;
    while ($j <= 4) { ?>
        <div class="courses_main_div">
            <a href="../Semester/Semesters.php?action=<?php echo $i ?>"><svg>
                    <rect></rect>
                </svg>Semester <?php echo $i ?></a>
            <?php $i++; ?>
            <a href="../Semester/Semesters.php?action=<?php echo $i ?>"><svg>
                    <rect></rect>
                </svg>Semester <?php echo $i ?></a>
            <?php $i++; ?>
        </div>
    <?php $j++;
    } ?>
</div>
</div>
</body>

</html>