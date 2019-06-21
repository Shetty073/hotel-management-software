<?php

// Session start
session_start();

// Include the database variables file
include_once "../../include/db_var.php";

// Database connection
$conn = mysqli_connect($db_host, $db_user, $db_pass, "rooms");

if (!$conn) {
//    die("Error! could not connect to database".mysqli_error($conn));
    header("Location: http://$_SERVER[HTTP_HOST]/admin/roombooking/newbooking.php?err=1");
    die();
}

// Form data
$first_name = mysqli_real_escape_string($conn, $_POST["customerfirstname"]);
$last_name = mysqli_real_escape_string($conn, $_POST["customerlastname"]);
$c_email = mysqli_real_escape_string($conn, $_POST["customeremail"]);
$c_tel = mysqli_real_escape_string($conn, $_POST["customertel"]);
$c_add = mysqli_real_escape_string($conn, $_POST["customeraddress"]);
$c_country = mysqli_real_escape_string($conn, $_POST["customercountry"]);
$c_state = mysqli_real_escape_string($conn, $_POST["customerstate"]);
$c_city = mysqli_real_escape_string($conn, $_POST["customercity"]);
$room_type = mysqli_real_escape_string($conn, $_POST["roomtype"]);
$check_in = mysqli_real_escape_string($conn, $_POST["fromDate"]);
$check_out = mysqli_real_escape_string($conn, $_POST["toDate"]);
$no_of_guests = mysqli_real_escape_string($conn, $_POST["numofguests"]);

// Query
$query = "SELECT * FROM suites WHERE room_type='$room_type' AND checked_in=0 AND under_maintainance=0";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) >= 1) {
    $row = $result->fetch_assoc();
    $room_id = $row["room_id"];
    $query_insert = "UPDATE suites SET fname='$first_name', lname='$last_name', email='$c_email', phone='$c_tel', address='$c_add', country='$c_country', state='$c_state', city='$c_city', no_of_guests=$no_of_guests, booked_from='$check_in', booked_to='$check_out', checked_in=1 WHERE room_id=$room_id";
    if (mysqli_query($conn, $query_insert)) {
        header("Location: http://$_SERVER[HTTP_HOST]/admin/roombooking/newbooking.php?success=1");
    }
} else {
    header("Location: http://$_SERVER[HTTP_HOST]/admin/roombooking/newbooking.php?err=2");
}

// Close database connection
mysqli_close($conn);
