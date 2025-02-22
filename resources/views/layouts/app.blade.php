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
        @filamentStyles
        <wireui:scripts/>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans antialiased ">
        <div class="min-h-screen bg-gray-100 flex flex-col">
            <livewire:layout.navigation />
            <div>
                
            <!-- Page Content -->
            <main class="flex flex-row gap-2 px-2 items-start  py-2">
                <livewire:dash-board-menu/>
                {{ $slot }}
            </main>
            </div>

            <!-- Page Heading -->
            
        </div>
        @filamentScripts
    </body>
</html>
