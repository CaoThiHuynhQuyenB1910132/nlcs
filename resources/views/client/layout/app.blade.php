<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
    <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="front_end/fonts/icomoon/style.css">

    <link rel="stylesheet" href="front_end/css/bootstrap.min.css">
    <link rel="stylesheet" href="front_end/css/magnific-popup.css">
    <link rel="stylesheet" href="front_end/css/jquery-ui.css">
    <link rel="stylesheet" href="front_end/css/owl.carousel.min.css">
    <link rel="stylesheet" href="front_end/css/owl.theme.default.min.css">


    <link rel="stylesheet" href="front_end/css/aos.css">

    <link rel="stylesheet" href="front_end/css/style.css">

</head>

<body>

    <div class="site-wrap">
        <header class="site-navbar" role="banner">
            {{-- header --}}
            @include('client.layout.header')

            {{-- nav --}}
            @include('client.layout.nav')
        </header>

        @yield('content')

        @include('client.layout.footer')
    </div>

    <script src="front_end/js/jquery-3.3.1.min.js"></script>
    <script src="front_end/js/jquery-ui.js"></script>
    <script src="front_end/js/popper.min.js"></script>
    <script src="front_end/js/bootstrap.min.js"></script>
    <script src="front_end/js/owl.carousel.min.js"></script>
    <script src="front_end/js/jquery.magnific-popup.min.js"></script>
    <script src="front_end/js/aos.js"></script>

    <script src="front_end/js/main.js"></script>
    @yield('scripts')
</body>

</html>
