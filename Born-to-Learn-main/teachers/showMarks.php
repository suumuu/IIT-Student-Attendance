<?php
include '../assets/sidebar.php';
include '../assets/database.php';

if (isset(($_GET['semester']))) {
    // $date=date("Y/m/d"); 

    $semester = $_GET['semester'];
    $assaigncourse_id = $_GET['assaigncourse_id'];
}

?>

<link rel="stylesheet" href="../css//courseAttandance.css">


<div class="team-area">
    <div class="team-container">
        <div style="padding-bottom: 25px;padding-top:80px;">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-3">
                    <a class="btn button_color btn-sm ms-1" href="marks.php">Back</a>
                </div>
                <div class="col-2"></div>
                <div class="col-3">
                    <div class="dropdown d-flex justify-content-end me-1">
                        <button class="btn button_color btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" name="addMarks">Add Tests</button>
                        <ul class="dropdown-menu" id="thenumbers" name="thenumbers" aria-labelledby="dropdownMenuButton1" style="text-decoration: none;">
                            <li class="dropdown-item" value="test" style="cursor:pointer"><a href="../teachers/addmarks.php? semester=<?php echo $semester; ?> && assaigncourse_id=<?php echo $assaigncourse_id; ?> && test_type=classTest" class="li_align"> Class Test</a></li>
                            <li class="dropdown-item" value="Presentation" style="cursor:pointer"><a href="addmarks.php?semester=<?php echo $semester; ?> && assaigncourse_id=<?php echo $assaigncourse_id; ?> && test_type=presentation" class="li_align"> Presentation</a></li>
                            <li class="dropdown-item" value="Assignment" style="cursor:pointer"><a href="addmarks.php?semester=<?php echo $semester; ?> && assaigncourse_id=<?php echo $assaigncourse_id; ?> && test_type=assignment"class="li_align"> Assignment</a></li>
                        </ul>

                    </div>
                    <input type='hidden' name='thenumbers'>
                </div>
            </div>
            <table class="mt-2" style="margin-left: 50%;">

                <tbody>


                    <tr id="header" style="text-align:center;">
                        <th>ID</th>
                        <th>Name</th>

                        <?php
                        $tests =  mysqli_query($conn, " SELECT DISTINCT  taste_name FROM `course_tests` WHERE assaigncourse_id='$assaigncourse_id'") or die('query failed');
                        $tests_array = array();
                        if ($tests->num_rows > 0) {
                            while ($row = $tests->fetch_assoc()) {
                                $test = $row['taste_name'];
                                $tests_array[] = $test;
                        ?>
                                <th><?php echo  $test; ?></th>
                        <?php }
                        } ?>
                    </tr>


                    <?php

                    $result = mysqli_query($conn, " SELECT * FROM `user` WHERE semester='$semester'") or die('query failed');
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $student_id = $row['ID'];
                            $student_name = $row['Name'];
                            $student_roll = $row['Roll'];

                    ?>
                            <tr>
                                <td><?php echo $student_roll; ?></td>
                                <td><?php echo $student_name; ?></td>

                                <?php


                                foreach ($tests_array as $test_no) {
                                    $testof_student = mysqli_query($conn, " SELECT *  FROM `course_tests` WHERE assaigncourse_id='$assaigncourse_id' AND student_id='$student_id' AND taste_name ='$test_no'") or die('query failed');
                                    if ($testof_student->num_rows > 0) {
                                        $row = $testof_student->fetch_assoc();
                                        $mark = $row['marks']; ?>
                                        <td><?php echo  $mark; ?></td>

                                <?php  }
                                }
                                ?>

                            </tr>
                    <?php }
                    } ?>
                    <tr>
                    </tr>

                </tbody>

            
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>