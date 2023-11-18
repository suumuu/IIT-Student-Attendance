<?php
include '../assets/sidebar.php';
include '../assets/database.php';
if (isset(($_GET['year']))) {
    // $date=date("Y/m/d"); 
    $year = $_GET['year'];
    $semester1 = $_GET['semester1'];
    $semester2 = $_GET['semester2'];
}
function calculate($conn, $allcourses, $student_id)
{
    $mark = 0;
    $i = 0;
    $performance = 0;

    foreach ($allcourses as $atn_key => $atn_value) {
        $assaigncourse_id = $atn_value;
        $mark_ofcourse =  mysqli_query($conn, " SELECT * FROM `performance` WHERE assaigncourse_id='$assaigncourse_id' AND student_id='$student_id'") or die('query failed');
        if ($mark_ofcourse->num_rows > 0) {
            $row = $mark_ofcourse->fetch_assoc();
            // $course_id= $row['assaigncourse_id'];
            // $student_id= $row['student_id'];
            // echo " ".$course_id." ".$student_id;
            $mark = $mark + $row['performance'];
            $i++;
        }
    }
    if ($i != 0) {
        $performance = $mark / $i;
    }

    return $performance;
}
?>

<link rel="stylesheet" href="../css//batchSemester.css">
<link rel="stylesheet" href="../css//coursePerformance.css">

<div class="team-area">
    <div class="team-container">
        <section class="team">
            <div class="container">
                <div class="section-title">
                    <h4>Year: <?php echo $year; ?></h4>
                    <div class="underline"></div>
                </div>
                <?php
                $result = mysqli_query($conn, " SELECT * FROM `user` WHERE semester='$semester1' OR semester='$semester2'") or die('query failed');
                if ($result->num_rows > 0) {   ?>

                    <div class="row">
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            $allcourses = array();
                            $student_id = $row['ID'];
                            $student_name = $row['Name'];
                            $student_roll = $row['Roll'];
                            $semester = $row['semester'];

                            $student_courses = mysqli_query($conn, " SELECT assaigncourse.assaigncourse_id  FROM courses  JOIN assaigncourse ON courses.course_id=assaigncourse.course_id WHERE courses.course_semester='$semester'") or die('query failed');
                            if ($student_courses->num_rows > 0) {

                                while ($row = $student_courses->fetch_assoc()) {

                                    $assaigncourse_id = $row['assaigncourse_id'];
                                    $allcourses[] = $assaigncourse_id;
                                }
                            }
                            $performance = calculate($conn, $allcourses, $student_id);

                        ?>
                            <div class="col-lg-6 mt-4">
                                <div class="member d-flex align-items-start">
                                    <div class="col-lg-5" style="margin:auto;">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width:85%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $performance; ?>%</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7" style="margin:auto;">
                                        <div class="member-info">
                                            <h4><?php echo $student_name; ?></h4>
                                            <span><?php echo $student_roll ?></span>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                }
                ?>
            </div>
        </section>

    </div>
</div>
</div>
</body>

</html>