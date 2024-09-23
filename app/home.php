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

            <link rel="stylesheet" href="../css/home.css">
            <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">

            <title>Web Application</title>
        </head>

        <body>
            <div class="wrapper">
                <div class="home">
                    <header>
                        <div class="menu">
                            <h1>Web Application</h1>
                            <div>
                                <a href="../uploads/<?= $user['dpic'] ?>" target="_blank">
                                    <img src="../uploads/<?= $user['dpic'] ?>" class="dpic">
                                </a>

                                <div id="a-uname"><a href="settings.php"><?= $user['username'] ?></a></div>
                            </div>
                        </div>
                        <div class="account">
                            <a href="http/php/logout.php" class="btn" title="Logout"><i class="fa fa-door-open"
                                    title="Logout"></i></a>
                        </div>
                    </header>
                    <div class="content">
                        <h3>Available Apps</h3>
                        <div class="projects">
                            <h4><a href="my-apps/budgetmanager/bud.index.php">Budget List Maker</a></h4>
                            <p>Boost your financial power with the help of a budget manager and save more&period;</p>
                        </div>
                    </div>
                </div>
                <br> <hr>
                <small>&copy;2024 - hopster.gg</small>
            </div>
        </body>

    </html>
    <?php

} else {
    // Return to the startup page
    header('Location: ../index.php');
}
?>