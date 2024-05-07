<?php 
if(isset($_POST['fname']) && 
   isset($_POST['uname']) &&  
   isset($_POST['pass']) &&
   isset($_POST['email']) &&
   isset($_POST['mpno'])) {

    include "../db_conn.php";

    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $phone = $_POST['mpno'];
    

    $data = "fname=".$fname."&uname=".$uname;

    if (empty($fname) || empty($uname) || empty($pass) || empty($email) || empty($phone)) {
        $em = "All fields are required";
        header("Location: ../index.php?error=$em&$data");
        exit;
    } else {
        // Hashing the password
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        // Insert into Database
        $sql = "INSERT INTO user(fname, uname, pass, email, mpno, dt) 
                VALUES(?,?,?,?,?,current_timestamp());";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$fname, $uname, $pass, $email, $phone,]);

        header("Location: ../index.php?success=Your account has been created successfully");
        header("Location: ../login.php");
        exit;
    }
} else {
    header("Location: ../index.php?error=error");
    exit;
}
?>
