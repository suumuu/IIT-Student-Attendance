<?php
include '../assets/sidebar.php';
include '../assets/database.php';
if (isset(($_GET['year']))) {
    $year = $_GET['year'];
    $semester1 = $_GET['semester1'];
    $semester2 = $_GET['semester2'];
}
?>

<link rel="stylesheet" href="../css//batchSemester.css">

<div class="team-area">
    <div class="team-container">
        <section class="team">
            <div class="container">
                <div class="section-title">
                    <h4>Year: <?php echo $year; ?></h4>
                    <div class="underline"></div>
                </div>
                <?php
                $result = mysqli_query($conn, " SELECT * FROM `user` WHERE semester='$semester1' OR semester='$semester2'") or die('query failed');
                if ($result->num_rows > 0) { ?>

                    <div class="row">
                        <?php
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <div class="col-lg-6 mt-4">
                                <div class="member d-flex align-items-start">
                                    <div class="teampic">
                                        <img src="../images/s2.jpg" alt="">
                                    </div>
                                    <div class="member-info">
                                        <h4><?php echo $row['Name']; ?></h4>
                                        <span><?php echo $row['Roll']; ?></span>
                                        <p>Phone: <?php echo $row['Mobile']; ?><br><?php echo $row['email']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                }
                ?>
            </div>
        </section>

    </div>
</div>
</div>
</body>

</html>