{{--
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

  <!-- Scripts -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav me-auto">

          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
            @if (Route::has('login'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @endif

            @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
              </a>

              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
            </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>

    <main class="py-4">
      @yield('content')
    </main>
  </div>
</body>

</html> --}}

@props(['breadcrumbs' => []])

<!DOCTYPE html>
<html lang="en" class="minimal-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('assets/admin/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/admin/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}"
        rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/assets/css/bootstrap-extended.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/assets/css/icons.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- loader-->
    <link href="{{ asset('assets/admin/assets/css/pace.min.css') }}" rel="stylesheet" />

    <!--Theme Styles-->
    <link href="{{ asset('assets/admin/assets/css/dark-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/assets/css/light-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/assets/css/semi-dark.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/assets/css/header-colors.css') }}" rel="stylesheet" />

    <title>Admin Dashboard</title>
</head>

<body>

    <!--start wrapper-->
    <div class="wrapper">

        <!--start top header-->
        @include('layouts.partials.admin.header')
        <!--end top header-->

        <!--start sidebar -->
        @include('layouts.partials.admin.sidebar')
        <!--end sidebar -->

        <!--start content-->
        <main class="page-content">

          @include('layouts.partials.admin.breadcrumb')

            {{ $slot }}

        </main>
        <!--end page main-->

        <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

        <!--start switcher-->
        @include('layouts.partials.admin.switcher-theme')
        <!--end switcher-->

    </div>
    <!--end wrapper-->

    <!-- Bootstrap bundle JS -->
    <script src="{{ asset('assets/admin/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('assets/admin/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/plugins/easyPieChart/jquery.easypiechart.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/js/pace.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <!--app-->
    <script src="{{ asset('assets/admin/assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/js/index.js') }}"></script>

    <script>
        new PerfectScrollbar(".best-product");
        new PerfectScrollbar(".top-sellers-list");
    </script>


</body>

</html>
