 <?php
    session_start();
    if ($_SESSION['is_login'] != 1) {
        header('location:../user/login.php');
    }
    $name = $_SESSION['user_type'];
    ?>
 <!DOCTYPE html>
 <html lang="en">
 <!-- <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Born To Learn</title>
    <link rel="shortcut icon" href="../images//logo.PNG" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"> -->
 <?php
    include 'header.php';
    ?>
 <link rel="stylesheet" href="../css//sidebar.css">
 </head>

 <body>
     <input type="checkbox" id="check">
     <header>
         <label for="check">
             <i class="fas fa-bars" id="sidebar_btn"></i>
         </label>
         <div class="left_area">
             <h3>Born to <span>Learn</span></h3>
         </div>
         <div>
             <a href="../user/logout.php" class="logout_btn">Logout</a>
         </div>


     </header>

     <div class="sidebar">
         <a href="../General/teachers.php" title="Teachers"> <i class="fa-solid fa-person-chalkboard"></i><span>Teachers</span></a>
         <a href="../General/students.php"> <i class="fa-solid fa-users"></i><span>Students</span></a>

         <?php if ($name == 'director') {
                echo " <a href='../director/allSemesters.php'> <i class='fa-solid fa-book-open-reader'></i></i><span>Assigned Teachers</span></a>";
            } else if ($name == 'teacher') {
                echo "<a href='../General/courses.php'> <i class='fas fa-th'></i><span>Courses</span></a>";
                echo "<a href='../teachers/Attandance.php'> <i class='fa-solid fa-hand'></i><span>Attendance</span></a>";
                echo "<a href='../teachers/marks.php'> <i class='fa-solid fa-sheet-plastic'></i> <span>Mark Sheet</span></a>";
                echo "<a href='../teachers/Performance.php'> <i class='fa-solid fa-chart-column'></i><span>Performance</span></a>";
            } else if ($name == 'students') {
                echo "<a href='../General/courses.php'> <i class='fas fa-th'></i><span>Courses</span></a>";
                echo "<a href='../students/studentCoursePerformance.php'> <i class='fa-solid fa-chart-column'></i><span>Performance</span></a>";
            }
            ?>
         <a href="../General/studentEvaluation.php"><i class="fa-solid fa-users-viewfinder"></i>
             <span>Student Evaluation</span></a>
         <?php if ($name == 'admin') {
                echo "<a href='../admin/addNewStudents.php'> <i class='fa-solid fa-user-plus'></i><span>Add New Batch</span></a>";
            }
            ?>

         <a href="../General/profile.php"><i class="fa-solid fa-user"></i><span>Profile</span></a>

     </div>
     <div class="content">