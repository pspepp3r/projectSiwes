<?php
require_once '../../apps.header.php';
?>

<!DOCTYPE html>
<html>

  <head>
    <!-- <link rel="shortcut icon" href="../../../img/favicon.ico" type="image/x-icon"> -->
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <link rel="stylesheet" href="styles/create-bud.css" type="text/css" media="all" />
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

    <script src="service/js/createBud.js" type="text/javascript" charset="utf-8" defer></script>
    <script src="service/js/saveBudget.js" charset="utf-8" defer></script>

    <title>Budget Manager</title>
  </head>

  <body>
    <div class="backdrop"></div>
    <div class="modal">
      <a href="bud.index.php" class="btn" title="Home"><i class="fa fa-arrow-left" title="Home"></i></a> <br> <br>
      <input id="bud-name" type="text" placeholder="Budget name" /> <br />
      <button id="bud-name-btn">Okay</button>
    </div>
    <div class="wrapper">
      <div class="budgeter">
        <div class="header">
          <h1>Budget Manager</h1>
          <a href="bud.index.php" class="btn" title="Home"><i class="fa fa-arrow-left" title="Home"></i></a>
        </div>
        <div class="budget" id="deactivate">
          <input type="number" name="" id="budget-value" placeholder="input your budget" value="" />
          <button class="btn" type="submit" onclick="setBudget()">Save</button>
        </div>
        <div class="expense">
          <input type="text" name="" id="expense-name" placeholder="input an expense" />
          <input type="number" name="" id="expense-value" placeholder="input expense cost" />
          <button class="btn" type="submit" onclick="saveExpense()">Record</button>
        </div>
        <p id="remark"></p>
        <div class="results">
          <p class="h">
            Budget <br /> &#8358;<span id="bud"> --</span>
          </p>
          <p>
            Expenses <br /> &#8358;<span id="exp"> --</span>
          </p>
          <p>
            Balance <br /> &#8358;<span id="bal"> --</span>
          </p>
        </div>
      </div>

      <div id="log">
        <div class="header">
          <h3>Expenses</h3>
          <h3>Costs</h3>
        </div>
        <div id="content-x">

        </div>

        <button id="bud-save">Save</button>
        <!-- <a href="service/save.budget.php" class="btn" title="Home"><i>Save</i></a> -->
      </div>
      <hr>
      <small>&copy;2024 - hopster.gg</small>
    </div>

  </body>

</html>