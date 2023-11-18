<?php
include '../assets/sidebar.php';
include '../assets/database.php';
if(isset(($_GET['semester']))){ 
 
   $semester=$_GET['semester'];
   $assaigncourse_id=$_GET['assaigncourse_id'];
   $test_type=$_GET['test_type']; 
   $tests =  mysqli_query($conn, " SELECT DISTINCT  taste_name FROM `course_tests` WHERE assaigncourse_id='$assaigncourse_id' AND taste_name  LIKE '%$test_type%'") or die('query failed');
   if($tests->num_rows > 0){
    $test_no=$tests->num_rows+1; 
    
   }else{
    $test_no=1;
   }

}

if(isset($_POST['submit'])){ 
  $test = $_POST['test'];
  $semester=$_POST['semester']; 
  $assaigncourse_id=$_POST['assaigncourse_id'];
  $test_name=$_POST['test_name']; 

  $tests =  mysqli_query($conn, " SELECT * FROM `course_tests` WHERE assaigncourse_id='$assaigncourse_id' AND taste_name='$test_name'") or die('query failed');

   foreach($test as $atn_key => $atn_value){
     
      if ($tests->num_rows > 0) {   
          mysqli_query($conn, "UPDATE `course_tests`  SET marks='$atn_value'  WHERE assaigncourse_id = '$assaigncourse_id' AND taste_name='$test_name' AND student_id = '$atn_key'") or die('query failed');
          echo "<script>
          alert('Mark Updated!'); 
          window.location.href='showMarks.php?semester=$semester && assaigncourse_id=$assaigncourse_id';
          </script>";

      } else{
          mysqli_query($conn, "INSERT INTO `course_tests`(assaigncourse_id,taste_name,student_id,marks) VALUES('$assaigncourse_id', '$test_name','$atn_key','$atn_value')") or die('query failed'); 
          echo "<script>
          alert('Successfully Created Mark of $test_name ');
          window.location.href='showMarks.php?semester=$semester && assaigncourse_id=$assaigncourse_id'; 
          </script>"; 
      }  

   }
  }
?>

<link rel="stylesheet" href="../css//courseAttandance.css">
  <div class="team-area">
    <div class="team-container">
    <div style="padding-bottom: 25px;padding-top:80px;">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-6">
                    <h3 class="mb-0">Mark Sheet For: <?php echo  $test_type." - ".$test_no; ?></h3>
                </div>
            </div>
        </div>

      <table style="margin-left: 50%;margin-bottom: 30px;">
      <tbody>
      <form action="../teachers/addmarks.php" method="post">
             <?php 
             $result = mysqli_query($conn, " SELECT * FROM `user` WHERE semester='$semester'") or die('query failed');
             if ($result->num_rows > 0) { ?>
              
                  <tr id="header" style="text-align:center;">
                  
                  <th>ID</th>
                  <th>Name</th>  
                  <th>Mark</th> 
                  </tr>
                <?php  while ($row = $result->fetch_assoc()) {
                         $student_id=$row['ID'];
                         $student_name=$row['Name']; 
                         $student_roll=$row['Roll'];  
                 
                 ?>
                      <tr>
                      <td><?php echo $student_roll; ?></td>
                      <td><?php echo $student_name; ?></td>  
                      <td ><div>
                      <input class="me-1" type="number" name='test[<?php echo $student_id; ?>]'required></td>
                      <input name="semester"  value="<?php echo  $semester; ?>" style="display:none;">
                      <input name="assaigncourse_id"  value="<?php echo  $assaigncourse_id; ?>" style="display:none;"> 
                      <input name="test_name"  value="<?php echo  $test_type."_".$test_no; ?>" style="display:none;">

                      </tr> 
                <?php }  } ?> 
                <tr>   
                <td colspan="4" style="text-align:right;"><button class="btn btn-primary btn-sm button_color me-5" name="submit" type="submit">Submit</button> 
               </td>       
                </tr>
          </form>   
         </tbody>
            
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