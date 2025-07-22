{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title> {{-- Atau gunakan @yield('title', config('app.name', 'Laravel')) jika ingin judul dinamis --}}

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100"> {{-- Hanya satu div ini --}}
            @include('layouts.partials.navigation') {{-- Navbar Anda --}}

            <main> {{-- Hanya satu tag main ini --}}
                {{ $slot ?? '' }} {{-- Untuk Livewire/Anonymous Components --}}
                @yield('content') {{-- Untuk konten halaman seperti welcome.blade.php --}}
            </main>
        </div>
    </body>
</html>