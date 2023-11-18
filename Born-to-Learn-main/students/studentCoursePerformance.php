<?php
include '../assets/sidebar.php';
include '../assets/database.php';
$year = date('Y');
// $teacher_id = $_SESSION['user_id'];
// $user_name = $_SESSION['user_name']; 
$user_type = $_SESSION['user_type'];
$user_semester = $_SESSION['semester'];
?>

<link rel="stylesheet" href="../css//students.css">
<style>
    body {
        overflow: hidden;
    }
</style>


<div class="team-area ps-0" style="padding-top: 110px;">
    <div class="team-container">
        <div class="row mx-5">
            <!-- <div class="d-flex"> -->

           
            <?php
            $semester_Course = mysqli_query($conn, " SELECT * FROM `courses` WHERE course_semester='$user_semester'") or die('query failed');

            if ($semester_Course->num_rows > 0) {

                while ($row = $semester_Course->fetch_assoc()) { 
                    $course= $row['course_id']; 
                    $course_code = $row['course_code'];
                    $course_title = $row['course_title'];
                    $course_semester=$row['course_semester'];
                    $couser_assaign = mysqli_query($conn, " SELECT * FROM `assaigncourse` WHERE year='$year' AND course_id='$course'") or die('query failed');
                    if ($couser_assaign->num_rows > 0){
                        $row = $couser_assaign->fetch_assoc();
                        $assaigncourse_id=$row['assaigncourse_id'];

                    }else{
                        $assaigncourse_id="0";
                    }
                    ?>
                    <!-- <div class="col-1"></div> -->
                    <div class="col-3 d-flex justify-content-around">
                        <div class="card mb-4" style="width: 18rem;background:#d5e5f6 ">
                            <div class="card-body" style="text-align:center;">
                                <h6 class="card-title fw-bold"><?php echo $course_title; ?></h6>
                                <h6 class="card-subtitle mb-2 text-muted "><?php echo $course_code; ?></h6>
                                <div>
                                <a href="../teachers/coursePerformance.php?semester=<?php echo $course_semester; ?> && assaigncourse_id=<?php echo $assaigncourse_id; ?>" class="card-link btn button_color btn-sm text-white mt-2">See Performance</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-1"></div> -->

            <?php }
            }  ?>


            <!-- <div class="col-1"></div> -->

            <!-- </div> -->
        </div>
    </div>
</div>
</div>
</div>
</body>

</html>