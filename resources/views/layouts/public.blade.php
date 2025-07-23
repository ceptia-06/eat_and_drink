<!-- Fichier CORRECT et COMPLET pour: resources/views/layouts/public.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            
            <!-- La barre de navigation professionnelle complète -->
            <nav class="bg-white dark:bg-gray-800 shadow-md sticky top-0 z-50">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-16">
                        
                        <!-- Section Gauche : Logo et Nom du Site -->
                        <div class="flex items-center">
                            <a href="{{ route('home') }}">
                                <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                            </a>
                            <a href="{{ route('exposants.index') }}" class="ml-4 text-lg font-semibold text-gray-700 dark:text-gray-300 hover:text-indigo-600">
                                Nos Exposants
                            </a>
                        </div>

                        <!-- Section Droite : Panier et Connexion -->
                        <div class="flex items-center space-x-6">
                            <a href="{{ route('cart.index') }}" class="relative text-gray-600 dark:text-gray-400 hover:text-indigo-600">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                @if(session('cart') && count(session('cart')) > 0)
                                    <span class="absolute -top-2 -right-2 flex h-5 w-5 items-center justify-center rounded-full bg-red-500 text-xs font-bold text-white">{{ count(session('cart')) }}</span>
                                @endif
                            </a>
                            
                            @guest
                                <a href="{{ route('login') }}" class="text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900">Se connecter</a>
                                <a href="{{ route('register') }}" class="hidden sm:inline-block ml-4 px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700">S'inscrire</a>
                            @endguest
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Contenu Principal -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>