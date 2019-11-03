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
        <title>Admin:Services:Add new suite to housekeeping - Sierra Hotels</title>

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
                            <a class="nav-link" href="../../admin/reservation.php">
                            <span><img class="iconic" src="../../css/open-iconic/svg/calendar.svg"
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
                            <a class="nav-link active" href="../../admin/services.php">
                            <span><img class="iconic active" src="../../css/open-iconic/svg/services.svg"
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
                    <h1>Add suite for housekeeping</h1>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-outline-secondary" href="../../admin/services/housekeeping_service.php">< Back</a>
                    </div>
                </div>
                <p>
                </p>
                <!-- CONTENT GOES HERE -->
                <form name="" method="post" action="process_add_to_housekeeping.php">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="suite_no">Suite #</label>
                            <input type="text" name="suite_no" class="form-control" id="suite_no" placeholder="Suite #">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="maintenance_type">Maintenance Type</label>
                            <select id="maintenance_type" name="maintenance_type" class="form-control" required>
                                <option value="Minor" selected>Minor Maintenance</option>
                                <option value="Major">Major Maintenance</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="maintenance_details">Maintenance Details</label>
                            <textarea name="maintenance_details" class="form-control" id="maintenance_details" placeholder="Broken bulb, dirty floor..." style="resize: none"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-secondary">Add</button>
                    <div class="form-row">
                        <?php

                        // Login error data
                        $errors = array(
                            1 => "Database connectivity error",
                            2 => "Room is either checked in or is already under maintenance!"
                        );

                        // Check if error has occurred i.e. if user was redirected to this page by the process_newbooking after encountering some error
                        $error_id = isset($_GET["err"]) ? (int)$_GET["err"] : 0;
                        if ($error_id != 0) {
                            echo "<div class='col-md-5'></div>";
                            echo "<div class='alert alert-danger alert-dismissible fade show col-md-2' style='padding: 4px; font-size: 14px;'><button type='button' class='close' data-dismiss='alert' style='padding: 0px;'>&times;</button><strong>Error: </strong>$errors[$error_id]</div>";
                            echo "<div class='col-md-5'></div>";
                        }

                        // Alert user of successful booking of the suite
                        if (isset($_GET["success"])) {
                            if ((int)$_GET["success"] == 1) {
                                echo "<div class='col-md-5'></div>";
                                echo "<div class='alert alert-success alert-dismissible fade show col-md-2' style='padding: 4px; font-size: 14px;'><button type='button' class='close' data-dismiss='alert' style='padding: 0px;'>&times;</button>Suite successfully added</div>";
                                echo "<div class='col-md-5'></div>";
                            }
                        }

                        ?>
                    </div>
                </form>

            </main>
        </div>
    </div>

    <script src="../../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

    </body>
    </html>
<?php
