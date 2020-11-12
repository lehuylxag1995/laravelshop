<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập tài khoản quản trị</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('servers/login/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('servers/login/css/style.css') }}">
</head>
<body>

    <div class="main">
        @yield('content')
    </div>

    <!-- JS -->
    <script src="{{ asset('servers/login/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('servers/login/js/main.js') }}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
