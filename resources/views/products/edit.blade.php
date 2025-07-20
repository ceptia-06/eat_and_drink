<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Modifier le produit : {{ $produit->nom }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('produits.update', $produit->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- On inclut le formulaire partagé --}}
                        @include('products._form')

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>Mettre à jour</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>