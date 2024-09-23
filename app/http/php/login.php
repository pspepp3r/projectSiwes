<?php
require_once '../../db.conn.php';

if (isset($_POST['uname'])) {
    if (!empty($_POST['uname']) && !empty($_POST['pass'])) {
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];

        $verify_query = "SELECT * FROM users WHERE username = ?";
        $verify_result = $pdo->prepare($verify_query);
        $verify_result->execute([$uname]);

        $user = $verify_result->fetch(PDO::FETCH_ASSOC);

        if ($user == []) {
            echo "This user does not exist";
        } else {
            if (password_verify($pass, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['user_id'];
                echo "Success";
            } else {
                echo "Incorrect Password 👀";
            }
        }
    } else {
        echo 'Please fill in all fields 😒';
    }
} else {
    header('Location: ../../../index.php');
}