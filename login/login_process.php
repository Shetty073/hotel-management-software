<?php

// Session start
session_start();

// Form data
$usr = $_POST["username"];
$pas = $_POST["password"];

// Database connection
$conn = mysqli_connect("localhost", "root", "", "administration");

if (!$conn) {
//    die("Error! could not connect to database".mysqli_error($conn));
    header("Location: http://localhost/login.php?err=2");
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

    header("Location: http://localhost/admin/admin.php");
    $_SESSION["loggedin"] = true;
    $_SESSION["empid"] = $empid;
    $_SESSION["username"] = $username;
    $_SESSION["fullname"] = $fname;
    $_SESSION["post"] = $post;

    // TOFO: Once employee management is set use password_hash() and password_verify() for storing and retrieving/checking
//    if ($pas == $password) {
//        header("Location: http://localhost/admin/admin.php");
//        $_SESSION["loggedin"] = true;
//    } else {
//        header("Location: http://localhost/login.php?err=1");
//        $_SESSION["loggedin"] = false;
//    }

} else {
    header("Location: http://localhost/login.php?err=1");
    $_SESSION["loggedin"] = false;
}

// Close database connection
mysqli_close($conn);

?>
