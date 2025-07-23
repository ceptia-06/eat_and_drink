<!-- Fichier : resources/views/public/exposants/show.blade.php -->
<x-public-layout>
    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section d'En-tête du Stand -->
            <div class="mb-12 bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8">
                <h1 class="text-4xl font-extrabold text-gray-900 dark:text-gray-100">{{ $stand->nom_stand }}</h1>
                <p class="mt-2 text-xl text-gray-600 dark:text-gray-400">Proposé par {{ $stand->user->nom_entreprise }}</p>
                <p class="mt-4 text-gray-700 dark:text-gray-300 max-w-3xl">{{ $stand->description }}</p>
            </div>
            
            <hr class="my-8 border-gray-200 dark:border-gray-700">
            
            <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-200 mb-8">Découvrez nos Produits</h2>
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 dark:bg-green-800 border border-green-300 dark:border-green-600 text-green-700 dark:text-green-200 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Grille des produits -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($products as $product)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md flex flex-col overflow-hidden transform hover:-translate-y-1 transition-transform duration-300">
                        <!-- Image du produit -->
                        <div class="h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                            <!-- Utilisation d'une image placeholder si l'image_url est vide -->
                            <img src="{{ $product->image_url ?: 'https://via.placeholder.com/400x300.png/E2E8F0/A0AEC0?text=Eat%26Drink' }}" alt="{{ $product->nom }}" class="w-full h-full object-cover">
                        </div>

                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">{{ $product->nom }}</h3>
                            <p class="text-gray-600 dark:text-gray-400 mt-2 flex-grow">{{ $product->description }}</p>
                            <div class="mt-4 flex justify-between items-center">
                                <span class="text-2xl font-bold text-gray-900 dark:text-gray-200">{{ number_format($product->prix, 2, ',', ' ') }} €</span>
                                
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Ajouter
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                @empty
                    <p class="col-span-1 md:col-span-2 lg:col-span-3 text-center text-gray-500 dark:text-gray-400 py-12">
                        Ce stand n'a aucun produit à vendre pour le moment.
                    </p>
                @endforelse
            </div>

            <!-- Bouton de retour -->
            <div class="mt-12 text-center">
                <a href="{{ route('exposants.index') }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 font-semibold">
                    ← Retour à la liste des exposants
                </a>
            </div>

        </div>
    </div>
</x-public-layout>