<?php
// Connect to the db
require_once '../../db.conn.php';

// the function in this file easily gets the users in the users table
require_once 'get.users.php';

session_start();


// If you followed the login rules,
if (isset($_SESSION['user_id'])) {
    // Storing session array item as variable
    $user_id = $_SESSION['user_id'];

    // Storing the result of function as a variable
    $user = getUser($_SESSION['user_id'], $pdo);

    // If any of the fields were left empty
    if (empty($_POST['nuname']) && empty($_POST['npass']) && $_FILES['ndpic']['name'] == "") {
        echo "No request sent";
    } else {
        // If the username field contains data
        if (!empty($_POST['nuname'])) {
            // Store data as a variable
            $nuname = $_POST['nuname'];

            // updating the username in the db
            $query_update_username = "UPDATE users SET username = ? WHERE user_id = $user_id";
            $execute_update_username = $pdo->prepare($query_update_username);
            $execute_update_username->execute([$nuname]);

            echo "Username updated ";

            // Convert image extension name and store as variable
            $file_ext = strtolower(pathinfo($user['dpic'], PATHINFO_EXTENSION));
            // Making up the image name
            $image_name = $nuname . "." . $file_ext;

            // Updating the image in db
            $query_update_dpic = "UPDATE users SET dpic = ? WHERE user_id = $user_id";

            $execute_update_dpic = $pdo->prepare($query_update_dpic);
            $execute_update_dpic->execute([$image_name]);

            // Renaming the image file to 'username.upload_extension'
            rename("../../../uploads/" . $user['dpic'], "../../../uploads/" . $image_name);
        }

        // If the password field contains data
        if (!empty($_POST['npass'])) {
            // Hashing the password for extra security
            $npass = password_hash($_POST['npass'], PASSWORD_DEFAULT);

            // Updating the password in db
            $query_update_password = "UPDATE users SET password = ? WHERE user_id = $user_id";
            $execute_update_password = $pdo->prepare($query_update_password);
            $execute_update_password->execute([$npass]);

            echo "Password updated ";
        }

        if (!($_FILES['ndpic']['name'] == "")) {
            // If file field contains data

            // Storing file information as variables for db query
            $file_name = $_FILES['ndpic']['name'];
            $file_tmp_name = $_FILES['ndpic']['tmp_name'];
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

            $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];

            // Checking if file is an image
            if (in_array($file_ext, $allowed_ext)) {
                $user = getUser($_SESSION['user_id'], $pdo);
                $image_name = $user['username'] . "." . $file_ext;

                $upload_path = "../../../uploads/" . $image_name;
                move_uploaded_file($file_tmp_name, $upload_path);

                // Update image in db
                $query_update_dpic = "UPDATE users SET dpic = ? WHERE user_id = $user_id";

                $execute_update_dpic = $pdo->prepare($query_update_dpic);
                $execute_update_dpic->execute([$image_name]);

                echo "Image updated";
            } else {
                // Return fail message
                echo "File type not supported";
            }
        }

    }
} else {
    // Return to the login page
    header('Location: ../../../index.php');
}