<?php
session_start();
include "../assets/header.php";
?>
<link rel="stylesheet" href="login.css">
</head>

<body>
    <form action="validate.php" method="POST">
        <div class="box">
            <div class="form">
                <h2>Sign in</h2>
                <div class="inputBox">
                    <input type="email" name="email" required="required">
                    <span>email</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="password" name="password" required="required">
                    <span>Password</span>
                    <i></i>
                </div>
                <div class="links">
                    <a href="#"></a>
                </div><br />
                <div class="d-flex justify-content-around">
                    <input type="submit" class="btn btn-sm" value="Login">
                </div>
            </div>
        </div>
    </form>
</body>