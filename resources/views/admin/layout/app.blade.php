<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="2D 3D Admin">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="justsaimain">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Dashboard | @yield('title')</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/font-awesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/perfectscroll/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/DataTables/datatables.min.css') }}" rel="stylesheet">

    <!-- Theme Styles -->
    <link href="{{ asset('assets/css/main.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dark-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <div class='loader'>
        <div class='spinner-grow text-primary' role='status'>
            <span class='sr-only'>Loading...</span>
        </div>
    </div>

    <div class="page-container">
        <div class="page-header">
            <nav class="navbar navbar-expand-lg d-flex justify-content-between">
                <div class="" id="navbarNav">
                    <ul class="navbar-nav" id="leftNav">
                        <li class="nav-item">
                            <a class="nav-link" id="sidebar-toggle" href="#"><i data-feather="arrow-left"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Help</a>
                        </li>
                    </ul>
                </div>
                <div class="logo">
                    <a class="navbar-brand" href="index.html"></a>
                </div>
                <div class="" id="headerNav">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link search-dropdown" href="#" id="searchDropDown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false"><i data-feather="search"></i></a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-lg search-drop-menu"
                                aria-labelledby="searchDropDown">
                                <form>
                                    <input class="form-control" type="text" placeholder="Type something.."
                                        aria-label="Search">
                                </form>
                                <h6 class="dropdown-header">Recent Searches</h6>
                                <a class="dropdown-item" href="#">charts</a>
                                <a class="dropdown-item" href="#">new orders</a>
                                <a class="dropdown-item" href="#">file manager</a>
                                <a class="dropdown-item" href="#">new users</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link notifications-dropdown" href="#" id="notificationsDropDown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">3</a>
                            <div class="dropdown-menu dropdown-menu-end notif-drop-menu"
                                aria-labelledby="notificationsDropDown">
                                <h6 class="dropdown-header">Notifications</h6>
                                <a href="#">
                                    <div class="header-notif">
                                        <div class="notif-image">
                                            <span class="notification-badge bg-info text-white">
                                                <i class="fas fa-bullhorn"></i>
                                            </span>
                                        </div>
                                        <div class="notif-text">
                                            <p class="bold-notif-text">faucibus dolor in commodo lectus mattis</p>
                                            <small>19:00</small>
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="header-notif">
                                        <div class="notif-image">
                                            <span class="notification-badge bg-primary text-white">
                                                <i class="fas fa-bolt"></i>
                                            </span>
                                        </div>
                                        <div class="notif-text">
                                            <p class="bold-notif-text">faucibus dolor in commodo lectus mattis</p>
                                            <small>18:00</small>
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="header-notif">
                                        <div class="notif-image">
                                            <span class="notification-badge bg-success text-white">
                                                <i class="fas fa-at"></i>
                                            </span>
                                        </div>
                                        <div class="notif-text">
                                            <p>faucibus dolor in commodo lectus mattis</p>
                                            <small>yesterday</small>
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="header-notif">
                                        <div class="notif-image">
                                            <span class="notification-badge">
                                                <img src="../../assets/images/avatars/profile-image.png" alt="">
                                            </span>
                                        </div>
                                        <div class="notif-text">
                                            <p>faucibus dolor in commodo lectus mattis</p>
                                            <small>yesterday</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                            @csrf
                        </form>
                        <li class="nav-item dropdown">
                            <a class="nav-link profile-dropdown" href="#" id="profileDropDown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false"><img
                                    src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                                    style="border-radius: 100%" alt=""></a>
                            <div class="dropdown-menu dropdown-menu-end profile-drop-menu"
                                aria-labelledby="profileDropDown">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i>Profile</a>
                                <a class="dropdown-item" href="#"><i data-feather="inbox"></i>Messages</a>
                                <a class="dropdown-item" href="#"><i data-feather="edit"></i>Activities<span
                                        class="badge rounded-pill bg-success">12</span></a>
                                <a class="dropdown-item" href="#"><i data-feather="check-circle"></i>Tasks</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i>Settings</a>
                                <a class="dropdown-item" href="#"><i data-feather="unlock"></i>Lock</a>
                                <a class="dropdown-item" href="javascript:$('#logoutForm').submit();"><i
                                        data-feather="log-out"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="page-sidebar">
            <ul class="list-unstyled accordion-menu">
                <li class="sidebar-title">
                    Main
                </li>
                <li class="@yield('nav-dashboard')">
                    <a href="{{ route('admin.dashboard') }}"><i data-feather="home"></i>Dashboard</a>
                </li>
                <li class="@yield('nav-users')">
                    <a href="{{ route('admin.users.index') }}"><i data-feather="users"></i>Users</a>
                </li>
                <li class="sidebar-title">
                    Other
                </li>
                <li class="">
                    <a href="index.html" class="active"><i data-feather="star"></i>Pages<i
                            class="fas fa-chevron-right dropdown-icon"></i></a>
                    <ul class="">
                        <li><a href="invoice.html"><i class="far fa-circle"></i>Invoice</a></li>
                        <li><a href="404.html"><i class="far fa-circle"></i>404 Page</a></li>
                        <li><a href="500.html"><i class="far fa-circle"></i>500 Page</a></li>
                        <li><a href="blank-page.html" class="active"><i class="far fa-circle"></i>Blank
                                Page</a></li>
                        <li><a href="login.html"><i class="far fa-circle"></i>Login</a></li>
                        <li><a href="register.html"><i class="far fa-circle"></i>Register</a></li>
                        <li><a href="lockscreen.html"><i class="far fa-circle"></i>Lockscreen</a></li>
                        <li><a href="price.html"><i class="far fa-circle"></i>Price</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i data-feather="check-circle"></i>Documentation</a>
                </li>
            </ul>
        </div>
        <div class="page-content">
            <div class="main-wrapper">
                @yield('content')
            </div>

        </div>

    </div>

    <!-- Javascripts -->
    <script src="{{ asset('assets/plugins/jquery/jquery-3.4.1.min.js') }}"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="{{ asset('assets/plugins/perfectscroll/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/DataTables/datatables.min.js') }}"></script>

    <script src="{{ asset('assets/js/main.min.js') }}"></script>


    <script>
        $(function($) {
            $.extend(true, $.fn.dataTable.defaults, {
                mark: true,
                processing: true,
                serverSide: true,
                responsive: true,
                language: {
                    "paginate": {
                        "previous": "<i class='far fa-arrow-alt-circle-left'></i>",
                        "next": "<i class='far fa-arrow-alt-circle-right'></i>"
                    },
                },
            });
        })
    </script>

    @yield('script')
</body>

</html>
