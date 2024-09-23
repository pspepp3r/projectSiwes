<?php
#database connection file
require_once '../../db.conn.php';


#check if request came from index.php
if (isset($_POST['nemail'])) {
    #check if all input fields are filled
    if (!empty($_POST['nemail']) && !empty($_POST['nuname']) && !empty($_POST['npass'])) {
        #storing input parameters as php variables
        $nemail = $_POST['nemail'];
        $nuname = $_POST['nuname'];
        $npass = $_POST['npass'];
        $pass_hash = password_hash($npass, PASSWORD_DEFAULT);

        #making query to fetch user
        $verify_query = "SELECT * FROM users WHERE email = ?";
        $verify_result = $pdo->prepare($verify_query);
        $verify_result->execute([$nemail]);

        $user = $verify_result->fetch(PDO::FETCH_ASSOC);

        #checking if user already exists
        if ($user > 0) {
            echo "This email is in use 😒";
        } else {
            #when a profile piic is uploaded
            if ($_FILES['ndpic']['name'] == "") {
                $query_user_without_dp = "INSERT INTO users(email, username, password) VALUES(?,?,?)";
                $create_user_without_dp = $pdo->prepare($query_user_without_dp);
                $create_user_without_dp->execute([$nemail, $nuname, $pass_hash]);

                $verify_query = "SELECT * FROM users WHERE email = ?";
                $verify_result = $pdo->prepare($verify_query);
                $verify_result->execute([$nemail]);

                $user = $verify_result->fetch(PDO::FETCH_ASSOC);

                session_start();
                $_SESSION['user_id'] = $user['user_id'];

                echo "Success";
            }
            #when a profile piic is uploaded
            else {
                $file_name = $_FILES['ndpic']['name'];
                $file_tmp_name = $_FILES['ndpic']['tmp_name'];
                $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

                $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];

                #check if file is valid
                if (in_array($file_ext, $allowed_ext)) {
                    $image_name = $nuname . "." . $file_ext;

                    $upload_path = "../../../uploads/" . $image_name;
                    move_uploaded_file($file_tmp_name, $upload_path);

                    $query_user_with_dp = "INSERT INTO users(email, username, password, dpic) VALUES(?,?,?,?)";
                    $create_user_with_dp = $pdo->prepare($query_user_with_dp);
                    $create_user_with_dp->execute([$nemail, $nuname, $pass_hash, $image_name]);

                    $verify_query = "SELECT * FROM users WHERE email = ?";
                    $verify_result = $pdo->prepare($verify_query);
                    $verify_result->execute([$nemail]);

                    $user = $verify_result->fetch(PDO::FETCH_ASSOC);

                    session_start();
                    $_SESSION['user_id'] = $user['user_id'];
                    echo "Success";
                } else {
                    echo "File type not accepted 😒";
                }
            }
        }
    } else {
        echo 'Please fill in all fields 😒';
    }
} else {
    header('Location: ../../../index.php');
}