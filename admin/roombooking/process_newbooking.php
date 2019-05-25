<?php

// Session start
session_start();

// Form data


// Database connection
$conn = mysqli_connect("localhost", "root", "", "DATABASE_NAME_HERE");

if (!$conn) {
//    die("Error! could not connect to database".mysqli_error($conn));
    header("Location: http://localhost/admin/roombooking/newbooking.php?err=1");
    die();
}

// Query
$query = "SELECT * FROM management WHERE username='$usr' AND password='$pas'"; // change this query
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) == 1) {
    $row = $result->fetch_assoc();
    header("Location: http://localhost/admin/roombooking/newbooking.php");

} else {
    header("Location: http://localhost/admin/roombooking/newbooking.php?err=1");
}

// Close database connection
mysqli_close($conn);

?>
