<?php 
session_start();

if (isset($_SESSION['Sno']) && isset($_SESSION['fname'])) {

    include "db_conn.php";
    include 'php/User.php';
    $user = getUserById($_SESSION['Sno'], $conn);

    if ($user) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3>User Profile</h3>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img src="images/user1.png" class="img-fluid rounded-circle mb-3" style="width: 150px;">
                            <h4><?=$user['uname']?></h4>
                        </div>
                        <hr>
                        <div>
                            <h5>Full Name: <?=$user['fname']?></h5>
                            <h5>Email: <?=$user['email']?></h5>
                            <h5>Mobile Number: <?=$user['mpno']?></h5>
                        </div>
                        <div class="text-center mt-4">
                            <a href="edit.php" class="btn btn-primary">Edit Profile</a>
                            <a href="logout.php" class="btn btn-warning">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php 
    } else {
        header("Location: login.php");
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}
?>
