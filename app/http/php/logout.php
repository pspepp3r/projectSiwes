<?php

function destroy_seshion() {
    session_start();
    $_SESSION = [];
    setcookie(session_name(), '', time() - 2592000, '/');
    session_destroy();
}
destroy_seshion();

header('Location: ../../../index.php');
