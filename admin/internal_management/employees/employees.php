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
    <title>Admin - Sierra Hotels</title>

    <!-- Bootstrap core CSS -->
    <link href="../../../css/bootstrap.min.css" rel="stylesheet">
    <!-- Our custom template adjustments -->
    <link href="../../../css/admin_template.css" rel="stylesheet">

    <style>
        /* Embedded styles */
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

        /* For window.print() this changes the visibility of every element other than the table to hidden */
        @media print {
            nav, p, a, h1, .d-flex {
                visibility: hidden;
                color: #000000 !important;
            }

            table {
                position: absolute !important;
                left: 0 !important;
                top: 0 !important;
                color: #1d2124 !important;
            }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Sierra Hotels</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="../../../login/logout_process.php">Log out</a>
        </li>
    </ul>
</nav>

<div class="container-fluid dboard">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="../../../admin/admin.php">
                            <span><img class="iconic" src="../../../css/open-iconic/svg/dashboard.svg"
                                       alt="dashboard"></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../../admin/reservation.php">
                            <span><img class="iconic active" src="../../../css/open-iconic/svg/calendar.svg"
                                       alt="reservation"></span>
                            Reservation
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../../admin/restaurant.php">
                            <span><img class="iconic" src="../../../css/open-iconic/svg/restaurant.svg"
                                       alt="restaurant"></span>
                            Restaurants
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../../admin/services.php">
                            <span><img class="iconic" src="../../../css/open-iconic/svg/services.svg"
                                       alt="services"></span>
                            Services
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../../admin/reports.php">
                            <span><img class="iconic" src="../../../css/open-iconic/svg/document.svg"
                                       alt="reposrts"></span>
                            Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../../admin/expenses.php">
                            <span><img class="iconic" src="../../../css/open-iconic/svg/expenses.svg"
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
                        <a class="nav-link management-nav active" href="#">
                            <span><img class="iconic" src="../../../css/open-iconic/svg/employees.svg"
                                       alt="employees"></span>
                            Employees
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link management-nav"
                           href="../../../admin/internal_management/departments/departments.php">
                            <span><img class="iconic" src="../../../css/open-iconic/svg/departments.svg"
                                       alt="departments"></span>
                            Departments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link management-nav" href="../../../admin/internal_management/stocks/stocks.php">
                            <span><img class="iconic" src="../../../css/open-iconic/svg/stocks.svg"
                                       alt="stocks"></span>
                            Stocks
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link management-nav"
                           href="../../../admin/internal_management/set_costs/set_costs.php">
                            <span><img class="iconic" src="../../../css/open-iconic/svg/set-costs.svg"
                                       alt="set-costs"></span>
                            Set costs
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Employees</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <a class="btn btn-outline-secondary" href="./new_employees/add_employee.php">New employee</a>
                        <a class="btn btn-outline-secondary" href="#" onclick="window.print()">Print</a>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                        <span data-feather="calendar"></span>
                        Manager
                    </button>
                </div>
            </div>
            <table class="table table-hover table-secondary">
                <thead>
                <tr>
                    <th scope="col">Employee #</th>
                    <th scope="col">Name</th>
                    <th scope="col">Hiring Date</th>
                    <th scope="col">Post</th>
                </tr>
                </thead>
                <tbody>
                <?php

                // Include the database variables file
                include_once "../../../include/db_var.php";

                // Database connection
                $conn = mysqli_connect($db_host, $db_user, $db_pass, "departments");

                if (!$conn) {
                    //    die("Error! could not connect to database".mysqli_error($conn));
                    echo "<div class='alert alert-danger alert-dismissible fade show col-md-12' style='padding: 4px; font-size: 14px;'><button type='button' class='close' data-dismiss='alert' style='padding: 0px;'>&times;</button>Database connection error</div>";
                    die();
                }

                $query = "SELECT * FROM employees";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) >= 1) {
                    while ($row = mysqli_fetch_array($result)) {
                        $emp_id = $row['employee_id'];
                        $fname = $row['fname'];
                        $lname = $row['lname'];
                        $name = $fname . " " . $lname;
                        // MariaDB SQL stores date type data in the format yyyy-mm-dd
                        // Change its format to dd-mm-yyy before displaying it
                        $hiring_date = date("d-m-Y", strtotime($row['hiring_date']));
                        $post = $row['post'];
                        echo "<tr>";
                        echo "<td scope=\"row\">$emp_id</td>";
                        echo "<td>$name</td>";
                        echo "<td>$hiring_date</td>";
                        echo "<td>$post</td>";
                        echo "</tr>";
                    }
                }

                ?>
                </tbody>
            </table>
        </main>
    </div>
</div>

<script src="../../../js/jquery-3.3.1.slim.min.js"></script>
<script src="../../../js/popper.min.js"></script>
<script src="../../../js/bootstrap.min.js"></script>

</body>
</html>
