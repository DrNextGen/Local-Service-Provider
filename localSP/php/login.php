<?php
session_start();

if(isset($_POST['uname']) && isset($_POST['pass'])) {
    include "../db_conn.php"; // Include database connection

    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    // Check if username is empty
    if(empty($uname)) {
        $em = "User name is required";
        header("Location: ../login.php?error=$em");
        exit;
    } 
    // Check if password is empty
    else if(empty($pass)) {
        $em = "Password is required";
        header("Location: ../login.php?error=$em");
        exit;
    } 
    else {
        // Prepare SQL statement to fetch user by username
        $sql = "SELECT * FROM user WHERE uname = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname]);

        // Check if a user with the given username exists
        if($stmt->rowCount() == 1) {
            $user = $stmt->fetch(); // Fetch the user details

            // Extract user data from the fetched row
            $username = $user['uname'];
            $password = $user['pass'];
            $fname = $user['fname'];
            $Sno = $user['Sno'];

            // Verify the password using password_verify
            if($username === $uname && password_verify($pass, $password)) {
                $_SESSION['Sno'] = $Sno;
                $_SESSION['fname'] = $fname;

                header("Location: ../dashboard.html"); // Redirect to home page
                exit;
            } 
            else {
                $em = "Incorrect User name or password";
                header("Location: ../login.php?error=$em");
                exit;
            }
        } 
        else {
            $em = "Incorrect User name or password";
            header("Location: ../login.php?error=$em");
            exit;
        }
    }
} 
else {
    header("Location: ../login.php?error=error");
    exit;
}
?>
