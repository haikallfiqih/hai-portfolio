<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="text" href="{{ asset('img/👋.png') }}" />


        <title>Hai - @yield('title')</title>


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
          <!-- Bootstrap CSS -->
          <link rel="stylesheet" href="css/bootstrap.css">
          <link rel="stylesheet" href="vendors/linericon/style.css">
          <link rel="stylesheet" href="css/font-awesome.min.css">
          <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
          <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
          <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
          <link rel="stylesheet" href="vendors/animate-css/animate.css">
          <link rel="stylesheet" href="vendors/popup/magnific-popup.css">
          <link rel="stylesheet" href="vendors/flaticon/flaticon.css">
          <!-- main css -->
          <link rel="stylesheet" href="css/style.css">
          <link rel="stylesheet" href="css/responsive.css">

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <main>
                @yield('content')
            </main>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="vendors/popup/jquery.magnific-popup.min.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendors/counter-up/jquery.counterup.min.js"></script>
        <script src="js/mail-script.js"></script>
        <script src="js/theme.js"></script>
    </body>
</html>
