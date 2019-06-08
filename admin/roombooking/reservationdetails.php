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
    <title>Admin - Sierra Hotels</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">


    <style>
        .dboard {
            padding-top: 45px;
        }

        .iconic {
            width: 16px;
            height: 16px;
            color: #959596;
        }

        .iconic:hover {
            color: black;
        }

        .nav-link {
            color: #959596;
            font-weight: 500;
        }

        .nav-link:hover {
            color: black;
        }

        .iconic {
            width: 16px;
            height: 16px;
            color: #959596;
        }

        .iconic:hover {
            color: black;
        }

        .active {
            color: #63AEFD;
        }

        .active:hover {
            color: #63AEFD;
        }

        .management-nav {
            font-weight: 500;
        }

        .sidebar-sticky {
            position: sticky;
            height: calc(100vh - 48px);
            padding-top: .5rem;
            overflow-x: hidden;
            overflow-y: auto;
        }

        .sidebar-heading {
            color: black !important;
        }

        .table-secondary {
            background-color: #697179;
            color: white;
        }

        table tbody tr:hover {
            background-color: #6C757D !important;
            color: white !important;
        }

        .btn-outline-light:hover {
            border-color: #6C757D !important;
            color: #6C757D !important;
        }

        th {
            width: 200px;
        }
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
                        <a class="nav-link management-nav" href="#">
                            <span><img class="iconic" src="../../css/open-iconic/svg/employees.svg"
                                       alt="employees"></span>
                            Employees
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link management-nav" href="#">
                            <span><img class="iconic" src="../../css/open-iconic/svg/departments.svg"
                                       alt="departments"></span>
                            Departments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link management-nav" href="#">
                            <span><img class="iconic" src="../../css/open-iconic/svg/stocks.svg"
                                       alt="stocks"></span>
                            Stocks
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link management-nav" href="#">
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
                <h1 class="h2">Guest details for suite no.: <?php $s_no = $_GET['det'];
                    echo "$s_no" ?></h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <a type="button" class="btn btn-sm btn-outline-secondary" href="#">Export</a>
                    </div>
                </div>
            </div>
            <p>
                <a class="btn btn-outline-secondary" href="../../admin/reservation.php">< Back</a>
            </p>
            <table class="table table-bordered table-secondary">
                <tbody>
                <?php

                // Include the database variables file
                include_once "../../include/db_var.php";

                // Database connection
                $conn = mysqli_connect($db_host, $db_user, $db_pass, "rooms");

                if (!$conn) {
                    //    die("Error! could not connect to database".mysqli_error($conn));
                    echo "<div class='alert alert-danger alert-dismissible fade show col-md-12' style='padding: 4px; font-size: 14px;'><button type='button' class='close' data-dismiss='alert' style='padding: 0px;'>&times;</button><strong>Error: </strong>Unable to connect to database!</div>";
                    die();
                }

                // Get the suite no. from the URL
                $g_suite_no = mysqli_real_escape_string($conn, $_GET["det"]);

                // Query
                $query = "SELECT * FROM suites WHERE room_no='$g_suite_no'";

                // result of the query
                $result = mysqli_query($conn, $query);

                // get the data from the result
                if (mysqli_num_rows($result) == 1) {
                    $row = $result->fetch_assoc();
                    $room_id = $row["room_id"];
                    $room_no = $row["room_no"];
                    $fname = $row["fname"];
                    $lname = $row["lname"];
                    $email = $row["email"];
                    $phone = $row["phone"];
                    $address = $row["address"];
                    $country = $row["country"];
                    $state = $row["state"];
                    $city = $row["city"];
                    $no_of_guests = $row["no_of_guests"];
                    $booked_from = $row["booked_from"];
                    $booked_to = $row["booked_to"];
                    $room_services = $row["room_services"];
                    $room_type = $row["room_type"];
                }

                // Display the data
                echo "<tr>";
                echo "<th>First Name:</th><td colspan='3'>$fname</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Last Name:</th><td colspan='3'>$lname</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Email:</th><td colspan='3'>$email</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Phone:</th><td colspan='3'>$phone</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Address:</th><td colspan='3'>$address</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>City:</th><td colspan='3'>$city</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>State:</th><td colspan='3'>$state</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Country:</th><td colspan='3'>$country</td>";
                echo "</tr>";
                echo "<tr>";
                $y = substr($booked_from, 0, 4);
                $m = substr($booked_from, 5, 2);
                $d = substr($booked_from, 8, 2);
                $dat_from = "$d-$m-$y";
                echo "<th>Check In:</th><td>$dat_from</td>";
                $y = substr($booked_to, 0, 4);
                $m = substr($booked_to, 5, 2);
                $d = substr($booked_to, 8, 2);
                $dat_from = "$d-$m-$y";
                echo "<th>Check Out:</th><td>$dat_from</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Room ID:</th><td>$room_id</td>";
                echo "<th>Room Type</th><td>$room_type</td>";
                echo "</tr>";

                ?>
                </tbody>
            </table>
        </main>
    </div>
</div>

<script src="../../js/jquery-3.3.1.slim.min.js"></script>
<script src="../../js/popper.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>

</body>
</html>
