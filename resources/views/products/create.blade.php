<!-- Fichier : resources/views/products/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Ajouter un Nouveau Produit
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
                            Remplissez les détails de votre produit. Le nom et le prix sont obligatoires.
                        </p>
                    </header>

                    <form method="post" action="{{ route('produits.store') }}" class="mt-6 space-y-6">
                        @csrf
                        
                        {{-- Le formulaire partagé fait tout le travail ! --}}
                        @include('products._form') 
                
                        <div class="flex items-center gap-4">
                            <x-primary-button>Ajouter le produit</x-primary-button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>