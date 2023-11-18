<?php
include '../assets/sidebar.php';
include '../assets/database.php';
$user_id =  $_SESSION['user_id']; 
$user_name = $_SESSION['user_name']; 
$user_mobile = $_SESSION['user_mobile']; 
$user_email = $_SESSION['user_email']; 
if(isset($_POST['submit'])){
    $checkpass=$_POST['password'];
	$password = mysqli_real_escape_string($conn, md5($_POST['password']));
	$password_confirm= mysqli_real_escape_string($conn, md5($_POST['password_confirm'])); 

	if ($password==$password_confirm) { 
		
	$number = preg_match('@[0-9]@', $checkpass);
	// $uppercase = preg_match('@[A-Z]@', $checkpass);
	// $lowercase = preg_match('@[a-z]@', $checkpass);
	// $specialChars = preg_match('@[^\w]@', $checkpass);
		
		//  if(strlen($checkpass) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars){ 
		// 	$message[] = "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
	
		// }
        if(strlen($checkpass) < 8 ){ 
            echo "<script>
            alert('Password must be at least 8 characters');
            window.location.href='profile.php';
            </script>";
		}
        else{
		mysqli_query($conn, "UPDATE `user` SET password='$password_confirm' WHERE ID='$user_id'") or die('query failed');
		echo
    "
    <script>
    document.location.href = '../user/logout.php';
    </script>
    ";
		}

   }else{ 
    echo "<script>
    alert('New and Confirm Password do not match Check again');
    window.location.href='profile.php';
    </script>";
   }
 }
?>

<link rel="stylesheet" href="../css//students.css">
<style>
    body{
        overflow-x:hidden;
    }
</style>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="staticBackdropLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <form action="../General/profile.php" method="post">
                    <div class="mb-3">
                        <label class="mb-2 text-muted" for="password">New Password</label>
                        <input id="old-password" type="password" class="form-control" name="password" value="" required>
                        
                    </div>

                    <div class="mb-3">
                        <label class="mb-2 text-muted" for="password-confirm">Confirm New Password</label>
                        <input id="new-password" type="password" class="form-control" name="password_confirm" required>
                        
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                <button onclick="changePassword()" name="submit" type="submit" class="btn btn-sm" style="background-color: #293462; color:white;">
                    Reset Password
                </button>
                </form>
            </div>
        </div>
    </div>
</div>

    <div class="team-area">
        <div class="team-container">
        <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 d-flex flex-row">
                    <div class="card card-body mb-1">
                        <div class="row">
                            <div class="d-flex flex-column align-items-center text-center mt-2 mb-2">
                                <div class="mt-3">
                                    <h4>My Profile</h4>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6>Name</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                            <h6><?php echo $user_name ?></h6>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6>Mobile</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                <h6><?php echo $user_mobile ?></h6>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6>Email</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                <h6><?php echo $user_email ?></h6>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6>Password</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                <button class="btn btn-sm text-primary ps-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><b>Change Password</b>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
        </div>
     
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>
