<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('bootstrap/dist/assets/favicon.ico') }}">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('bootstrap/dist/css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <!-- NAVBAR-->
    @include('blogs.includes.navbar')

    <!-- HEADER-->
    @include('blogs.includes.header')

    <!-- Main Content -->
    <div class="container">
        @yield('content')
    </div>
        
    </div>

    <!-- Pagination -->
    @include('blogs.includes.pagination')

    <!-- FOOTER -->
    @include('blogs.includes.footer')

    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS -->
    <script src="{{ asset('bootstrap/dist/js/scripts.js') }}"></script>
</body>
</html>
