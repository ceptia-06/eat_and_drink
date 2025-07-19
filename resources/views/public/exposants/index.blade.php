<!-- Fichier: resources/views/public/exposants/index.blade.php -->
<x-guest-layout>
    <div class="bg-gray-100">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Nos Exposants Eat&Drink
                </h2>
                <p class="mt-4 text-lg text-gray-600">
                    Découvrez les saveurs uniques de nos artisans et restaurateurs.
                </p>
            </div>
            
            <div class="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @forelse($stands as $stand)
                    <div class="bg-white rounded-lg shadow-lg">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900">{{ $stand->nom_stand }}</h3>
                            <p class="mt-2 text-gray-600 truncate">{{ $stand->description }}</p>
                            <p class="mt-4 text-sm text-gray-500">Proposé par : {{ $stand->user->nom_entreprise }}</p>
                            <a href="{{ route('exposants.show', $stand->id) }}" class="mt-6 block text-center w-full bg-indigo-600 text-white py-2 rounded-md font-semibold hover:bg-indigo-700">
                                Voir les produits
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="col-span-3 text-center text-gray-500">Aucun exposant approuvé pour le moment. Revenez bientôt !</p>
                @endforelse
            </div>
        </div>
    </div>
</x-guest-layout>