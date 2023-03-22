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
    <body class="font-sans antialiased">
        <div class=" flex justify-between box-border" x-data="{isOpen:true}">
            <div class="sidebar bg-gray-800 text-white h-screen transition-all duration 300 overflow-y-auto" :class="isOpen ? 'w-48':'w-0'">
                <div class=" p-2 flex justify-end">

                </div>
                
                <!-- Navigation -->
                @include('layouts.sidebar') <!-- chamando o sidebar -->

            </div>
            <div class="w-full h-screen transition-all duration-300 overflow-y-hidden">
                <div class="flex justify-start p-2 w-full">
                    <button class="p-2" @click.prevent="isOpen = ! isOpen" >
                        <svg viewBox="0 0 20 20" class="w-6 h-6 fill-current text-gray-500" >
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0
                        011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            <div class="p-4 overflow-y-auto h-full">
                <section class="py-5 border-b2" id="introduction">
                    <h2 class="text-2x1 font-bold my-1">Seção de intro</h2>
                    <p>
                        asdasdasdas
                    </p>
                </section>
            </div>
        </div>
        </div>
    </body>
</html>
