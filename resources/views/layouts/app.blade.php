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
        
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">



 
        @livewireStyles

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    </head>
    <body class="font-sans antialiased">
        <div class="flex flex-col min-h-screen bg-grey-200">

            @livewire('navigation-dropdown')

            <!-- Page Content -->
            <main class="p-4 flex-grow max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                @yield('content')

            </main>
             <footer class="p-4 bg-black">

                @include('layouts.partials._footer')
             </footer>

        </div>

        @stack('modals')
        
        @livewireScripts
        
    </body>
</html>
