<x-app-layout>
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

         <div class="mb-4">
            <a href="{{ route('produits.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-blue-500">
                Gérer mes produits →
            </a>
         </div>

        @if(session('success'))


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Modifier : {{ $product->nom }}</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('produits.update', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- Important pour dire à Laravel que c'est une mise à jour -->
                        @include('products._form')
                        <x-primary-button class="mt-4">Mettre à jour</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>