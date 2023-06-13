<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <@yield('title') - {{ config('app.name') }}</title>

            <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
            <link rel="stylesheet" href="{{ asset('css/feather.css') }}">

            <!-- CSS Files -->
            <link href="{{ asset('assets') }}/css/material-dashboard.min.css?v=2.1.0" rel="stylesheet" />
            <!-- Favicon icon -->
            <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
            <!-- Custom Stylesheet -->
            <link rel="stylesheet" href="{{ asset('css/style.css') }}">
            <link rel="stylesheet" type="text/css"
                href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">



</head>

<body class="color-theme-blue">


    @yield('content')



    <script src="{{ asset('js/plugin.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}'"></script>

</body>

</html>
