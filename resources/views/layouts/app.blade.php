<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>THE HEART-ED | {{ $title }}</title>
    <!-- base:css -->
    <link rel="stylesheet" href="/storage/back/vendors/typicons/typicons.css" />
    <link rel="stylesheet" href="/storage/back/vendors/css/vendor.bundle.base.css" />
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/storage/back/css/style.css" />
    <!-- endinject -->
    <link rel="shortcut icon" href="/storage/back/images/favicon.ico" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
                <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                    <a class="navbar-brand brand-logo" href="/"><b class="text-white">THE HEART-ED</b></a>
                    <a class="navbar-brand brand-logo-mini" href="/"><b class="text-white">THE HEART-ED</b></a>
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="typcn typcn-th-menu"></span>
                    </button>
                </div>
            </div>
            <div class="navbar-menu-wrapper  d-flex align-items-center justify-content-end">
                <ul class="navbar-nav me-lg-2">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                            <img src="/storage/back/images/faces/face5.jpg" alt="profile" />
                            <span class="nav-profile-name">{{Auth()->user()->name}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item">
                                <i class="typcn typcn-cog-outline text-primary"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="typcn typcn-power-outline text-primary"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="POST">
                                <!-- <input type="hidden" name="redirect" value="{{ url()->previous() }}"> -->
                            </form>
                        </div>
                    </li>
                    <li class="nav-item nav-user-status dropdown">
                        <!-- <p class="mb-0">Last login was 23 hours ago.</p> -->
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-date dropdown">
                        <a class="nav-link d-flex justify-content-center align-items-center" href="javascript:;">
                            <h6 class="date mb-0">{{ date('D') }} : <span id="time_span"></span></h6>
                            <script>
                                function updateTime() {
                                    var currentTime = new Date()
                                    var hours = currentTime.getHours()
                                    var minutes = currentTime.getMinutes()
                                    var seconds = currentTime.getSeconds()
                                    if (seconds < 10) {
                                        seconds = "0" + seconds
                                    } if (minutes < 10) {
                                        minutes = "0" + minutes
                                    }
                                    var t_str = hours + ":" + minutes + ":" + seconds + " ";
                                    if (hours > 11) {
                                        t_str += "PM";
                                    } else {
                                        t_str += "AM";
                                    }
                                    document.getElementById('time_span').innerHTML = t_str;
                                }
                                setInterval(updateTime, 1000);
                            </script>
                            <i class="typcn typcn-calendar"></i>{{ date('jS F') }}
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center"
                            id="messageDropdown" href="#" data-bs-toggle="dropdown">
                            <i class="typcn typcn-mail mx-0"></i>
                            <span class="count"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="messageDropdown">
                            <p class="mb-0 fw-normal float-start dropdown-header">
                                Messages
                            </p>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="/storage/back/images/faces/face4.jpg" alt="image" class="profile-pic" />
                                </div>
                                <div class="preview-item-content flex-grow">
                                    <h6 class="preview-subject ellipsis fw-normal">
                                        David Grey
                                    </h6>
                                    <p class="fw-light small-text text-muted mb-0">
                                        The meeting is cancelled
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="/storage/back/images/faces/face2.jpg" alt="image" class="profile-pic" />
                                </div>
                                <div class="preview-item-content flex-grow">
                                    <h6 class="preview-subject ellipsis fw-normal">
                                        Tim Cook
                                    </h6>
                                    <p class="fw-light small-text text-muted mb-0">
                                        New product launch
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="/storage/back/images/faces/face3.jpg" alt="image" class="profile-pic" />
                                </div>
                                <div class="preview-item-content flex-grow">
                                    <h6 class="preview-subject ellipsis fw-normal">
                                        Johnson
                                    </h6>
                                    <p class="fw-light small-text text-muted mb-0">
                                        Upcoming board meeting
                                    </p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown me-0">
                        <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center"
                            id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                            <i class="typcn typcn-bell mx-0"></i>
                            <span class="count"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="notificationDropdown">
                            <p class="mb-0 fw-normal float-start dropdown-header">
                                Notifications
                            </p>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-success">
                                        <i class="typcn typcn-info mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject fw-normal">
                                        Application Error
                                    </h6>
                                    <p class="fw-light small-text mb-0 text-muted">
                                        Just now
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-warning">
                                        <i class="typcn typcn-cog-outline mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject fw-normal">
                                        Settings
                                    </h6>
                                    <p class="fw-light small-text mb-0 text-muted">
                                        Private message
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-info">
                                        <i class="typcn typcn-user mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject fw-normal">
                                        New user registration
                                    </h6>
                                    <p class="fw-light small-text mb-0 text-muted">
                                        2 days ago
                                    </p>
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="typcn typcn-th-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
            <div class="navbar-links-wrapper d-flex align-items-stretch">
                <div class="nav-link">
                    <a href="javascript:;"><i class="typcn typcn-calendar-outline"></i></a>
                </div>
                <div class="nav-link">
                    <a href="javascript:;"><i class="typcn typcn-mail"></i></a>
                </div>
                <div class="nav-link">
                    <a href="javascript:;"><i class="typcn typcn-folder"></i></a>
                </div>
                <div class="nav-link">
                    <a href="javascript:;"><i class="typcn typcn-document-text"></i></a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <ul class="navbar-nav me-lg-2">
                    <li class="nav-item ms-0">
                        <h4 class="mb-0">Dashboard</h4>
                    </li>
                    <li class="nav-item">
                        <div class="d-flex align-items-baseline">
                            <p class="mb-0">Home</p>
                            <i class="typcn typcn-chevron-right"></i>
                            <p class="mb-0">{{ $title }}</p>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-search d-none d-md-block me-0">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search..." aria-label="search"
                                aria-describedby="search" />
                            <div class="input-group-prepend d-flex">
                                <span class="input-group-text" id="search">
                                    <i class="typcn typcn-zoom"></i>
                                </span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">
                            <i class="typcn typcn-device-desktop menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                            <!-- <div class="badge badge-danger">new</div> -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('theme.index') }}">
                            <i class="fa fa-swatchbook menu-icon"></i>
                            <span class="menu-title">Themes</span>
                            <!-- <div class="badge badge-danger">new</div> -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/courses">
                            <i class="bi bi-journals menu-icon"></i>
                            <span class="menu-title">Courses</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/resources">
                            <i class="bi bi-folder2-open menu-icon"></i>
                            <span class="menu-title">Resources</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/my-courses">
                            <i class="bi bi-book-fill menu-icon"></i>
                            <span class="menu-title">My Courses</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/learners">
                            <i class="bi bi-person-video2 menu-icon"></i>
                            <span class="menu-title">Learners</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/instructors">
                            <i class="bi bi-person-workspace menu-icon"></i>
                            <span class="menu-title">Instructors</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> {{ Session::get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- Footer -->
                <footer class="footer">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                <span class="text-dark text-center text-sm-left d-block d-sm-inline-block">Copyright ©
                                    {{ date('Y') }} The Heart-Ed. All rights reserved.</span>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- End Footer -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- base:js -->
    <script src="/storage/back/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="/storage/back/vendors/chart.js/chart.umd.js"></script>
    <script src="/storage/back/js/jquery.cookie.js"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="/storage/back/js/off-canvas.js"></script>
    <script src="/storage/back/js/hoverable-collapse.js"></script>
    <script src="/storage/back/js/template.js"></script>
    <script src="/storage/back/js/settings.js"></script>
    <script src="/storage/back/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="/storage/back/js/dashboard.js"></script>
    <!-- End custom js for this page-->
</body>

</html>