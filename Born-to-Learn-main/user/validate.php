<?php
session_start();
include "../assets/database.php";

$email = mysqli_real_escape_string($conn, $_POST['email']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);

function checkPass($conn,$email,$finalpass){
    $select_users = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email' AND password = '$finalpass'");
 
if (mysqli_num_rows($select_users) > 0) {
 
    $row = mysqli_fetch_assoc($select_users);
    $_SESSION['user_name'] = $row['Name'];
    $_SESSION['user_email'] = $row['email'];
    $_SESSION['user_id'] = $row['ID'];
    $_SESSION['user_mobile'] = $row['Mobile'];
    $_SESSION['user_type'] = $row['user_type'];
    $_SESSION['is_login']=1;
    $_SESSION['semester']=$row['semester'];
    
    header("Location:../General/teachers.php");
 
        // echo "window.location.href('../General/students.php')";
    
}
else{
    echo "<script>
            alert('Gmail or Password is incorrect');
            window.location.href='login.php';
            </script>";
    // echo "<script>alert('Gmail or Password is incorrect')</script>";
    // header("Location:../user/login.php");
}

}
if($pass=="123456"){
    $finalpass=$pass;
    checkPass($conn,$email,$finalpass);
        
}else{
    $finalpass= mysqli_real_escape_string($conn, md5($_POST['password']));
    checkPass($conn,$email,$finalpass);
}

 
