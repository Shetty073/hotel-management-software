<?php

// Session start
session_start();

// Include the database variables file
include_once "../../../../include/db_var.php";

// Database connection
$conn = mysqli_connect($db_host, $db_user, $db_pass, "departments");

if (!$conn) {
    header("http://$_SERVER[HTTP_HOST]/admin/internal_management/employees/new_employees/add_employee.php?err=1");
    die();
}

// Get data from the form
$first_name = mysqli_real_escape_string($conn, $_POST["firstname"]);
$last_name = mysqli_real_escape_string($conn, $_POST["lastname"]);
$user_name = mysqli_real_escape_string($conn, $_POST["username"]);
$raw_pass = mysqli_real_escape_string($conn, $_POST["password1"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$phone = mysqli_real_escape_string($conn, $_POST["tel"]);
$address = mysqli_real_escape_string($conn, $_POST["address"]);
$state = mysqli_real_escape_string($conn, $_POST["state"]);
$city = mysqli_real_escape_string($conn, $_POST["city"]);
$hiring_date = mysqli_real_escape_string($conn, $_POST["hiringdate"]);
$department = mysqli_real_escape_string($conn, $_POST["department"]);
$post = mysqli_real_escape_string($conn, $_POST["post"]);
$salary = mysqli_real_escape_string($conn, $_POST["salary"]);

// Hash the password
$password = password_hash($raw_pass, PASSWORD_BCRYPT);

// Query
$query = "INSERT INTO employees(fname, lname, username, password, email, phone, hiring_date, department, post, salary) VALUES ('$first_name', '$last_name', '$user_name', '$password', '$email', '$phone', '$hiring_date', '$department', '$post', $salary);";
if (mysqli_query($conn, $query)) {
    header("Location: http://$_SERVER[HTTP_HOST]/admin/internal_management/employees/new_employees/add_employee.php?success=1");
}

// Close database connection
mysqli_close($conn);
