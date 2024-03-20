<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">

    <!--Page Title-->
    <title>HyKids Apparel</title>

    <!--Meta Keywords and Description-->
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />

    <!--Favicon-->
    <link rel="shortcut icon" href="{{ asset('assets/landing/images/favicon.ico') }}" title="Favicon" />
    @include('guest.layouts.style')
    @stack('css-internal')
</head>

<body>

    <!-- Preloader -->
    <div id="preloader">
        <div id="status" class="la-ball-triangle-path">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!--End of Preloader-->

    <div class="page-border" data-wow-duration="0.7s" data-wow-delay="0.2s">
        <div class="top-border wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"></div>
        <div class="right-border wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">
        </div>
        <div class="bottom-border wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;"></div>
        <div class="left-border wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;"></div>
    </div>

    <div id="wrapper">

        @include('guest.layouts.header')

        <!--Main Content Area-->
        <main id="content">
            @yield('content')
        </main>
        <!--End Main Content Area-->


        <!--Footer-->
        @include('guest.layouts.footer')
        <!--End of Footer-->

    </div>

    @include('guest.layouts.script')
    @stack('js-internal')
</body>

</html>
