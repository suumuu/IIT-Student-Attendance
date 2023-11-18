<?php
include '../assets/database.php';
include '../assets/sidebar.php';
if (isset(($_GET['action']))) {
    $semester = $_GET['action'];
}
?>
<style>
    body {
        overflow-y: hidden;
    }
</style>

<link rel="stylesheet" href="../css//Semesters.css">
<div class="semesters-area " id="semester_id" style="padding-top: 340px;">
    <div class="semesters-container mt-4">
        <table>
            <tbody>
                <?php
                $result = mysqli_query($conn, " SELECT * FROM `courses` WHERE course_semester='$semester'  ") or die('query failed');
                if ($result->num_rows > 0) { ?>
                    <tr id="semester">
                        <th colspan="3" style="text-align:center;">Semester <?php echo $semester; ?> </th>
                    </tr>
                    <tr id="header" style="text-align:center;">
                        <th>Course Code</th>
                        <th>Course Title</th>
                        <th>Course Credit</th>
                    </tr>
                    <?php while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['course_code'] . '</td>';
                        echo '<td>' . $row['course_title'] . '</td>';
                        echo '<td>' . $row['credit'] . '</td>';
                        echo '</tr> ';
                    }
                } else {
                    ?>
                    <tr>
                        <td>
                        <h1>Internship</h1>
                        </td>
                    </tr>
                    <!-- <div class="me-5">
                        <h1>Internship</h1>
                    </div> -->
                <?php    }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</body>

</html>