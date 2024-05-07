<?php
session_start();

if(isset($_SESSION['Sno'])) {
    include "../db_conn.php"; // Include database connection
    include 'sUser.php';

    $user = getUserById($_SESSION['Sno'], $conn);

    // Retrieve form data
    $Sno=$user['Sno'];
    $username = $_POST['uname'];
    $fullname = $_POST['fname'];
    $mobile = $_POST['mpno'];
    $sname = $_POST['sname'];
    $detail = $_POST['detail'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];

    // Verify current username and password
    $sql_verify = "SELECT * FROM service WHERE Sno = ?";
    $stmt_verify = $conn->prepare($sql_verify);
    $stmt_verify->execute([$Sno]);

    if($stmt_verify->rowCount() == 1) {
        $user = $stmt_verify->fetch();
        $stored_password = $user['pass'];

        if(password_verify($current_password, $stored_password)) {
            // Update user details
            $sql_update = "UPDATE service SET fname=?, uname=?, mpno=?, sname=?, detail=? WHERE Sno=?";
            $stmt_update = $conn->prepare($sql_update);

            if(empty($new_password)) {
                $stmt_update->execute([$fullname, $username, $mobile, $sname, $detail, $Sno]);
            } else {
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $stmt_update->execute([$fullname, $username, $mobile, $sname, $detail, $Sno]);
            }

            header("Location: ../shome.php?");
            echo '<script>alert("Profile Updated Succesfully");</script>';
            exit;
        } else {
            header("Location: ../edit2.php?error=Incorrect password");
            exit;
        }
    } else {
        header("Location: ../edit2.php?error=User not found");
        exit;
    }
} else {
    header("Location: dashboard.html");
    exit;
}
?>
