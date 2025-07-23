<x-public-layout>
    <div class="bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-gray-100 sm:text-4xl">
                    Nos Exposants Eat&Drink
                </h2>
                <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">
                    Découvrez les saveurs uniques de nos artisans et restaurateurs.
                </p>
            </div>
            
            <div class="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @forelse($stands as $stand)
                    <!-- Début de la carte améliorée -->
                    <div class="group bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 ease-in-out transform hover:-translate-y-2">
                        <div class="p-6">
                            <!-- Image de stand placeholder -->
                            <div class="aspect-w-16 aspect-h-9 mb-4">
                                <div class="w-full h-full bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6z" />
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h8m-4-4v8" />
                                    </svg>
                                </div>
                            </div>
                            
                            <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">{{ $stand->nom_stand }}</h3>
                            
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Par {{ $stand->user->nom_entreprise }}</p>
                            
                            <p class="mt-4 text-gray-600 dark:text-gray-300 h-16 overflow-hidden text-ellipsis">{{ $stand->description }}</p>
                            
                            <a href="{{ route('exposants.show', $stand->id) }}" class="mt-6 block text-center w-full bg-indigo-600 text-white py-2 rounded-md font-semibold hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transform group-hover:scale-105 transition-transform">
                                Voir les produits
                            </a>
                        </div>
                    </div>
                    <!-- Fin de la carte améliorée -->
                @empty
                    <p class="col-span-1 sm:col-span-2 lg:col-span-3 text-center text-gray-500 dark:text-gray-400">
                        Aucun exposant approuvé pour le moment. Revenez bientôt !
                    </p>
                @endforelse
            </div>
        </div>
    </div>
</x-public-layout>