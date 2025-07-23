<!-- Fichier : resources/views/products/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Modifier le produit : {{ $produit->nom }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <section class="p-6 md:p-8">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            Informations du Produit
                        </h2>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Mettez à jour les détails de votre produit.
                        </p>
                    </header>

                    <form method="post" action="{{ route('produits.update', $produit->id) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('PUT')
                        
                        {{-- Le même formulaire partagé, c'est ça la magie ! --}}
                        @include('products._form')
                        
                        <div class="flex items-center gap-4">
                            <x-primary-button>Mettre à jour</x-primary-button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>