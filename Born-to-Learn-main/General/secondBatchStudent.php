<?php
include '../assets/sidebar.php';
include '../assets/database.php';
?>

<link rel="stylesheet" href="../css//batchSemester.css">

<div class="team-area">
    <div class="team-container">
        <section class="team">
            <div class="container">
                <div class="section-title">
                    <h4>2<sup>nd</sup> Batch</h4>
                    <div class="underline"></div>
                </div>
                <?php
                $sql = "select * FROM firstbatch";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    ?>
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
                                        <h4><?php echo $row['Name'];?></h4>
                                        <span><?php echo $row['Roll'];?></span>
                                        <p>Phone: <?php echo $row['mobile'];?><br><?php echo $row['email'];?></p>
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