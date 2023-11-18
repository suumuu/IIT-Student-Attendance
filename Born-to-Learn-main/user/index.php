<?php include "../assets/header.php";  ?>
<link rel="stylesheet" href="../css//landingpage.css">
<style>
    body {
        /* display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh; */
        background: url("../images//back5.jpg") no-repeat center center fixed;
        background-color: #7e8b93;
        font-family: 'poppins', sans-serif;

    }

    .text-box h1 {
        font-size: 50px;
        line-height: 60px;
        color: transparent;
        -webkit-text-stroke: 1px #fff;
        background: url('../images/back.png');
        -webkit-background-clip: text;
        background-position: 0 0;
        animation: back 30s linear infinite;
    }

    @keyframes back {
        100% {
            background-position: 2000px 0;
        }
    }
</style>
</head>

<body>
    <div class="container">
        <div>
            <div class="text-box ms-5">
                <div class="mb-4">
                    <h1>
                        Born to Learn</br> Learn to Earn
                    </h1>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="login.php" style="--clr:#1e9bff" class="me-2"><span>Sign in</span><i></i></a>
                    <!-- <a href="#" style="--clr:#6eff3e" class="ms-2"><span>Sign up</span><i></i></a> -->
                </div>
            </div>
        </div>
    </div>
</body>