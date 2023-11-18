<?php
include '../assets/sidebar.php';
include '../assets/database.php';
$show="0"; 
$mark=0;
$selected_tests_names="";
$selected_tests=array();
if(isset(($_GET['semester']))){ 
  // $date=date("Y/m/d"); 
 
   $semester=$_GET['semester'];
   $assaigncourse_id=$_GET['assaigncourse_id'];
   
   
}

if(isset($_POST['submit'])){ 
  $selected_tests = $_POST['test'];
  $semester=$_POST['semester']; 
  $assaigncourse_id=$_POST['assaigncourse_id'];  
  $show=1; 
  foreach($selected_tests as $atn_key => $atn_value){
    $selected_tests_names=$selected_tests_names." ".$atn_key." ";
  }
 
  }



  if(isset($_POST['finalsubmit'])){ 
    $student=$_POST['student']; 
    $semester=$_POST['semester'];
    $assaigncourse_id=$_POST['assaigncourse_id'];   

    $mark_ofcourse =  mysqli_query($conn, " SELECT * FROM `performance` WHERE assaigncourse_id='$assaigncourse_id' AND student_id='$student_id'") or die('query failed');


    foreach( $student as $atn_key => $atn_value){

    if ($mark_ofcourse->num_rows > 0) {
        mysqli_query($conn, "UPDATE `performance`  SET mark_parform='$atn_value'  WHERE assaigncourse_id = '$assaigncourse_id' AND  student_id = '$atn_key'") or die('query failed');
        echo "<script>
        alert('Performance Mark Updated!'); 
        window.location.href='Performance.php';
        </script>";

    }else{
        mysqli_query($conn, "INSERT INTO `performance`(assaigncourse_id,student_id,mark_parform) VALUES('$assaigncourse_id', '$atn_key',$atn_value)") or die('query failed'); 
        echo "<script>
        alert('Successfully Created Performance Mark for The course');
        window.location.href='Performance.php'; 
        </script>";  
    } 
 }
  }

  function calculateMark($conn,$assaigncourse_id,$student_id,$selected_tests){
    $allmarks=array(); 
    foreach($selected_tests as $atn_key => $atn_value){
     
        $student_testmark =  mysqli_query($conn, " SELECT * FROM `course_tests` WHERE assaigncourse_id='$assaigncourse_id' AND taste_name='$atn_key' AND student_id='$student_id'") or die('query failed');
        if ($student_testmark ->num_rows > 0) {  
             $row = $student_testmark->fetch_assoc();
             $marks=$row['marks']; 
             $allmarks[]=$marks;
        }

  
     }
     sort($allmarks);  
     if(sizeof($allmarks)>1){
        $mark=($allmarks[sizeof($allmarks)-1] + $allmarks[sizeof($allmarks)-2])/2; 
     }else{
        $mark=($allmarks[sizeof($allmarks)-1]);
     }
      
     return $mark;


  }
?>

<link rel="stylesheet" href="../css//courseAttandance.css">
  <div class="team-area">
    <div class="team-container">
    <div style="padding-bottom: 25px;padding-top:80px;">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6 d-flex justify-content-around">
                     
                    <form action="../teachers/calculateMarks.php" method="post" > 
                    <?php 
                    $tests =  mysqli_query($conn, " SELECT DISTINCT  taste_name FROM `course_tests` WHERE assaigncourse_id='$assaigncourse_id'") or die('query failed'); 
                    $tests_array = array();
                        if ($tests->num_rows > 0) { ?>

                        <h5 class="">Select Tests:</h5>

                        <?php while ($row = $tests->fetch_assoc()) {
                            $test_name=$row['taste_name'] ;
                            $tests_array[]=$test_name;
                        ?> 
                        <input class="mt-2" type="radio" name="test[<?php echo $test_name; ?>]" value="tests[<?php echo $test_name; ?>]" > <?php echo $test_name; ?></input> <br>
                        <input name="semester"  value="<?php echo  $semester; ?>" style="display:none;">
                        <input name="assaigncourse_id"  value="<?php echo  $assaigncourse_id; ?>" style="display:none;">  
                     <?php }?>
                        <button class="btn btn-primary btn-sm ms-auto button_color mt-2" name="submit" type="submit" >Show</button>
                    <?php }else{?> 
                    <h1>No Test is Provided Yet</h1>
                   <?php } ?>
                     
                    
                </form>

                
            </div>
            </div>
        </div> 

        <?php if($show==1){  ?> 
    <h4 style="margin-left: 20%;">Considered Tests :<?php echo $selected_tests_names; ?></h4>
    <table style="margin-left: 50%;margin-bottom:30px;">
      <tbody> 
             <?php 
             $result = mysqli_query($conn, " SELECT * FROM `user` WHERE semester='$semester'") or die('query failed');
             if ($result->num_rows > 0) { ?>
              
                  <tr id="header" style="text-align:center;">
                  
                  <th >ID</th>
                  <th>Name</th>  
                  <th>Final Evalution Mark</th> 
                  </tr>
                <?php  while ($row = $result->fetch_assoc()) {
                         $student_id=$row['ID'];
                         $student_name=$row['Name']; 
                         $student_roll=$row['Roll']; 
                         $mark= calculateMark($conn,$assaigncourse_id,$student_id,$selected_tests); 
                 
                 ?>
                      <tr>
                <form action="../teachers/calculateMarks.php" method="post">
                      <td><?php echo $student_roll; ?></td>
                      <td><?php echo $student_name; ?></td>  
                      <td ><?php echo $mark; ?></td> 
                      <input name="assaigncourse_id"  value="<?php echo  $assaigncourse_id; ?>" style="display:none;">
                      <input name="semester"  value="<?php echo  $semester; ?>" style="display:none;"> 
                      <input name="student[<?php echo  $student_id; ?>]"  value="<?php echo  $mark; ?>" style="display:none;">  
                      </tr> 
                <?php } ?>
                <tr> 
                    <td colspan="3" style="text-align:right;">
                    <button class="btn btn-sm me-3 button_color" name="finalsubmit" type="submit" >Submit</button>
                    </td> 
                </tr> 
                </form>
                <?php } ?>  
         </tbody>
      </table>

       <?php  }else{

        }?>
       
            
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>
<script>
  $(function(){
    $("button").click(function(){
        
        console.log('hulkka');
        var allinputs = document.querySelectorAll('input');
        var myLength = allinputs.length;
        var input;

        for (var i = 0; i < myLength; ++i) {
            input = allinputs[i].value;
            console.log(input);
        }


        })


    })
</script>