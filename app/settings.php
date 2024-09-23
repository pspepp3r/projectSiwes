<?php
// Connect to the db
require_once 'db.conn.php';

session_start();

// If you followed the login rules,
if (isset($_SESSION["user_id"])) {

    // the function in this file easily gets the users in the users table
    require_once 'service/php/get.users.php';

    // Storing the result as a variable
    $user = getUser($_SESSION['user_id'], $pdo);

    // Further storing the array items into variables for queries
    $user_id = $user['user_id'];
    $user_dpic = $user['dpic'];

    // If there were no pics set, use the default picture
    if (!file_exists("../uploads/$user_dpic")) {
        $query_update_dpic = "UPDATE users SET dpic = 'defaultdp.jpg' WHERE user_id = $user_id";
        $pdo->query($query_update_dpic);
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <link rel="stylesheet" href="../css/settings.css">
            <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">

            <script src="service/js/settings.js" defer></script>

            <title>Web Application</title>
        </head>

        <body>
            <div class="wrapper">
                <div class="settings">
                    <header>
                        <div class="menu">
                            <h1>Web Application</h1>
                        </div>
                        <div class="account">
                            <a href="http/php/logout.php" class="btn" title="Logout"><i class="fa fa-door-open"
                                    title="Logout"></i></a>
                            <a href="home.php" class="btn" title="Home"><i class="fa fa-arrow-left" title="Home"></i></a>
                        </div>
                    </header>
                    <div class="content">
                        <form action="#" method="post" id="settings-form" enctype="multipart/form-data" autocomplete="off">
                            <input autocomplete="false" type="text" style="display: none;">
                            <h3>Account settings</h3>
                            <span id="err-text"></span>
                            <div class="input">
                                <input type="text" name="nuname" id="username" placeholder="Change username">
                            </div>
                            <div class="input">
                                <input type="password" name="npass" id="password" placeholder="Change password">
                            </div>
                            <div class="input">
                                <input type="file" name="ndpic" id="image">
                            </div>

                            <button id="settings-btn">Save</button>
                        </form>
                        <div class="result">
                            <img src="../uploads/<?= $user['dpic'] ?>" alt="<?= $user['username'] ?> picture" width="120px"
                                height="120px">

                            <p><?= $user['username'] ?></p>
                        </div>
                    </div>
                </div>
                <br>
                <hr>
                <small>&copy;2024 - hopster.gg</small>
            </div>
        </body>

    </html>
    <?php

} else {
    // Return to the startup page
    header('Location: ../index.php');
}
