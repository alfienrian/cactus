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
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased h-screen lg:flex">
    {{-- Form slot --}}
        <section class="bg-black p-10 w-full h-full lg:w-1/2 overflow-auto">
          @yield('form')
        </section>

    {{-- Login Illustration Section --}}
    <section class="bg-light-green w-full hidden lg:block relative overflow-hidden">
         <div class="text-center mx-auto max-w-[65%] mt-8 mb-12">
        <h1 class="text-5xl font-bold mb-4">@yield('title')</h1>
        <h3 class="text-2xl font-semibold">
          @yield('description')
        </h3>
      </div>
      <div class="flex items-center justify-center">
        <img
          src="/img/login-illustration.svg"
          alt="Login illustration"
          class="w-[420px]"
        />
        <img class="w-[220px] absolute right-0 bottom-0" src="/img/leaf.svg" alt="leafs" />
      </div>
    </section>
    </body>
</html>
