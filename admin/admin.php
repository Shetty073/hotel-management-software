<?php

session_start();
if ($_SESSION["loggedin"] == false) {
    header("Location: http://localhost/login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin panel</title>
</head>
<body>
<h1>Logged in successfully</h1>
</body>
</html>
