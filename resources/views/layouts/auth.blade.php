<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>THe Heart-Ed Authentication</title>
    <!-- base:css -->
    <link rel="stylesheet" href="/storage/back/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="/storage/back/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/storage/back/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="/storage/back/images/favicon.ico" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-start py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="/storage/back/images/logo-dark.svg" alt="logo">
                            </div>
                            @yield('form')
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="/storage/back/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="/storage/back/js/off-canvas.js"></script>
    <script src="/storage/back/js/hoverable-collapse.js"></script>
    <script src="/storage/back/js/template.js"></script>
    <script src="/storage/back/js/settings.js"></script>
    <script src="/storage/back/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>