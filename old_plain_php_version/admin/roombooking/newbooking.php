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
    <title>Admin:New Booking - Sierra Hotels</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../external/intl-tel-input/css/intlTelInput.css">
    <!-- International telephone input -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <!-- Our custom template adjustments -->
    <link href="../../css/admin_template.css" rel="stylesheet">
    <style>
        /*.btn-outline-warning:hover {*/
        /*    color: white;*/
        /*}*/

        .dull-underline {
            text-decoration: underline;
            text-decoration-skip: edges;
            text-decoration-color: #969fa7;
        }

        /* Page specific styles */
        /* Style for the bootstrap 4 tooltip */
        .tooltip-inner {
            background-color: #6C757D;
        }

        .tooltip.bs-tooltip-right .arrow:before {
            border-bottom-color: #6C757D !important;
        }

        .tooltip.bs-tooltip-left .arrow:before {
            border-bottom-color: #6C757D !important;
        }

        .tooltip.bs-tooltip-bottom .arrow:before {
            border-bottom-color: #6C757D !important;
        }

        .tooltip.bs-tooltip-top .arrow:before {
            border-bottom-color: #6C757D !important;
        }

        /* Styles required for the intl-tel-input flags to be visible */
        .iti-flag {
            background-image: url("../../external/intl-tel-input/img/flags.png");
        }

        @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
            .iti-flag {
                background-image: url("../../external/intl-tel-input/img/flags@2x.png");
            }
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
                <h1 class="h2">Suite booking</h1>
            </div>
            <p>
                <a class="btn btn-outline-secondary" href="../../admin/reservation.php">< Back</a>
            </p>
            <p class="dull-underline">Enter customer details: </p>
            <p>
            <form name="newbooking" method="post" action="./process_newbooking.php">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputFirstName">First name</label>
                        <input type="text" class="form-control" id="inputFirstName" placeholder="Firstname"
                               name="customerfirstname" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputLastName">Last name</label>
                        <input type="text" class="form-control" id="inputLastName" placeholder="Lastname"
                               name="customerlastname" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-10">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="example@example.com"
                               name="customeremail" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputPhone">Phone no.</label><br>
                        <input type="tel" class="form-control" id="inputPhone" name="customertel" required>
                        <!-- International Telephone Input using: https://github.com/jackocnr/intl-tel-input -->
                        <script src="../../external/intl-tel-input/js/intlTelInput.js"></script>
                        <script>
                            var input = document.querySelector("#inputPhone");
                            window.intlTelInput(input, {
                                // Default the country to India
                                initialCountry: "IN",
                                utilsScript: "../../external/intl-tel-input/js/utils.js"
                            });
                        </script>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St"
                           name="customeraddress" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="countryId">Country</label>
                        <input type="text" class="form-control" id="countryId" placeholder="Country"
                               name="customercountry" required>

                    </div>
                    <div class="form-group col-md-4">
                        <label for="stateId">State</label>
                        <input type="text" class="form-control" id="stateId" placeholder="State" name="customerstate"
                               required>

                    </div>
                    <div class="form-group col-md-2">
                        <label for="cityId">City</label>
                        <input type="text" class="form-control" id="cityId" placeholder="City" name="customercity"
                               required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="roomType">Suite type</label>
                        <select id="roomType" name="roomtype" class="form-control" required>
                            <option value="Sierra Cozy" selected>Sierra Cozy</option>
                            <option value="Sierra Cozy XL">Sierra Cozy XL</option>
                            <option value="Sierra Grand">Sierra Grand</option>
                            <option value="Sierra Sea View">Sierra Sea View</option>
                            <option value="Sierra Maharaja">Sierra Maharaja</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="fromDate">Check-in</label>
                        <input type="date" class="form-control" id="fromDate" name="fromDate" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="toDate">Check-out</label>
                        <input type="date" class="form-control" id="toDate" name="toDate" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="numofguests">No. of guests</label>
                        <select id="numofguests" name="numofguests" class="form-control" required>
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <?php

                    // Login error data
                    $errors = array(
                        1 => "Database connectivity error",
                        2 => "Suite type unavailable"
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
                            echo "<div class='alert alert-success alert-dismissible fade show col-md-2' style='padding: 4px; font-size: 14px;'><button type='button' class='close' data-dismiss='alert' style='padding: 0px;'>&times;</button>Suite successfully booked</div>";
                            echo "<div class='col-md-5'></div>";
                        }
                    }

                    ?>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2"></div>
                    <div class="form-group col-md-2"></div>
                    <div class="form-group col-md-2 text-center">
                        <button type="submit" class="btn btn-outline-secondary btn-lg">Book</button>
                    </div>
                    <div class="form-group col-md-2 text-center">
                        <button type="reset" class="btn btn-outline-danger btn-lg">Reset</button>
                    </div>
                    <div class="form-group col-md-2"></div>
                    <div class="form-group col-md-2"></div>
                </div>
            </form>
            </p>
        </main>
    </div>
</div>


<script src="../../js/jquery-3.3.1.slim.min.js"></script>
<script src="../../js/popper.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>

<!-- This will fill the #fromDate field with today's date -->
<script>
    var today = new Date();
    var dd = ("0" + (today.getDate())).slice(-2);
    var mm = ("0" + (today.getMonth() + 1)).slice(-2);
    var yyyy = today.getFullYear();
    today = yyyy + '-' + mm + '-' + dd;
    $("#fromDate").attr("value", today);
</script>

<!-- This is for the Popover message for no. of guest limit (<select>) -->
<script>
    $('#numofguests').tooltip({
        title: "<b>Guest limit: 4 per suite</b><br>This limit is non-negotiable.",
        html: true,
        placement: "bottom",
        animation: true
    });
</script>

</body>
</html>
