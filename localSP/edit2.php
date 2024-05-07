<?php 
session_start();

if (isset($_SESSION['Sno']) && isset($_SESSION['fname'])) {
    include "db_conn.php";
    include 'php/sUser.php';

    $user = getUserById($_SESSION['Sno'], $conn);

    if ($user) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <form action="php/edit2.php" method="post" enctype="multipart/form-data">
                            <!-- Full Name -->
                            <div class="mb-3">
                                <label for="fname" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fname" name="fname" value="<?=$user['fname']?>">
                            </div>
                            <!-- Username -->
                            <div class="mb-3">
                                <label for="uname" class="form-label">Username</label>
                                <input type="text" class="form-control" id="uname" name="uname" value="<?=$user['uname']?>">
                            </div>
                            <!-- Mobile Number -->
                            <div class="mb-3">
                                <label for="mpno" class="form-label">Mobile Number</label>
                                <input type="text" class="form-control" id="mpno" name="mpno" value="<?=$user['mpno']?>">
                            </div>
                            <div class="mb-3">
                                <label for="sname" class="form-label">Name of Service</label>
                                <input type="text" class="form-control" id="sname" name="sname" value="<?=$user['sname']?>">
                            </div>
                            <div class="mb-3">
                                <label for="detail" class="form-label">Description</label>
                                <input type="text" class="form-control" id="detail" name="detail" value="<?=$user['detail']?>">
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Current Password</label>
                                <input type="password" class="form-control" id="current_password" name="current_password">
                            </div>
                            <!-- Optional: New Password -->
                            <div class="mb-3">
                                <label for="new_password" class="form-label">New Password (Optional)</label>
                                <input type="password" class="form-control" id="new_password" name="new_password">
                            </div>
                          
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="shome.php" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php 
    } else {
        header("Location: home.php");
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}
?>
