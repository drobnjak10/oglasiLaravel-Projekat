<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KupujemProdajem</title>
    <link rel="stylesheet" href="/css/app.css">
    <style>
        img {
            width: 150px;
            height: 200px
        }
    </style>
</head>
<body>
    @include('layouts/partials/navbar')
    <div class="container-fluid">
        @yield('main')
    </div>
    @include('flashMsg');

    @yield('scripts')
</body>
</html>

