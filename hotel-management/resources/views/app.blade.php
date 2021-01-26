<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A hotel management web application">
    <meta name="author" content="Ashish Harish Shetty">
    <title>Sierra Hotels - Management</title>
    <!-- Favicons -->
    <link rel="icon" href="/favicon.ico">

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">

    <!-- My CSS -->
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">

    <script defer src="{{ URL::asset('js/fontawesome/all.min.js') }}" ></script>
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">
            <i class="fas fa-hotel fa-lg"></i>
            Sierra Hotels
        </a>

        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="#">
                    <b>Sign out</b>
                    <i class="fas fa-sign-out-alt fa-lg"></i>
                </a>
            </li>
        </ul>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse shadow">
                <div class="position-fixed pt-3">
                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <span>
                                    <i class="fas fa-chart-line fa-sm"></i>
                                </span>
                                Dashboard
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span>
                                    <i class="fas fa-calendar-check fa-sm"></i>
                                </span>
                                Bookings
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="shopping-cart">
                                    <i class="fas fa-person-booth fa-xs"></i>
                                </span>
                                Booked Rooms
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="users">
                                    <i class="fas fa-chess-rook fa-sm"></i>
                                </span>
                                Booked Halls
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="bar-chart-2">
                                    <i class="fas fa-users fa-xs"></i>
                                </span>
                                Guests
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="layers">
                                    <i class="fas fa-utensils fa-sm"></i>
                                </span>
                                Food
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="layers">
                                    <i class="fas fa-clipboard fa-sm"></i>
                                </span>
                                Expenses
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="layers">
                                    <i class="fas fa-wallet fa-sm"></i>
                                </span>
                                Payments
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="layers">
                                    <i class="fas fa-file-invoice-dollar fa-sm"></i>
                                </span>
                                Invoices
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="layers">
                                    <i class="fas fa-briefcase fa-xs"></i>
                                </span>
                                Employees
                            </a>
                        </li>

                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span class="nav-separator">Hotel Configuration</span>
                        <a class="link-secondary" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text">
                                    <i class="fas fa-building fa-sm"></i>
                                </span>
                                Room Types
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text">
                                    <i class="fas fa-chess-rook fa-sm"></i>
                                </span>
                                Rooms
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text">
                                    <i class="fas fa-building fa-sm"></i>
                                </span>
                                Hall Types
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text">
                                    <i class="fas fa-chess-rook fa-sm"></i>
                                </span>
                                Halls
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text">
                                    <i class="fas fa-hamburger fa-sm"></i>
                                </span>
                                Food Menu
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text">
                                    <i class="fas fa-book fa-sm"></i>
                                </span>
                                Paid Services
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text">
                                    <i class="fas fa-user-circle fa-sm"></i>
                                </span>
                                Users
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            This week
                        </button>
                    </div>
                </div>

                <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

                <h2>Section title</h2>

            </main>

        </div>
    </div>

    <script src="{{ URL::asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('js/app.js') }}" type="text/javascript"></script>
</body>

</html>
