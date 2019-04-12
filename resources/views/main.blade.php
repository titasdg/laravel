
<!doctype html>
<html lang="en">
  <head>
    <title>Colorlib Wordify &mdash; Minimal Blog Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">

    <link rel="stylesheet" href="{!!asset('css/bootstrap.css')!!}">
    <link rel="stylesheet" href="{!!asset('css/animate.css')!!}">
    <link rel="stylesheet" href="{!!asset('css/owl.carousel.min.css')!!}">

    <link rel="stylesheet" href="{!!asset('fonts/ionicons/css/ionicons.min.css')!!}">
    <link rel="stylesheet" href="{!!asset('fonts/fontawesome/css/font-awesome.min.css')!!}">
    <link rel="stylesheet" href="{!!asset('fonts/flaticon/font/flaticon.css')!!}">

    <!-- Theme Style -->
    <link rel="stylesheet" href="{!!asset('css/style.css')!!}">
  </head>
  <body>
    

    <div class="wrap">

      @include('partials/header')
   
      <!-- END section -->
      <section class="site-section py-sm">
    <div class="container">
       
    @yield('content')
 
    </div>
     @include('partials/side')

      </section>
            <!-- END main-content -->

       
        @include('partials/footer')
    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

    <script src="{!!asset('js/jquery-3.2.1.min.js')!!}"></script>
    <script src="{!!asset('js/jquery-migrate-3.0.0.js')!!}"></script>
    <script src="{!!asset('js/popper.min.js')!!}"></script>
    <script src="{!!asset('js/bootstrap.min.js')!!}"></script>
    <script src="{!!asset('js/owl.carousel.min.js')!!}"></script>
    <script src="{!!asset('js/jquery.waypoints.min.js')!!}"></script>
    <script src="{!!asset('js/jquery.stellar.min.js')!!}"></script>

    
    <script src="{!!asset('js/main.js')!!}"></script>
  </body>
</html>