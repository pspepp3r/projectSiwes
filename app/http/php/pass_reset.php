<?php
require_once '../../db.conn.php';

if (isset($_POST['femail'])) {
  session_start();

  $email = $_POST['femail'];
  $_SESSION['email'] = $email;

  $get_password_query = 'SELECT email FROM users WHERE email = ?';
  $get_password_result = $pdo->prepare($get_password_query);
  $get_password_result->execute([$email]);

  $password = $get_password_result->fetch(PDO::FETCH_ASSOC);

  ?>
  <!DOCTYPE html>
  <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <link rel="stylesheet" href="../../../css/index.css">
      <link rel="shortcut icon" href="../../../img/favicon.ico" type="image/x-icon">

      <title>Web Application</title>
    </head>

    <body>
      <div class="wrapper">
        <?php
        if ($password == []) { ?>
          <div>
            <p>This email isn't registered</p>
            <a href="../../../index.php" class="btn" style="font-size: .8em">Back</a> <br> <br>
          </div>
          <?php
        } else {
          ?>
          <h2>Type in a new password:</h2>
          <form action="reset.php" method="post" id="forgot">
            <input type="password" name="pword" id="pword"><br>
            <button type="submit" id="click">Reset</button>
            <a href="../../../index.php" class="btn" style="font-size: .8em">Back</a> <br> <br>
          </form>

          <div class="rec-pword"></div>

          <hr>
          <small>&copy;2024 - hopster.gg</small>
        </div>
        </div>

        <?php
        }
        ?>
    </body>

  </html>
  <?php
} else {
  header('Location: ../../../index.php');
}