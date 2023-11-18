<?php
include '../assets/sidebar.php';
include '../assets/database.php';
if (isset(($_GET['semester']))) {
  // $date=date("Y/m/d"); 

  $semester = $_GET['semester'];
  $assaigncourse_id = $_GET['assaigncourse_id'];
}
?>

<link rel="stylesheet" href="../css//Attendance.css">
<div class="team-area ps-0">
  <div class="team-container">
  <?php 
  $dates =  mysqli_query($conn, " SELECT DISTINCT date FROM `attendance_sheet` WHERE assaigncourse_id='$assaigncourse_id'") or die('query failed');
      // if($dates->num_rows > 0){
        
  ?>
    <div style="padding-bottom: 25px;padding-top:80px;">
      <div class="row">
        <div class="col-2"></div>
        <div class="col-3">
          <a class="btn btn-sm ms-5 button_color" href="Attandance.php">Back</a>
        </div>
        <div class="col-2"></div>

      </div>
    </div>
    <table style="margin-left: 50%; margin-bottom:50px;">
      <tbody>
      
        <tr id="header" style="text-align:center;">
          <th>ID</th>
          <th>Name</th>
          <?php
          // $dates =  mysqli_query($conn, " SELECT DISTINCT date FROM `attendance_sheet` WHERE assaigncourse_id='$assaigncourse_id'") or die('query failed');

          if ($dates->num_rows > 0) {
            $dates_array = array();
            while ($row = $dates->fetch_assoc()) {
              $date = $row['date'];
              $dates_array[] = $date;
          ?>
              <th><?php echo  $date; ?></th>
          <?php }
          } ?>
        </tr>
        <?php
        $student =  mysqli_query($conn, " SELECT * FROM `user` WHERE semester='$semester'") or die('query failed');

        if ($student->num_rows > 0) {
          while ($row = $student->fetch_assoc()) {
            $student_id = $row['ID'];
            $student_name = $row['Name'];
            $student_roll = $row['Roll'];

        ?> <tr>
              <td><?php echo  $student_roll; ?></td>
              <td><?php echo  $student_name; ?></td>
              <?php

if($dates->num_rows > 0){
              foreach ($dates_array as $date_attend) {
                $attendance = mysqli_query($conn, " SELECT *  FROM `attendance_sheet` WHERE assaigncourse_id='$assaigncourse_id' AND student_id='$student_id' AND date='$date_attend'") or die('query failed');
                if ($attendance->num_rows > 0) {
                  $row = $attendance->fetch_assoc();
                  $attandace_value = $row['present']; ?>
                  <td><?php echo  $attandace_value; ?></td>

              <?php  }
              }
              ?>

            </tr>
        <?php    
        }  }
        ?>
      </tbody>
    </table>
    <?php } ?>
  </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>
<script>
  $(function() {
    $("#thenumbers li").click(function() {
      var value = $(this).attr("value");
      $("input[name='thenumbers']").val(value);

      window.location.href = "addmarks.php?action=13"
    });
  });
</script>