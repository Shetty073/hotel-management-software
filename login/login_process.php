<?php

// Session start
session_start();

// Form data
$usr = $_POST["username"];
$pas = $_POST["password"];

// Include the database variables file
include_once "../include/db_var.php";

// Database connection
$conn = mysqli_connect($db_host, $db_user, $db_pass, "administration");

if (!$conn) {
//    die("Error! could not connect to database".mysqli_error($conn));
    header("Location: http://$_SERVER[HTTP_HOST]/login.php?err=2");
    die();
}

// Query
$query = "SELECT * FROM management WHERE username='$usr' AND password='$pas'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) == 1) {
    $row = $result->fetch_assoc();
    $empid = $row["employee_id"];
    $password = $row["password"];
    $username = $row["username"];
    $fname = $row["fullname"];
    $post = $row["post"];

    header("Location: http://$_SERVER[HTTP_HOST]/admin/admin.php");
    $_SESSION["loggedin"] = true;
    $_SESSION["empid"] = $empid;
    $_SESSION["username"] = $username;
    $_SESSION["fullname"] = $fname;
    $_SESSION["post"] = $post;
} else {
    header("Location: http://$_SERVER[HTTP_HOST]/login.php?err=1");
    $_SESSION["loggedin"] = false;
}

// Close database connection
mysqli_close($conn);
