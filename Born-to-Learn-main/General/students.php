 
<?php
include '../assets/sidebar.php';
$name = $_SESSION['user_type'];
?>

<link rel="stylesheet" href="../css//students.css">

<div class="team-area ps-0">
    <div class="team-container">
        <div class="batch d-flex justify-content-evenly">
            <div class="cards">
                <div class="lines"></div>
                <div class="imgBX">
                    <img src="../images/1.png" alt="">
                </div>
                <div class="contents">
                    <div class="details">
                        <h2>1<sup>st</sup> Year</h2>
                        <div class="data">
                            <h3>32<br><span>Students</span></h3>
                            <h3>Session<br><span>2020-2021</span></h3>
                        </div>
                        <div class="actionBtn">
                            <button class="btn btn-sm mb-2" onclick="window.location.href='batchStudent.php?year=1 && semester1=1 && semester2=2'">View Students</button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="cards">
                <div class="lines"></div>
                <div class="imgBX">
                    <img src="../images/2.jpg" alt="">
                </div>
                <div class="contents">
                    <div class="details">
                        <h2>2<sup>nd</sup> Year</h2>
                        <div class="data">
                            <h3>36<br><span>Students</span></h3>
                            <h3>Session<br><span>2019-2020</span></h3>
                        </div>
                        <div class="actionBtn">
                            <button class="btn btn-sm mb-2" onclick="window.location.href='batchStudent.php?year=2 && semester1=3 && semester2=4'">View Students</button>

                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div class="batch d-flex justify-content-evenly mb-5" style="margin-top: 120px;">
            <div class="cards">
                <div class="lines"></div>
                <div class="imgBX">
                    <img src="../images/3.jfif" alt="">
                </div>
                <div class="contents">
                    <div class="details">
                        <h2>3<sup>rd</sup> Year</h2>
                        <div class="data">
                            <h3>31<br><span>Students</span></h3>
                            <h3>Session<br><span>2018-2019</span></h3>
                        </div>
                        <div class="actionBtn">
                            <button class="btn btn-sm mb-2" onclick="window.location.href='batchStudent.php?year=3 && semester1=5 && semester2=6'">View Students</button>
                            <!-- <button>Message</button> -->
                        </div>
                    </div>
                </div>

            </div>
            <div class="cards">
                <div class="lines"></div>
                <div class="imgBX">
                    <img src="../images/4.jfif" alt="">
                </div>
                <div class="contents">
                    <div class="details">
                        <h2>4<sup>th</sup> Year</h2>
                        <div class="data">
                            <h3>27<br><span>Students</span></h3>
                            <h3>Session<br><span>2017-2018</span></h3>
                        </div>
                        <div class="actionBtn">
                            <button class="btn btn-sm mb-2" onclick="window.location.href='batchStudent.php?year=4 && semester1=7 && semester2=8'">View Students</button>

                        </div>
                    </div>
                </div>

            </div>

        </div>


    </div>
</div>
</div>
</body>

</html>