<!-- Fichier : resources/views/layouts/app.blade.php -->
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
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            
            <!-- Inclusion de la barre de navigation du haut (on garde celle de Breeze) -->
            @include('layouts.navigation')

            <!-- Page Content -->
            <div class="flex">
                <!-- 1. Colonne de Gauche : Notre nouveau Menu Latéral -->
                <aside class="w-64 bg-white dark:bg-gray-800 shadow-md hidden sm:block">
                    <div class="p-6">
                        @include('layouts.sidebar') {{-- On inclut le menu ici --}}
                    </div>
                </aside>

                <!-- 2. Colonne de Droite : Le Contenu Principal de la page -->
                <main class="flex-1 p-6 lg:p-8">
                    
                    <!-- Page Heading -->
                    @if (isset($header))
                        <header class="mb-6">
                            <div class="max-w-7xl mx-auto">
                                {{ $header }}
                            </div>
                        </header>
                    @endif

                    {{ $slot }}

                </main>
            </div>
        </div>
    </body>
</html>