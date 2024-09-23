<?php
session_start();
// If you're already logged in
if (isset($_SESSION["user_id"])) {
  // Return to home page
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

    <title>Web Application</title>
  </head>

  <body>
    <div class="wrapper">
      <div class="recover">
        <h2>Input your email:</h2>
        <form action="app/http/php/pass_reset.php" method="post" id="forgot">
          <input type="email" name="femail" id="femail"><br>
          <button type="submit" id="click">Show</button>
          <a href="index.php" class="btn" style="font-size: .8em">Back</a>
        </form>

      </div> <hr>
      <small>&copy;2024 - hopster.gg</small>
    </div>
  </body>

</html>