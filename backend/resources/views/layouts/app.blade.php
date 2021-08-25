<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div id="wrap" class="d-flex flex-column">
        <!-- Page Heading -->

        @include('layouts.navigation')

        <!-- Page Content -->
        <main class="container-lg flex-grow-1">
            <div class="row align-items-start">
                @include('layouts.sidebar')

                <section class="col-lg-9 p-3">
                    <h1 class="border text-center p-2 mb-3">
                        システム名
                    </h1>

                    {{ $slot }}
                </section>
            </div>
        </main>

    @include('layouts.footer')

    </div>
</body>

</html>
