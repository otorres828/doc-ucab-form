<!DOCTYPE html>
<html lang="es " class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet">    
    <title>@yield('title')</title>
    <!-- Styles -->
     @livewireStyles
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('css')
</head>
<body >
    @livewire('navigation-menu')

    @yield('main')
    @yield('js')
    @livewireScripts
</body>
</html>