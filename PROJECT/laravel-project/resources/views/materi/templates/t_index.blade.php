<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PW-IBIK</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        html,body {overflow-x: hidden;}
        body {padding-top: 56px;}
        .bg-purple {background-color: #6f42c1;}
    </style>
</head>

<body class="bg-body-tertiary">
    <header>
        @extends('templates.headers.navigation')
    </header>

    <main class="container">
        @yield('content')
    </main>
</body>
</html>
