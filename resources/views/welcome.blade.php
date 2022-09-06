<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>EnglishTest</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400&display=swap" rel="stylesheet">
        <!-- Bootstrap Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <style>
            body {
                font-family: 'Ubuntu', sans-serif;
            }
        </style>
    </head>

    <body class="antialiased">
        <div style="width: 100vw; height:100vh; background-color: rgba(150, 208, 231, 0.87);" class="container-fluid d-flex justify-content-center align-items-center flex-column">

            <h1 style="margin-bottom: 3rem;">Welcome to the EnglishTest v1.0</h1>

            <div style="width: 50%; height:30%" class="border container d-flex justify-content-evenly align-items-center text-uppercase ">
                <a style="font-size: 4rem" href="{{ route('login') }}" class="text-decoration-none">{{ __('Login') }}</a>
                <a style="font-size: 4rem" href="{{ route('register') }}" class="text-decoration-none">{{ __('Register') }}</a>
            </div>

        </div>
    </body>
</html>
