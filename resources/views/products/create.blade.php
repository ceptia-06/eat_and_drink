<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Ajouter un nouveau produit</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('produits.store') }}" method="POST">
                        @csrf
                        @include('products._form') <!-- On inclut le formulaire partagé -->
                        <x-primary-button class="mt-4">Ajouter le produit</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>