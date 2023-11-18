<?php
include '../assets/sidebar.php';
$name = $_SESSION['user_type'];
?>

<link rel="stylesheet" href="../css//studentevaluation.css">

<div class="team-area ps-0" style="padding-top:165px;">
    <div class="team-container">

        <div class="row">
            <?php
            // $course = mysqli_query($conn, " SELECT * FROM `user` WHERE course_id='$acourse_id'") or die('query failed');
            $i = 1;
            while ($i <= 4) { ?>

                <div class="col-6 mb-4">
                    <div class="batch d-flex justify-content-evenly">
                        <div class="cards">
                            <div class="lines"></div>

                            <div class="contents">
                                <div class="details" style="margin:auto;">
                                    <h2>Year <?php echo $i ?></h2>

                                    <div class="actionBtn ">
                                        <a href="../students/MainPerformance.php?year=<?php echo $i ?>&& semester1=<?php echo ($i * 2) - 1 ?> && semester2=<?php echo $i * 2 ?>" class="btn btn-sm button_color">Performance</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            <?php $i++;
            } ?>

        </div>



    </div>
</div>
</div>
</body>

</html>