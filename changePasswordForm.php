<?php
    session_start();
    require_once 'db_config.php';

    //redirect to login if not logged in
    if(!isset($_SESSION['UserData']['UserId'])){
        header('location:loginForm.php');
        exit();
    }

    $sql = "SELECT * FROM users WHERE UserId = '".$_SESSION['UserData']['UserId']."'";
    $result = $db->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
<div class="container">
    <h1 class="page-header text-center">Change Password</h1>
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4 panel panel-default" style="padding:20px;">
            <h3>Welcome, <?php echo $row['username']; ?></h3>
            <hr>
            <form method="POST" action="changePassword.php">
                <div class="form-group">
                    <label for="old">Old Password:</label>
                    <input type="password" name="old" id="old" class="form-control" value="<?php echo (isset($_SESSION['old'])) ? $_SESSION['old'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="new">New Password:</label>
                    <input type="password" name="new" id="new" class="form-control" value="<?php echo (isset($_SESSION['new'])) ? $_SESSION['new'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="retype">Retype New Password:</label>
                    <input type="password" name="retype" id="retype" class="form-control" value="<?php echo (isset($_SESSION['retype'])) ? $_SESSION['retype'] : ''; ?>">
                </div>
                <button type="submit" name="update" class="btn btn-success"><span class="glyphicon glyphicon-check"></span>Update</button>
            </form>
            <?php
                $error = $_SESSION['error']
                $success = $_SESSION['success']
                if(isset($error)){
                    ?>
                    <div class="alert alert-danger text-center" style="margin-top:20px;">
                        <?php echo $error; ?>
                    </div>
                    <?php

                    unset($error);
                }
                if(isset($success)){
                    ?>
                    <div class="alert alert-success text-center" style="margin-top:20px;">
                        <?php echo $success; ?>
                    </div>
                    <?php

                    unset($success);
                }
            ?>
        </div>
    </div>
</div>
</body>
</html>