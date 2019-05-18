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
}

// Query
$query = "SELECT password FROM management WHERE username='$usr'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) == 1) {
    $row = $result->fetch_assoc();
    // $id = $row["employee_id"];
    // $username = $row["username"];
    $password = $row["password"];
    // $post = $row["post"];

    // Check if password matches
    if ($pas == $password) {
        header("Location: http://localhost/admin/admin.php");
        $_SESSION["loggedin"] = true;
    } else {
        header("Location: http://localhost/login.php?err=1");
        $_SESSION["loggedin"] = false;
    }
} else {
    header("Location: http://localhost/login.php?err=1");
}

// Close database connection
mysqli_close($conn);

?>
