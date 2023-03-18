<!DOCTYPE html>
<html lang="en" class="dark">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

  <link rel="shortcut icon" href="{{asset('assets/img/favico.png')}}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  @vite('resources/js/app.js')  <!-- Additional CSS Files -->


</head>

<body class="bg-white dark:bg-black">

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  @include('frontend.includes.navbar')
  <!-- ***** Header Area End ***** -->
  @yield('content')

  @include('frontend.includes.footer')


  <!-- Scripts -->
  <script>
      // Burger menus
      document.addEventListener('DOMContentLoaded', function() {
          // open
          const burger = document.querySelectorAll('.navbar-burger');
          const menu = document.querySelectorAll('.navbar-menu');

          if (burger.length && menu.length) {
              for (var i = 0; i < burger.length; i++) {
                  burger[i].addEventListener('click', function() {
                      for (var j = 0; j < menu.length; j++) {
                          menu[j].classList.toggle('hidden');
                      }
                  });
              }
          }

          // close
          const close = document.querySelectorAll('.navbar-close');
          const backdrop = document.querySelectorAll('.navbar-backdrop');

          if (close.length) {
              for (var i = 0; i < close.length; i++) {
                  close[i].addEventListener('click', function() {
                      for (var j = 0; j < menu.length; j++) {
                          menu[j].classList.toggle('hidden');
                      }
                  });
              }
          }

          if (backdrop.length) {
              for (var i = 0; i < backdrop.length; i++) {
                  backdrop[i].addEventListener('click', function() {
                      for (var j = 0; j < menu.length; j++) {
                          menu[j].classList.toggle('hidden');
                      }
                  });
              }
          }
      });
  </script>
  </body>
</html>
