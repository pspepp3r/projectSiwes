<?php
session_start();

if (isset($_SESSION["user_id"])) {
  require_once '../../../../db.conn.php';

  require_once 'get.users.php';
  $user = getUser($_SESSION['user_id'], $pdo);
  $username = $user['username'];
  $user_id = $user['user_id'];

  if (isset($_GET['bud']) && isset($_GET['bname'])) {
    $bud_name = $_GET['bname'];
    $budget = $_GET['bud'];
    $budget_file = "$username.$bud_name.json";

    $nfile = fopen("../../uploads/$budget_file", "w");
    fwrite($nfile, $budget);
    
    $query_new_budget = "INSERT INTO budgets(user_id, bud_file, bud_name) VALUES (?, ?, ?)";
    $create_new_budget = $pdo->prepare($query_new_budget);
    $create_new_budget->execute([$user_id, $budget_file, $bud_name]);

    fclose($nfile);

    echo "Saved";
  } else {
    echo "Unable to create budget";
  }

} else {
  header('Location: ../../../../index.php');
}

