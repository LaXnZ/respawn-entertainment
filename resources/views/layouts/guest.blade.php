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
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100" style="background-image: url('assets/images/bg.jpg'); background-size: cover;">
            <!-- back button that in top left side -->
           

            
            <div class="absolute top-20 left-20 mt-4 ml-4">
               
                <button type="button" class="bg-gray-800 text-white font-semibold rounded border-r border-gray-100 py-2 hover:bg-orange-700 hover:text-white px-3">
                    <a href="/">Back</a>
                  </button>
            </div>
            <div class="self-center">
               
                <a href="/">
                    <img class="h-auto w-24 self-center sm:justify-center items-center" alt="logo" src="assets/images/logo_no_context.png"  />
                </a>
            </div>

            <div class="w-96 sm:max-w-md mt-6 px-6 py-4  bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
     
    </div>
    </body>
</html>
