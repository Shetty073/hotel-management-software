<?php

// Session data
session_start();
$_SESSION["loggedin"] = false;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel Management System</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
<h1 class="display-1 login-brand" style="text-align:center;">Sierra Hotels</h1>

<div class="container login-form">
    <form name="login-form" method="POST" action="login/login_process.php">
        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control col-sm-4" name="username" id="exampleInputText"
                   aria-describedby="textHelp" placeholder="Username" autocomplete="username" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control col-sm-4" name="password" id="exampleInputPassword1"
                   placeholder="Password" autocomplete="current-password" required>
            <small id="emailHelp" class="form-text text-muted">Do not write down your passowrd anywhere.</small>

            <!--  Display error message about failed login  -->
            <?php

            // Login error data
            $errors = array(
                1 => "Invalid username or password",
                2 => "Database connectivity error"
            );

            // Check if error has occurred i.e. if user was redirected to this page by the login_process after failure in logging in
            $error_id = isset($_GET["err"]) ? (int)$_GET["err"] : 0;
            if ($error_id != 0) {
                echo "<div class='alert alert-danger alert-dismissible fade show col-sm-4' style='padding: 4px; font-size: 14px;'><button type='button' class='close' data-dismiss='alert' style='padding: 0px;'>&times;</button><strong>Error: </strong>$errors[$error_id]</div>";
            }

            ?>

        </div>
        <button type="submit" class="btn btn-outline-dark btn-lg">Submit</button>
    </form>
</div>

<script src="./js/jquery-3.3.1.slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</body>
</html>
