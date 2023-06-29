<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kantin IBIK</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ url('./assets/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('./assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('./assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('./assets/css/mystyle.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>

    @yield('content')

    <script>
        var hostUrl = "./assets/";
    </script>
    <script src="{{ url('./assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ url('./assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ url('./assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ url('./assets/js/custom/widgets.js') }}"></script>
</body>
</html>
