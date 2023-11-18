<?php 
include '../assets/sidebar.php';
include '../assets/database.php';
if(isset(($_GET['semester']))){ 
   // $date=date("Y/m/d"); 
  
    $semester=$_GET['semester'];
    $assaigncourse_id=$_GET['assaigncourse_id']; 
    if(isset(($_GET['show']))){  
        $date=$_GET['date']; 
        $table_type="show"; 
    }else{
        $table_type="create";
    }


}

if(isset($_POST['show'])){ 
 
 $semester=$_POST['semester']; 
 $assaigncourse_id=$_POST['assaigncourse_id'];
 $date=$_POST['date']; 
 $attendanceSheet = mysqli_query($conn, " SELECT * FROM `attendance_sheet` WHERE assaigncourse_id='$assaigncourse_id' AND date='$date'") or die('query failed');
  if ($attendanceSheet->num_rows > 0) { 
    $table_type="show";
 }else{
    echo "<script>
    alert('Not Yet Created any Attandance on this Date');
    window.location.href='Attandance.php';
    </script>";
 }
 

}  

if(isset($_POST['submit'])){ 
    $attend = $_POST['attend'];
    $semester=$_POST['semester']; 
    $assaigncourse_id=$_POST['assaigncourse_id'];
    $date=$_POST['date'];
    echo $date;

    $attendanceSheet = mysqli_query($conn, " SELECT * FROM `attendance_sheet` WHERE assaigncourse_id='$assaigncourse_id' AND date='$date'") or die('query failed'); 

     foreach($attend as $atn_key => $atn_value){
       
        if ($attendanceSheet->num_rows > 0) {   
            mysqli_query($conn, "UPDATE `attendance_sheet`  SET present='$atn_value'  WHERE assaigncourse_id = '$assaigncourse_id' AND date='$date' AND student_id = '$atn_key'") or die('query failed');
            echo "<script>
            alert('Successfully updated the attendance on this date!');
            window.location.href='courseAttandance.php?show=1 && semester=$semester && assaigncourse_id=$assaigncourse_id && date=$date';
            </script>";

        } else{
            mysqli_query($conn, "INSERT INTO `attendance_sheet`(assaigncourse_id,date,student_id,present) VALUES('$assaigncourse_id', '$date','$atn_key','$atn_value')") or die('query failed'); 
            echo "<script>
            alert('Successfully Created attendance on this day!');
            window.location.href='courseAttandance.php?show=1 && semester=$semester && assaigncourse_id=$assaigncourse_id && date=$date';
            </script>"; 
        }  
 
     }

}
?>

<link rel="stylesheet" href="../css//courseAttandance.css">


 
        <div style="padding-bottom: 25px;padding-top:80px;">
            <div class="row"> 
                <div class="col-2"></div>
                <div class="col-10 d-flex">
                <form action="../teachers/courseAttandance.php" method="post"> 
                        <button class="btn btn-sm me-5 button_color" name="show" type="submit">Show Previous</button>    
                        <input type="date" name="date" id="" required>
                        <input name="semester"  value="<?php echo  $semester; ?>" style="display:none;">
                        <input name="assaigncourse_id"  value="<?php echo  $assaigncourse_id; ?>" style="display:none;">
                    </form>
                </div>
            </div>
        </div>

<div style="padding-bottom: 45px;">

<?php if($table_type=="create"){?>
    <form action="../teachers/courseAttandance.php" method="post">
        <table style="margin-left: 50%;">
         
            <tbody>
                <?php 
                $result = mysqli_query($conn, " SELECT * FROM `user` WHERE semester='$semester'") or die('query failed');
                if ($result->num_rows > 0) { ?>
                <tr>
                <td colspan="3"  class="text-end py-1"> 
                    <label for="date" class="col-2 col-form-label me-1" style="font-size:15px;">Select Date </label>
                    <input type="date" name="date" id="" required> 
                 </td> 
                </tr>
                     <tr id="header" style="text-align:center;">
                     <th>ID</th>
                     <th>Name</th>
                     <th>Attendance</th>
                     </tr>
                   <?php  while ($row = $result->fetch_assoc()) {
                            $student_id=$row['ID'];
                            $student_name=$row['Name']; 
                            $student_roll=$row['Roll'];
                    
                    ?>
                         <tr>
                         <td><?php echo $student_roll; ?></td>
                         <td><?php echo $student_name; ?></td>
                         
                         <td><div>
                          
                         <input class="me-1" type="radio" name='attend[<?php echo $student_id; ?>]' value="1" required>Present
                         <input class="me-1" type="radio" name='attend[<?php echo $student_id; ?>]' value="0" required > Absent </div>
                         <input name="semester"  value="<?php echo  $semester; ?>" style="display:none;">
                         <input name="assaigncourse_id"  value="<?php echo  $assaigncourse_id; ?>" style="display:none;">  
                         </td>
                         </tr> 
                   <?php }  } ?>
                <tr>   
                <td   colspan="3" class="text-end px-5"><button class="btn btn-sm button_color" name="submit" type="submit">Submit</button>
                </form> </td>       
                </tr>
                 
            </tbody> 

        </table>
        <?php } else if($table_type=="show"){?>
            <table style="margin-left: 50%;">
         
            <tbody>
                <?php 
                $result = mysqli_query($conn, " SELECT * FROM `user` WHERE semester='$semester'") or die('query failed');
                if ($result->num_rows > 0) { ?>
                <tr>
                <td colspan="1" style="text-align:left;">  
               <h4 class="mb-0" style="font-size:15px;"> Date:  <?php echo $date; ?></h4> 
               
                 </td>
                 
                </tr>
                     <tr id="header" style="text-align:center;">
                     <th >ID</th>
                     <th>Name</th> 
                     <th>Attendance</th>
                     </tr>
                   <?php  while ($row = $result->fetch_assoc()) {
                            $student_id=$row['ID'];
                            $student_name=$row['Name']; 
                            $student_roll=$row['Roll']; 
                            $attendanceSheet = mysqli_query($conn, " SELECT * FROM `attendance_sheet` WHERE assaigncourse_id='$assaigncourse_id' AND date='$date' AND student_id='$student_id'") or die('query failed');
                            if ($attendanceSheet->num_rows > 0) { 
                                $row =$attendanceSheet->fetch_assoc();
                                $present=$row['present'];

                            }
                    
                    ?>
                         <tr>
                         <td><?php echo $student_roll; ?></td>
                         <td><?php echo $student_name; ?></td> 
                         <td> 
                         <?php if($present==0){echo "Absent";}else{echo "Present";} ?>
                         </td>
                         </tr> 
                   <?php }  } ?>
                <tr>   
                <td   colspan="3" style="text-align:right;">
                 <a href="courseAttandance.php?semester=<?php echo $semester;?> && assaigncourse_id=<?php echo $assaigncourse_id;?> " class="card-link btn btn-sm text-white me-3 button_color">Take Attendance</a>
                 </td>       
                </tr>
            </tbody> 

        </table>
            <?php }?>
    </div>
  
</div>
</div>





<script>
        $(function(){
            // document.write(5);
  $('#datepicker').datepicker();
});
    </script>
