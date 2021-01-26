<!-- THIS IS A TEMPLATE FILE FOR ALL ADMINISTRATIVE PAGES -->

<?php

// Session start
session_start();
// Check if this page was accessed through URL directly or through the login process
// If this page was accessed through URL directly then access must be dened and user must be brought back to
// the login page, else user stays on this page.
if ($_SESSION["loggedin"] == false) {
    header("Location: http://$_SERVER[HTTP_HOST]/login.php");
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ashish Shetty">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Admin:Update Checkout Date - Sierra Hotels</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <!-- Our custom template adjustments -->
    <link href="../../css/admin_template.css" rel="stylesheet">

    <style>
    /* Embedded styles here */
    </style>
</head>
<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Sierra Hotels</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="../../login/logout_process.php">Log out</a>
        </li>
    </ul>
</nav>

<div class="container-fluid dboard">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="../../admin/admin.php">
                            <span><img class="iconic" src="../../css/open-iconic/svg/dashboard.svg"
                                       alt="dashboard"></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../../admin/reservation.php">
                            <span><img class="iconic active" src="../../css/open-iconic/svg/calendar.svg"
                                       alt="reservation"></span>
                            Reservation
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../admin/restaurant.php">
                            <span><img class="iconic" src="../../css/open-iconic/svg/restaurant.svg"
                                       alt="restaurant"></span>
                            Restaurants
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../admin/services.php">
                            <span><img class="iconic" src="../../css/open-iconic/svg/services.svg"
                                       alt="services"></span>
                            Services
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../admin/reports.php">
                            <span><img class="iconic" src="../../css/open-iconic/svg/document.svg"
                                       alt="reposrts"></span>
                            Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../admin/expenses.php">
                            <span><img class="iconic" src="../../css/open-iconic/svg/expenses.svg"
                                       alt="expenses"></span>
                            Expenses
                        </a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Internal Management</span>
                    <a class="d-flex align-items-center text-muted" href="#">
                        <span data-feather="plus-circle"></span>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link management-nav"
                           href="../../admin/internal_management/employees/employees.php">
                            <span><img class="iconic" src="../../css/open-iconic/svg/employees.svg"
                                       alt="employees"></span>
                            Employees
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link management-nav"
                           href="../../admin/internal_management/departments/departments.php">
                            <span><img class="iconic" src="../../css/open-iconic/svg/departments.svg"
                                       alt="departments"></span>
                            Departments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link management-nav" href="../../admin/internal_management/stocks/stocks.php">
                            <span><img class="iconic" src="../../css/open-iconic/svg/stocks.svg"
                                       alt="stocks"></span>
                            Stocks
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link management-nav"
                           href="../../admin/internal_management/set_costs/set_costs.php">
                            <span><img class="iconic" src="../../css/open-iconic/svg/set-costs.svg"
                                       alt="set-costs"></span>
                            Set costs
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Update checkout date</h1>
            </div>
            <p>
                <a class="btn btn-outline-secondary" href="../../admin/reservation.php">< Back</a>
            </p>
            <form name="newbooking" method="post" action="">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="suite_no">Suite no.</label>
                        <?php
                        if (isset($_GET['stno'])) {
                            $stno = $_GET['stno'];
                            $suite_no = (int)$_GET["stno"];
                            echo "<input type='text' class='form-control' id='suite_no' name='suite_no' value='$stno' readonly disabled>";
                        }
                        ?>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="toDate">Old check-out date</label>
                        <?php
                        if (isset($_GET['dat'])) {
                            $dat = $_GET['dat'];
                            echo "<input type='text' class='form-control' id='toDate' name='toDate' value='$dat' readonly disabled>";
                        }
                        ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="toDate">New check-out date</label>
                        <input type='date' class='form-control' id='toDate' name='toDate' required>
                    </div>
                </div>
                <?php
                // Display error message
                $errors = array(
                    1 => "Database error!"
                );

                $error_id = isset($_GET["err"]) ? (int)$_GET["err"] : 0;

                if ($error_id != 0) {
                    echo "<div class='alert alert-danger alert-dismissible fade show col-sm-2' style='padding: 4px; font-size: 14px;'><button type='button' class='close' data-dismiss='alert' style='padding: 0px;'>&times;</button><strong>Error: </strong>$errors[$error_id]</div>";
                }

                ?>
                <button type="submit" class="btn btn-outline-secondary" name="submit-button">Update</button>
            </form>
        </main>
    </div>
</div>

<script src="../../js/jquery-3.3.1.slim.min.js"></script>
<script src="../../js/popper.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>

<?php

if (isset($_POST["submit-button"])) {

    // Include the database variables file
    include_once "../../include/db_var.php";

    // Database connection
    $conn = mysqli_connect($db_host, $db_user, $db_pass, "rooms");

    // Check for database connectivity problems
    if (!$conn) {
        header("Location: http://$_SERVER[HTTP_HOST]/admin/roombooking/update_checkout_date.php?err=1");
        die();
    }

    // New date
    $new_check_out_date = mysqli_real_escape_string($conn, $_POST["toDate"]);
    $suite_no = (int)$_GET["stno"];

    // Query
    $query = "SELECT * FROM suites WHERE room_no='$suite_no'";
    $result = mysqli_query($conn, $query);
    if ($result == 1) {
        $row = $result->fetch_assoc();
        $query_update = "UPDATE suites SET booked_to='$new_check_out_date' WHERE room_no='$suite_no'";
        if (mysqli_query($conn, $query_update)) {
            // PHP's header() is not working for some reason on this page...
            // So instead I am using JavaScript's document.location
            echo "<script type='text/javascript'> document.location = '../../admin/reservation.php?updated=$suite_no'; </script>";
        } else {
            // PHP's header() is not working for some reason on this page...
            // So instead I am using JavaScript's document.location
            echo "<script type='text/javascript'> document.location = '../../admin/roombooking/update_checkout_date.php?err=1'; </script>";
        }
    }
}

?>

</body>
</html>
