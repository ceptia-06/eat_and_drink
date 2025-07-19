<!-- Fichier: resources/views/public/exposants/show.blade.php -->
<x-guest-layout>
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <!-- Informations sur le Stand -->
        <div class="mb-12">
            <h1 class="text-4xl font-extrabold text-gray-900">{{ $stand->nom_stand }}</h1>
            <p class="mt-2 text-xl text-gray-600">Par {{ $stand->user->nom_entreprise }}</p>
            <p class="mt-4 text-gray-700">{{ $stand->description }}</p>
        </div>
        
        <hr class="my-8">
        
        <h2 class="text-3xl font-bold text-gray-900 mb-8">Nos Produits</h2>

        <!-- Grille des produits -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($products as $product)
                <div class="bg-white rounded-lg shadow-md flex flex-col">
                    @if($product->image_url)
                        <img src="{{ $product->image_url }}" alt="{{ $product->nom }}" class="w-full h-48 object-cover rounded-t-lg">
                    @else
                         <div class="w-full h-48 bg-gray-200 flex items-center justify-center rounded-t-lg">
                            <span class="text-gray-500">Pas d'image</span>
                         </div>
                    @endif
                    <div class="p-6 flex-grow">
                        <h3 class="text-lg font-semibold">{{ $product->nom }}</h3>
                        <p class="text-sm text-gray-600 mt-2 flex-grow">{{ $product->description }}</p>
                    </div>
                     <div class="p-6 pt-0 flex justify-between items-center">
                        <span class="text-2xl font-bold text-gray-900">{{ $product->prix }} €</span>
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                                Ajouter au Panier
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="col-span-3 text-center text-gray-500">Ce stand n'a aucun produit à vendre pour le moment.</p>
            @endforelse
        </div>
         <div class="mt-12 text-center">
            <a href="{{ route('exposants.index') }}" class="text-indigo-600 hover:text-indigo-800">← Retour à la liste des exposants</a>
        </div>
    </div>
</x-guest-layout>