<?php
require_once '../../apps.header.php';
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/create-bud.css" type="text/css" media="all" />
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

        <title>Budget Manager</title>
    </head>

    <body>
        <div class="wrapper">
            <div class="bud-index">
                <div class="header">
                    <h1>Budget Manager</h1>

                    <div class="account">
                        <a href="../../../uploads/<?= $user['dpic'] ?>" target="_blank">
                            <img src="../../../uploads/<?= $user['dpic'] ?>" class="dpic">
                        </a>
                        <div id="my-name"><?= $user['username'] ?></div>
                    </div>

                    <div class="account">
                        <a href="../../http/php/logout.php" class="btn" title="Logout"><i class="fa fa-door-open"
                                title="Logout"></i></a>

                        <a href="../../home.php" class="btn" title="Menu"><i class="fa fa-arrow-left"
                                title="Menu"></i></a>
                    </div>
                </div>

                <br /> <br />
                <?php
                $scan = scandir('uploads');

                $username = $user['username'];
                $valid_file = [];

                $pattern = "#$username#";

                foreach ($scan as $key) {
                    if (is_dir($key)) {
                        continue;
                    }

                    if (preg_match($pattern, $key)) {
                        $valid_file[] = $key;
                    }
                }

                if (isset($valid_file[0])) {
                    echo '<h4> Your budgets are:<h4>';
                    $i = 0;
                    foreach ($valid_file as $file) {
                        echo "<a href='view.bud.php?file=$file'>" . $budget[$i]['bud_name'] . "</a> <br>";
                        ++$i;
                    }


                    // print_r($budget);
                    echo '<h4>Click here to <a href="create.bud.php">Create a new budget</a></h4>';
                } else {
                    ?>
                    <h4>You currently don't have any Budgets</h4>
                    <h4>Click here to <a href="create.bud.php">Create a budget</a></h4>
                    <?php
                }
                ?>
            </div> <br>
            <hr>
            <small>&copy;2024 - hopster.gg</small>
        </div>
    </body>

</html>