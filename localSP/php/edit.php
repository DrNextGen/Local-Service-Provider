<?php
session_start();

if(isset($_SESSION['Sno'])) {
    include "../db_conn.php"; // Include database connection
    include 'User.php';

    $user = getUserById($_SESSION['Sno'], $conn);

    // Retrieve form data
    $Sno=$user['Sno'];
    $username = $_POST['uname'];
    $current_password = $_POST['current_password'];
    $fullname = $_POST['fname'];
    $email = $_POST['email'];
    $mobile = $_POST['mpno'];
    $new_password = $_POST['new_password'];

    // Verify current username and password
    $sql_verify = "SELECT * FROM user WHERE Sno = ?";
    $stmt_verify = $conn->prepare($sql_verify);
    $stmt_verify->execute([$Sno]);

    if($stmt_verify->rowCount() == 1) {
        $user = $stmt_verify->fetch();
        $stored_password = $user['pass'];

        if(password_verify($current_password, $stored_password)) {
            // Update user details
            $sql_update = "UPDATE user SET fname=?, uname=?, email=?, mpno=? WHERE Sno=?";
            $stmt_update = $conn->prepare($sql_update);

            if(empty($new_password)) {
                $stmt_update->execute([$fullname, $username, $email, $mobile, $Sno]);
            } else {
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $stmt_update->execute([$fullname, $username, $email, $mobile, $Sno]);
            }

            header("Location: ../home.php?");
            echo '<script>alert("Profile Updated Succesfully");</script>';
            exit;
        } else {
            header("Location: ../edit.php?error=Incorrect password");
            exit;
        }
    } else {
        header("Location: ../edit.php?error=User not found");
        exit;
    }
} else {
    header("Location: dashboard.html");
    exit;
}
?>
