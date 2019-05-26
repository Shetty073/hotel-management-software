<?php

// Session start
session_start();
// Check if this page was accessed through URL directly or through the login process
// If this page was accessed through URL directly then access must be dened and user must be brought back to
// the login page, else user stays on this page.
if ($_SESSION["loggedin"] == false) {
    header("Location: http://localhost/login.php");
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
    <title>Admin:Reservation - Sierra Hotels</title>

    <!-- Bootstrap core CSS -->
    <link href="http://localhost/css/bootstrap.min.css" rel="stylesheet">


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

        .check-out-btn:hover, .check-out-btn:active:focus {
            border-color: white !important;
            background-color: red !important;
            color: white !important;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Sierra Hotels</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="http://localhost/login/logout_process.php">Log out</a>
        </li>
    </ul>
</nav>

<div class="container-fluid dboard">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/admin/admin.php">
                            <span><img class="iconic" src="http://localhost/css/open-iconic/svg/dashboard.svg"
                                       alt="dashboard"></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <span><img class="iconic active" src="http://localhost/css/open-iconic/svg/calendar.svg"
                                       alt="reservation"></span>
                            Reservation
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/admin/restaurant.php">
                            <span><img class="iconic" src="http://localhost/css/open-iconic/svg/restaurant.svg"
                                       alt="restaurant"></span>
                            Restaurants
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/admin/services.php">
                            <span><img class="iconic" src="http://localhost/css/open-iconic/svg/services.svg"
                                       alt="services"></span>
                            Services
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/admin/reports.php">
                            <span><img class="iconic" src="http://localhost/css/open-iconic/svg/document.svg"
                                       alt="reposrts"></span>
                            Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/admin/expenses.php">
                            <span><img class="iconic" src="http://localhost/css/open-iconic/svg/expenses.svg"
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
                            <span><img class="iconic" src="http://localhost/css/open-iconic/svg/employees.svg"
                                       alt="employees"></span>
                            Employees
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link management-nav" href="#">
                            <span><img class="iconic" src="http://localhost/css/open-iconic/svg/departments.svg"
                                       alt="departments"></span>
                            Departments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link management-nav" href="#">
                            <span><img class="iconic" src="http://localhost/css/open-iconic/svg/stocks.svg"
                                       alt="stocks"></span>
                            Stocks
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link management-nav" href="#">
                            <span><img class="iconic" src="http://localhost/css/open-iconic/svg/set-costs.svg"
                                       alt="set-costs"></span>
                            Set costs
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Reservation</h1>
            </div>
            <p>
                <a class="btn btn-outline-secondary" href="http://localhost\admin\roombooking\newbooking.php">New
                    Booking</a>
            </p>
            <table class="table table-hover table-secondary">
                <thead>
                <tr>
                    <th scope="col">Suite #</th>
                    <th scope="col">Name</th>
                    <th scope="col">Checkout Date</th>
                    <th scope="col">Details</th>
                    <th scope="col">Services</th>
                    <th scope="col">Checkout</th>
                </tr>
                </thead>
                <tbody>
                <?php

                // Database connection
                $conn = mysqli_connect("localhost", "root", "", "rooms");

                if (!$conn) {
                    //    die("Error! could not connect to database".mysqli_error($conn));
                    echo "<div class='alert alert-danger alert-dismissible fade show col-md-12' style='padding: 4px; font-size: 14px;'><button type='button' class='close' data-dismiss='alert' style='padding: 0px;'>&times;</button>Database connection error</div>";
                    die();
                }

                $query = "SELECT * FROM suites WHERE checked_in=1";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) >= 1) {
                    while ($row = mysqli_fetch_array($result)) {
                        $suite_no = $row['room_no'];
                        $name = $row['fname'] . " " . $row['lname'];

                        // MariaDB SQL stores date type data in the format yyyy-mm-dd
                        // Change its format to dd-mm-yyy before displaying it
                        $checkout_date = date("d-m-Y", strtotime($row['booked_to']));
                        echo "<tr>";
                        echo "<td scope=\"row\">$suite_no</td>";
                        echo "<td>$name</td>";
                        echo "<td>$checkout_date</td>";
                        echo "<td><a class=\"btn btn-outline-light\" href=\"http://localhost/admin/roombooking/reservationdetails.php?det=$suite_no\">Details</a></td>";
                        echo "<td><a class=\"btn btn-outline-light\" href=\"#\">Services</a></td>";
                        echo "<td><a class=\"btn btn-outline-light check-out-btn\" href=\"#\">Checkout</a></td>";
                        echo "</tr>";
                    }
                }

                ?>
                </tbody>
            </table>
        </main>
    </div>
</div>

<script src="http://localhost/js/jquery-3.3.1.slim.min.js"></script>
<script src="http://localhost/js/popper.min.js"></script>
<script src="http://localhost/js/bootstrap.min.js"></script>

</body>
</html>
