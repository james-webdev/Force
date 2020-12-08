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
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            <!-- NavBar -->
<header class="fixed-top bg-grey-300 text-teal-300 shadow-md  z-50 w-full px-5 py-2 flex justify-between items-center">
    

<nav class="relative flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg mb-3">
  <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
    <div class="w-full relative flex justify-between lg:w-auto  px-4 lg:static lg:block lg:justify-start">
      <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-no-wrap uppercase text-white" href="#pablo">
        OKOS Force
      </a>
      <button class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none" type="button">
        <span class="block relative w-6 h-px rounded-sm bg-white"></span>
        <span class="block relative w-6 h-px rounded-sm bg-white mt-1"></span>
        <span class="block relative w-6 h-px rounded-sm bg-white mt-1"></span>
      </button>
    </div>
    <div class="lg:flex flex-grow items-center" id="example-navbar-warning">
      <ul class="flex flex-col lg:flex-row list-none ml-auto">
          <li class="nav-item">
            <a class="px-3 py-2 flex items-center text-xs uppercase text-teal-500 font-bold leading-snug text-white hover:opacity-75" href="{{route('account.index')}}">
              Accounts
            </a>
          </li>
          <li class="nav-item">
            <a class="px-3 py-2 flex items-center  text-teal-500 text-xs uppercase font-bold text-teal-500 leading-snug text-white hover:opacity-75" href="{{route('contact.index')}}">
              Contacts
            </a>
          </li>
          <li class="nav-item">
            <a class="px-3 py-2 flex items-center text-teal-500 text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="{{route('activity.index')}}">
              Activities
            </a>
          </li>
          <li class="nav-item">
            <a class="px-3 py-2 flex items-center  text-teal-500 text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="{{route('opportunity.index')}}">
              Opportunities
            </a>
          </li>
      </ul>
    </div>
  </div>
</nav>
</header>


            <div class="m-8">
                @yield('content')
            </div>
        </div>
    </body>
    @livewireScripts
</html>
