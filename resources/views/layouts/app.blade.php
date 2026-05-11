<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
          rel="stylesheet" />

    {{-- AOS --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans bg-gray-50 text-gray-800 antialiased overflow-x-hidden">

    <div class="min-h-screen flex flex-col">

        {{-- Navbar --}}
        @include('components.navbar')

        {{-- Banner --}}
        @include('components.banner')

        {{-- Trust Section --}}
        @include('components.trust-sec')

        {{-- How It Works --}}
        @include('components.how-it-works')

        {{--preview--}}
        @include('components.preview-sect')

        {{-- CTA --}}
        @include('components.cta')
        
        {{-- Main Content --}}
        <main class="flex-1 w-full">

            @yield('content')

        </main>

        {{-- Footer --}}
        @include('components.footer')

    </div>

    {{-- AOS --}}
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            AOS.init({
                once: true,
                easing: 'ease-out-cubic',
                offset: 50
            });

        });
    </script>

</body>

</html>