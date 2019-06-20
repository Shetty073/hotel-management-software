<?php

// Session start
session_start();
// Check if this page was accessed through URL directly or through the login process
// If this page was accessed through URL directly then access must be denied and user must be brought back to
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
    <title>Admin - Sierra Hotels</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Our custom template adjustments -->
    <link href="../css/admin_template.css" rel="stylesheet">

    <style>
        .btn-outline-light:hover {
            border-color: #6C757D !important;
            color: #6C757D !important;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Sierra Hotels</a>

    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="../login/logout_process.php">Log out</a>
        </li>
    </ul>
</nav>

<div class="container-fluid dboard">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <span><img class="iconic active" src="../css/open-iconic/svg/dashboard.svg"
                                       alt="dashboard"></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/reservation.php">
                            <span><img class="iconic" src="../css/open-iconic/svg/calendar.svg"
                                       alt="reservation"></span>
                            Reservation
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/restaurant.php">
                            <span><img class="iconic" src="../css/open-iconic/svg/restaurant.svg"
                                       alt="restaurant"></span>
                            Restaurants
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/services.php">
                            <span><img class="iconic" src="../css/open-iconic/svg/services.svg"
                                       alt="services"></span>
                            Services
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/reports.php">
                            <span><img class="iconic" src="../css/open-iconic/svg/document.svg"
                                       alt="reposrts"></span>
                            Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/expenses.php">
                            <span><img class="iconic" src="../css/open-iconic/svg/expenses.svg"
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
                        <a class="nav-link management-nav" href="../admin/internal_management/employees/employees.php">
                            <span><img class="iconic" src="../css/open-iconic/svg/employees.svg"
                                       alt="employees"></span>
                            Employees
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link management-nav"
                           href="../admin/internal_management/departments/departments.php">
                            <span><img class="iconic" src="../css/open-iconic/svg/departments.svg"
                                       alt="departments"></span>
                            Departments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link management-nav" href="../admin/internal_management/stocks/stocks.php">
                            <span><img class="iconic" src="../css/open-iconic/svg/stocks.svg"
                                       alt="stocks"></span>
                            Stocks
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link management-nav" href="../admin/internal_management/set_costs/set_costs.php">
                            <span><img class="iconic" src="../css/open-iconic/svg/set-costs.svg"
                                       alt="set-costs"></span>
                            Set costs
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
            </div>
            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                <div class="card-header">Suites</div>
                <div class="card-body">
                    <h5 class="card-title">Availability</h5>
                    <p class="card-text">
                        <?php

                        // Include the database variables file
                        include_once "../include/db_var.php";

                        // Database connection
                        $conn = mysqli_connect($db_host, $db_user, $db_pass, "rooms");

                        // If databse connection fails display an error
                        if (!$conn) {
                            echo "Database connection error";
                            die();
                        }

                        // Get the required data from database table "suites"
                        // Total available suites
                        $available_results = mysqli_query($conn, "SELECT * FROM suites WHERE checked_in=0 AND under_maintainance=0");
                        $available_rooms = mysqli_num_rows($available_results);

                        // Total no. of suites in hotel (available or not)
                        $total_results = mysqli_query($conn, "SELECT * FROM suites");
                        $total_rooms = mysqli_num_rows($total_results);

                        // No of available Sierra Cozy suites
                        $cozy_results = mysqli_query($conn, "SELECT * FROM suites WHERE room_type='Sierra Cozy' AND checked_in=0 AND under_maintainance=0");
                        $cozy_rooms = mysqli_num_rows($cozy_results);

                        // No of available Sierra Cozy XL suites
                        $cozy_xl_results = mysqli_query($conn, "SELECT * FROM suites WHERE room_type='Sierra Cozy XL' AND checked_in=0 AND under_maintainance=0");
                        $cozy_xl_rooms = mysqli_num_rows($cozy_xl_results);

                        // No of available Sierra Grand suites
                        $grand_results = mysqli_query($conn, "SELECT * FROM suites WHERE room_type='Sierra Grand' AND checked_in=0 AND under_maintainance=0");
                        $grand_rooms = mysqli_num_rows($grand_results);

                        // No of available Sierra Sea View suites
                        $seaview_results = mysqli_query($conn, "SELECT * FROM suites WHERE room_type='Sierra Sea View' AND checked_in=0 AND under_maintainance=0");
                        $seaview_rooms = mysqli_num_rows($seaview_results);

                        // No of available Sierra Maharaja suites
                        $maharaja_results = mysqli_query($conn, "SELECT * FROM suites WHERE room_type='Sierra Maharaja' AND checked_in=0 AND under_maintainance=0");
                        $maharaja_rooms = mysqli_num_rows($maharaja_results);

                        // Display the number of rooms available
                        echo "<strong>$available_rooms out of $total_rooms suites</strong> available." . "<br>";
                        echo "<strong>$cozy_rooms</strong> Sierra Cozy suites" . "<br>";
                        echo "<strong>$cozy_xl_rooms</strong> Sierra Cozy XL suites" . "<br>";
                        echo "<strong>$grand_rooms</strong> Sierra Grand suites" . "<br>";
                        echo "<strong>$seaview_rooms</strong> Sierra Sea View suites" . "<br>";
                        echo "<strong>$maharaja_rooms</strong> Sierra Maharaja suites" . "<br>";

                        ?>
                    </p>
                    <a class="btn btn-outline-light" href="../admin/roombooking/newbooking.php">New Booking</a>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="../js/jquery-3.3.1.slim.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>
