<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('servers/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('servers/dist/css/adminlte.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        @include('partial.servers.navbar')

        @include('partial.servers.sidebar')

        <div class="content-wrapper">
            @yield('content')
        </div>

        @include('partial.servers.footer')

    </div>

    <!-- REQUIRED SCRIPTS -->
    <script src="{{ asset('servers/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('servers/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('servers/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
