<!DOCTYPE html>
<html lang="en">
    <base href="/">
    <head>
        <meta charset="utf-8">
        <title>Project Dashboard | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
        <meta content="Coderthemes" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="admin/assets/images/favicon.ico">
        
        <!-- App css -->
        <link href="admin/assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <link href="admin/assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
        <link href="admin/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">
    <!-- Toastr -->
            <link href="admin/assets/css/toastr.min.css" rel="stylesheet" type="text/css">
    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            @include('admin.layout.sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    @include('admin.layout.nav')
                    <!-- end Topbar -->

                    <!-- Start Content-->
                    @yield('content')

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> © Hyper - Coderthemes.com
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end footer-links d-none d-md-block">
                                    <a href="javascript: void(0);">About</a>
                                    <a href="javascript: void(0);">Support</a>
                                    <a href="javascript: void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- bundle -->
        <script src="admin/assets/js/vendor.min.js"></script>
        <script src="admin/assets/js/app.min.js"></script>
        <script src="admin/assets/js/toastr.min.js"></script>
        <!-- third party js -->
        <script src="admin/assets/js/vendor/Chart.bundle.min.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="admin/assets/js/pages/demo.dashboard-projects.js"></script>
        <!-- end demo js-->
        
        <script>
            @if (Session::has('success'))
                toastr.success("{{ Session::get('success') }}")
                
            @endif
    
            @if (Session::has('info'))
                toastr.info("{{ Session::get('info') }}")
            @endif
    
            @if (Session::has('error'))
                toastr.error("{{ Session::get('error') }}")
            @endif
        </script>
    </body>
</html>
