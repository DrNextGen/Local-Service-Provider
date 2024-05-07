<?php 
if(isset($_POST['fname']) && 
   isset($_POST['uname']) &&  
   isset($_POST['pass']) &&
   isset($_POST['mpno']) &&
   isset($_POST['sname']) &&
   isset($_POST['detail'])) {

    include "../db_conn.php";

    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $phone = $_POST['mpno'];
    $sname = $_POST['sname'];
    $detail = $_POST['detail'];
    

    $data = "fname=".$fname."&uname=".$uname;

    if (empty($fname) || empty($uname) || empty($pass) || empty($phone) || empty($sname)) {
        $em = "All fields are required";
        header("Location: ../sindex.php?error=$em&$data");
        exit;
    } else {
        // Hashing the password
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        // Insert into Database
        $sql = "INSERT INTO service(fname, uname, pass, mpno, sname, detail, dt) 
                VALUES(?,?,?,?,?,?,current_timestamp());";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$fname, $uname, $pass, $phone, $sname, $detail,]);

        header("Location: ../sindex.php?success=Your account has been created successfully");
        header("Location: ../slogin.php");
        exit;
    }
} else {
    header("Location: ../sindex.php?error=error");
    exit;
}
?>
