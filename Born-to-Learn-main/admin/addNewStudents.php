<?php
include '../assets/sidebar.php';
include '../assets/database.php';
 
 

if(isset($_POST['submit'])){ 
    $name=$_POST['name']; 
    $roll=$_POST['roll']; 
    $email=$_POST['email']; 
    $mobile=$_POST['mobile']; 
    $semester=$_POST['semester'];
    $batch=$_POST['batch'];
    mysqli_query($conn, "INSERT INTO `user`(email,password,user_type,Roll,Mobile,Batch,semester,Name) VALUES('$email', '123456','students','$roll','$mobile','$batch','1','$name')") or die('query failed'); 
    echo "<script>
    alert('user inserted Successfully!');
    window.location.href='addNewStudents.php';
    </script>";
    
}

if(isset($_POST['update'])){ 
    mysqli_query($conn, "UPDATE `user`  SET semester=semester+1  WHERE  semester<9 AND user_type='students'") or die('query failed');
    echo "<script>
            alert('Semester Upadted Successfully!');
            window.location.href='addNewStudents.php';
            </script>";
    
}

?>


<!-- <link rel="stylesheet" href="../css//studentevaluation.css"> -->
<link rel="stylesheet" href="../css//courseAttandance.css">

<div class="team-area ps-0" style="padding-top:125px;">
    <div class="team-container mt-5">
        <div class="d-flex justify-content-around"> 
            <form action="../admin/addNewStudents.php" method="post">
            <button class="btn btn-sm button_color" type="submit" name="update">Update Running Semester</button>
            </form>
        </div> 
        <div class="d-flex justify-content-around">  
            <h3 class="mt-3">Insert a new Student</h3>
        
        </div> 
        <table class="mt-2" style="margin-left: 50%;">
            <tbody>
            <form action="../admin/addNewStudents.php" method="post">
              
                <tr id="header" style="text-align:center;">
                    <th>Name</th>
                    <th>Roll</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <!-- <th>Semester</th> -->
                    <th>Batch</th>
                </tr> 
                    <tr>
                        <td>
                            <input class="me-1" type="text" name='name'>
                        </td>
                        </td>
                        <td>
                            <input class="me-1" type="text" name='roll'>
                        </td>
                        </td>
                        <td>
                            <input class="me-1" type="email" name='email'>
                        </td>
                        </td>
                        <td>
                            <input class="me-1" type="number" name='mobile'>
                        </td>
                        <!-- <td>
                            <input class="me-1" type="text" name='semester'>
                        </td> -->
                        <td>
                            <input class="me-1" type="text" name='batch'>
                        </td>
                        </td>
                    </tr> 
                <tr>
                    <td colspan="6">
                         
                            <div class="d-flex justify-content-end">
                                <button type="submit" name="submit" class="btn button_color btn-sm ms-3">Submit</button>
                            </div>
                        </form>
                    </td>

            </tbody>
        </table> 
</div>
</div>
</body>

</html>