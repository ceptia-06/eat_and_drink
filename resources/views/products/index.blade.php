<!-- Fichier : resources/views/products/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Gestion de mes Produits
            </h2>
            <a href="{{ route('produits.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 transition ease-in-out duration-150">
                Ajouter un Produit
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Messages de session (succès et erreur) -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 dark:bg-green-800 border border-green-300 dark:border-green-600 text-green-700 dark:text-green-200 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error')) {{-- On ajoute celui-ci pour l'erreur "créez votre stand" --}}
                <div class="mb-6 p-4 bg-red-100 dark:bg-red-800 border border-red-300 dark:border-red-600 text-red-700 dark:text-red-200 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8">
                    <div class="overflow-x-auto">
                       <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
    <thead class="bg-gray-50 dark:bg-gray-700">
        <!-- ... la partie thead ne change pas ... -->
    </thead>
    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
        
        <!-- CORRECTION DE LA BOUCLE ICI -->
        @forelse ($products as $produit)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $produit->nom }}</td>
                <td class="px-6 py-4 whitespace-normal text-sm text-gray-500 dark:text-gray-400 max-w-xs truncate hidden sm:table-cell">{{ $produit->description }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 text-right font-semibold">{{ number_format($produit->prix, 2, ',', ' ') }} €</td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <div class="flex justify-end items-center space-x-4">
                        <!-- On utilise bien $produit ici, maintenant ça marche ! -->
                        <a href="{{ route('produits.edit', $produit) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900">Modifier</a>
                        <form action="{{ route('produits.destroy', $produit) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-900">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <!-- ... la partie empty ne change pas ... -->
        @endforelse
        
    </tbody>
</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>