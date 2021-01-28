<?php
// Session start
session_start();


// Include the database variables file
include_once "../../include/db_var.php";

// Database connections
$conn1 = mysqli_connect($db_host, $db_user, $db_pass, "rooms");
$conn2 = mysqli_connect($db_host, $db_user, $db_pass, "services");

if (!$conn1 || !$conn2) {
//    die("Error! could not connect to database".mysqli_error($conn));
    header("Location: http://$_SERVER[HTTP_HOST]/admin/services/add_to_housekeeping.php?err=1");
    die();
}

// Form data
$suite_no = mysqli_real_escape_string($conn1, $_POST["suite_no"]);
$maintenance_type = mysqli_real_escape_string($conn1, $_POST["maintenance_type"]);
$maintenance_details = mysqli_real_escape_string($conn1, $_POST["maintenance_details"]);

// Query
// First check whether the room is checked_in or is already under maintenance or not?
$query = "SELECT * FROM suites WHERE room_no='$suite_no'";
$result = mysqli_query($conn1, $query);
$row = $result->fetch_assoc();
$checked_in = $row["checked_in"];
$under_maintenance = $row['under_maintenance'];

if (!$checked_in && !$under_maintenance) {
    $query_insert = "UPDATE suites SET under_maintenance=1 WHERE room_no='$suite_no'";
    if (mysqli_query($conn1, $query_insert)) {
        // Close database connection 1
        mysqli_close($conn1);

        // Insert our data into housekeeping table in services database
        $query_insert = "INSERT INTO housekeeping (room_no, maintenance_type, maintenance_details) VALUES('$suite_no', '$maintenance_type', '$maintenance_details')";
        if (mysqli_query($conn2, $query_insert)) {
            header("Location: http://$_SERVER[HTTP_HOST]/admin/services/add_to_housekeeping.php?success=1");
        } else {
            header("Location: http://$_SERVER[HTTP_HOST]/admin/services/add_to_housekeeping.php?err=1");
        }
    }
} else {
    header("Location: http://$_SERVER[HTTP_HOST]/admin/services/add_to_housekeeping.php?err=2");
}


// Close database connection 2
mysqli_close($conn2);
