<!-- This file contains the header for files to make code shorter -->
<?php
// Connect to the db
require_once 'db.conn.php';

session_start();

// If you followed the login rules
if (isset($_SESSION["user_id"])) {

    // the function in this file easily gets the users and budgets in the database
    require_once 'service/php/get.users.php';

    // Storing the result as a variable
    $user = getUser($_SESSION['user_id'], $pdo);
    $budget = getBudget($_SESSION['user_id'], $pdo);

    // Further storing the array items into variables for queries
    $user_id = $user['user_id'];
    $user_dpic = $user['dpic'];
    
} else {
    // Return to the startup page
    header('Location: ../../../index.php');
}
