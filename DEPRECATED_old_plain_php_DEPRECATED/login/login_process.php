<?php

// Session start
session_start();


// Include the database variables file
include_once "../include/db_var.php";

// Database connection
$conn = mysqli_connect($db_host, $db_user, $db_pass, "departments");

// Form data
$usr = mysqli_real_escape_string($conn, $_POST["username"]);
$pas = mysqli_real_escape_string($conn, $_POST["password"]);

if (!$conn) {
//    die("Error! could not connect to database".mysqli_error($conn));
    header("Location: http://$_SERVER[HTTP_HOST]/login.php?err=2");
    die();
}

// Query
$query = "SELECT * FROM employees WHERE username='$usr'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) < 1) {
    header("Location: http://$_SERVER[HTTP_HOST]/login.php?err=1");
    $_SESSION["loggedin"] = false;
} else {
    if ($row = mysqli_fetch_assoc($result)) {
        // Verify password with the hashed one
        if (password_verify($pas, $row["password"])) {
            // If password is correct
            $row = $result->fetch_assoc();
            $empid = $row["employee_id"];
            $username = $row["username"];
            $fname = $row["fname"];
            $lname = $row["lname"];
            $post = $row["post"];

            header("Location: http://$_SERVER[HTTP_HOST]/admin/admin.php");
            $_SESSION["loggedin"] = true;
            $_SESSION["empid"] = $empid;
            $_SESSION["username"] = $username;
            $_SESSION["fname"] = $fname;
            $_SESSION["lname"] = $lname;
            $_SESSION["post"] = $post;
        } else {
            // If password is not correct
            header("Location: http://$_SERVER[HTTP_HOST]/login.php?err=1");
            $_SESSION["loggedin"] = false;
        }
    }
}

// Close database connection
mysqli_close($conn);
