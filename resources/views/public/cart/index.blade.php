<!-- Fichier : resources/views/public/cart/index.blade.php -->
<x-public-layout>
    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-extrabold text-gray-900 dark:text-gray-100 mb-8">Votre Panier</h1>
            
            @if(session('success'))
                <div class="p-4 mb-6 bg-green-100 dark:bg-green-800 text-green-700 dark:text-green-200 rounded-lg shadow">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg">
                {{-- On vérifie si le panier est vide ou non --}}
                @if(session('cart') && count(session('cart')) > 0)
                    
                    <div class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach(session('cart') as $id => $details)
                            <div class="p-6 flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="{{ $details['image_url'] ?? 'https://via.placeholder.com/150' }}" alt="{{ $details['nom'] }}" class="w-20 h-20 object-cover rounded-lg mr-6">
                                    <div>
                                        <h2 class="font-semibold text-lg text-gray-900 dark:text-gray-100">{{ $details['nom'] }}</h2>
                                        <p class="text-gray-600 dark:text-gray-400 text-sm">{{ number_format($details['prix'], 2, ',', ' ') }} € x {{ $details['quantity'] }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-6">
                                    <span class="font-bold text-xl text-gray-800 dark:text-gray-200">{{ number_format($details['prix'] * $details['quantity'], 2, ',', ' ') }} €</span>
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-gray-400 hover:text-red-500 transition-colors" title="Retirer l'article">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="p-6 bg-gray-50 dark:bg-gray-700/50 rounded-b-lg">
                        @php
                            $total = 0;
                            foreach(session('cart') as $details) { $total += $details['prix'] * $details['quantity']; }
                        @endphp
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-medium text-gray-700 dark:text-gray-300">Total :</span>
                            <span class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ number_format($total, 2, ',', ' ') }} €</span>
                        </div>
                        <form action="{{ route('checkout') }}" method="POST" class="mt-6">
                            @csrf
                            <button type="submit" class="w-full px-8 py-3 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700 transition ease-in-out duration-150">
                                Passer la Commande
                            </button>
                        </form>
                    </div>
                    
                @else {{-- Si le panier est vide --}}
                
                    <div class="text-center p-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-gray-100">Votre panier est vide.</h3>
                        <p class="mt-1 text-sm text-gray-500">Parcourez nos exposants pour trouver des produits délicieux.</p>
                        <div class="mt-6">
                            <a href="{{ route('exposants.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md font-semibold hover:bg-indigo-700">
                                Voir les exposants
                            </a>
                        </div>
                    </div>
                
                @endif {{-- On ferme bien la condition principale --}}
            </div>

        </div>
    </div>
</x-public-layout>