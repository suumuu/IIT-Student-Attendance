<?php
include '../assets/sidebar.php';
include '../assets/database.php';
$year = date('Y');
if (isset(($_GET['semester']))) {
    $semester = $_GET['semester'];
}
if (isset(($_GET['teacher_id']))) {
    $teacher_id = $_GET['teacher_id'];
    $course_id = $_GET['course_id'];
    $semester = $_GET['semester'];

    $assaignedCourse = mysqli_query($conn, " SELECT * FROM `assaigncourse` WHERE year='$year' AND course_id='$course_id'") or die('query failed');
    if ($assaignedCourse->num_rows > 0) {
        $assaignedTeacher = mysqli_query($conn, " SELECT * FROM `assaigncourse` WHERE year='$year' AND teacher_id='$teacher_id' AND semester='$semester'") or die('query failed');
        if ($assaignedTeacher->num_rows > 0) {
            echo '<script>alert("The Teacher is already Assigned in a Course in this semester in this year")</script>';
        } else {
            mysqli_query($conn, "UPDATE `assaigncourse` SET teacher_id = '$teacher_id' WHERE course_id= '$course_id'") or die('query failed');
        }
    } else {
        $assaignedTeacher = mysqli_query($conn, " SELECT * FROM `assaigncourse` WHERE year='$year' AND teacher_id='$teacher_id' AND semester='$semester'") or die('query failed');
        if ($assaignedTeacher->num_rows > 0) {
            echo '<script>alert("The Teacher is already Assigned in a Course in this semester in this Year")</script>';
        } else {
            mysqli_query($conn, "INSERT INTO `assaigncourse`(course_id,teacher_id,year,semester) VALUES('$course_id', '$teacher_id','$year','$semester')") or die('query failed');
        }
    }
}
?>
<style>
    a {
        text-decoration: none;
        color: black;
    }
</style>
<link rel="stylesheet" href="../css//Semesters.css">
<div class="semesters-area" id="semester_id" style="padding-top:430px;">
    <div class="semesters-container">
        <table>
            <tbody>
                <?php
                $result = mysqli_query($conn, " SELECT * FROM `courses` WHERE course_semester='$semester'") or die('query failed');
                if ($result->num_rows > 0) { ?>
                    <tr id="semester">
                        <th colspan="5" style="text-align:center;">Semester <?php echo $semester ?></th>
                    </tr>
                    <tr id="header" style="text-align:center;">
                        <th>Course Code</th>
                        <th>Course Title</th>
                        <th>Course Credit</th>
                        <th>Assign Teacher</th>
                        <th></th>
                    </tr>
                    <?php while ($row = $result->fetch_assoc()) {
                        $course_id = $row['course_id'];
                        $course_code = $row['course_code'];
                        $course_title = $row['course_title'];
                        $credit = $row['credit'];
                    ?>
                        <tr>
                            <td><?php echo $course_code; ?></td>
                            <td><?php echo $course_title; ?></td>
                            <td><?php echo $credit; ?></td>
                            <td>
                                <div class="dropdown d-flex justify-content-center">
                                    <?php
                                    $sql = "select * FROM user WHERE user_type='teacher'";
                                    $teacher = $conn->query($sql);
                                    if ($teacher->num_rows > 0) { ?>
                                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" name="addMarks">Teacher</button>
                                        <ul class="dropdown-menu" id="thenumbers" name="thenumbers" aria-labelledby="dropdownMenuButton1">
                                            <?php while ($row = $teacher->fetch_assoc()) {
                                                $teacher_id = $row['ID'];
                                                $teacher_name = $row['Name'];
                                            ?>
                                                <li class="dropdown-item" style="cursor:pointer"><a href="assignedTeacher.php?  teacher_id=<?php echo $teacher_id; ?> && course_id=<?php echo $course_id; ?> && semester= <?php echo $semester; ?> "><?php echo $teacher_name; ?><a></li>
                                            <?php  } ?>
                                        </ul>
                                    <?php } ?>
                                </div>
                            </td>
                            <td>
                                <?php
                                $assaignedTeacher = mysqli_query($conn, " SELECT * FROM `assaigncourse` WHERE year='$year' AND course_id='$course_id'") or die('query failed');
                                if ($assaignedTeacher->num_rows > 0) {
                                    while ($row = $assaignedTeacher->fetch_assoc()) {
                                        $ateacher_id = $row['teacher_id'];
                                        $atracher = mysqli_query($conn, " SELECT * FROM `user` WHERE ID='$ateacher_id'") or die('query failed');
                                        if ($atracher->num_rows > 0) {
                                            $row =  $atracher->fetch_assoc();
                                            $ateacher_name = $row['Name'];
                                        }
                                    }
                                } else {
                                    $ateacher_name = "Not Assigned";
                                } ?>

                                <?php echo $ateacher_name; ?>
                            </td>
                        </tr>
                <?php  }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>
</body>

</html>