<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('build/assets/app-ab22f6b7.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/style.min-04f119d7.css') }}">
    <script src="{{ asset('build/assets/app-ddee773b.js') }}"></script>


    <!-- Styles -->
    @livewireStyles
</head>

<body>
    <div class="main-wrapper">
        {{ $slot }}
    </div>

    @livewireScripts
</body>

</html>