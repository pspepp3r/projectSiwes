<?php
session_start();
if (isset($_SESSION["user_id"])) {
    header('Location: app/home.php');
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="css/index.css">
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

        <script src="app/http/js/http.js" defer></script>
        <script src="app/http/js/behaviour.js" defer></script>

        <title>Web Application</title>
    </head>

    <body>
        <div class="wrapper">
            <div id="index">
                <div class="text">
                    <h1>Web Application</h1>
                    <h3 id="h-text">Please login to use app</h3>
                    <br>
                    <div class="ext-links">
                        <a href="about.html">About us</a> <br> <br>
                        <a href="p_p.html">Privacy Policy</a> <br> <br>
                        <a href="fp.php">Forgot Password&quest;</a>
                    </div>

                </div>
                <div class="form-menu">
                    <div>
                        <ul class="form-buttons">
                            <li class="selected form-button b-log">Login</li>
                            <li class="form-button b-sign">Signup</li>
                        </ul>
                    </div>
                    <div class="form-list">
                        <div class="form login">
                            <h3>Login to account</h3>
                            <span class="err"></span>
                            <form action="#" method="post" id="login">
                                <div class="input">
                                    <input type="text" name="uname" id="uname" class="k-down" placeholder="Username">
                                </div>
                                <div class="input">
                                    <input type="password" name="pass" id="pass" class="k-ent" placeholder="Password">
                                </div>

                                <button type="submit" id="login-btn">Login</button>
                            </form>
                        </div>
                        <div class="form signup">
                            <h3>Create an account</h3>
                            <span class="nerr"></span>
                            <form action="#" method="post" id="signup" enctype="multipart/form-data" autocomplete="off">
                                <input autocomplete="false" type="text" style="display: none;">
                                <div class="input">
                                    <input type="email" name="nemail" id="nemail" class="k-down" placeholder="Email">
                                </div>
                                <div class="input">
                                    <input type="text" name="nuname" id="nuname" class="k-down" placeholder="Username">
                                </div>
                                <div class="input">
                                    <input type="password" name="npass" id="npass" class="k-ent" placeholder="Password">
                                </div>
                                <div class="input">
                                    <input type="file" name="ndpic" id="ndpic" value="(Not compulsory)">
                                </div>
                                <button type="submit" id="signup-btn">Signup</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br> <hr>
            <small>&copy;2024 - hopster.gg</small>
        </div>
    </body>

</html>