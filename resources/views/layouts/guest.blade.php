<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Vedic Collections') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                position: relative;
                background: url('https://img.freepik.com/premium-photo/white-background-with-row-orange-yellow-candles-flowers_230068-42608.jpg?semt=ais_hybrid') no-repeat center center fixed;
                background-size: cover;
                font-family: 'Nunito', sans-serif;
                z-index: 1;
                min-height: 100vh;
            }

            body::before {
                content: '';
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5); /* Dark overlay */
                z-index: -1;
            }

            .login-card {
                background-color: white;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                z-index: 2;
            }

            .brand-title {
                color: #fff; /* Keeps text white over dark overlay */
            }
        </style>
    </head>
    <body>
        <div class="min-h-screen d-flex flex-column justify-content-center align-items-center pt-5">
            <div>
                <a href="/">
                    <h1 class="brand-title fw-bold fs-1">🪔 Vedic Collections</h1>
                </a>
            </div>

            <div class="w-100 mt-4 px-4 py-3 login-card shadow-sm overflow-hidden sm:rounded-lg" style="max-width: 400px;">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
