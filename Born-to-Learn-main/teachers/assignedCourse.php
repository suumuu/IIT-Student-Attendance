<?php
include '../assets/sidebar.php';
include '../assets/database.php';
$year = date('Y');
session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name']; 
$user_type = $_SESSION['user_type'];
?>

<link rel="stylesheet" href="../css//students.css">
<style>
    body{
        overflow-x:hidden;
    }
</style>


    <div class="team-area">
        <div class="team-container">
            <div class="row mt-5">
                <div class="d-flex">
                <div class="col-2"></div>
                <div class="col-4 d-flex justify-content-around">
                    <div class="card bg-light mb-5" style="width: 18rem;">
                        <div class="card-body" style="text-align:center;">
                            <h5 class="card-title">CSE 3205</h5>
                            <h6 class="card-subtitle mb-2 text-muted ">Artifical Intelligence</h6>
                            <a href="#" class="card-link btn btn-primary btn-sm text-white mt-2">See Contents</a>
                        </div>
                    </div>
                </div>
                <div class="col-4 d-flex justify-content-around">
                    <div class="card bg-light mb-5" style="width: 18rem;">
                        <div class="card-body" style="text-align:center;">
                            <h5 class="card-title">CSE 3205</h5>
                            <h6 class="card-subtitle mb-2 text-muted ">Artifical Intelligence</h6>
                            <a href="#" class="card-link btn btn-primary btn-sm text-white mt-2">See Contents</a>
                        </div>
                    </div>
                </div>
                <div class="col-1"></div>
                </div>
                
            </div>



<!-- another row  -->
<div class="row mt-2">
                <div class="d-flex">
                <div class="col-2"></div>
                <div class="col-4 d-flex justify-content-around">
                    <div class="card bg-light mb-5" style="width: 18rem;">
                        <div class="card-body" style="text-align:center;">
                            <h5 class="card-title">CSE 3205</h5>
                            <h6 class="card-subtitle mb-2 text-muted ">Artifical Intelligence</h6>
                            <a href="#" class="card-link btn btn-primary btn-sm text-white mt-2">See Contents</a>
                        </div>
                    </div>
                </div>
                <div class="col-4 d-flex justify-content-around">
                    <div class="card bg-light mb-5" style="width: 18rem;">
                        <div class="card-body" style="text-align:center;">
                            <h5 class="card-title">CSE 3205</h5>
                            <h6 class="card-subtitle mb-2 text-muted ">Artifical Intelligence</h6>
                            <a href="#" class="card-link btn btn-primary btn-sm text-white mt-2">See Contents</a>
                        </div>
                    </div>
                </div>
                <div class="col-1"></div>
                </div>
                
            </div>


        </div>
     </div>
</div>
</div>
</body>

</html>