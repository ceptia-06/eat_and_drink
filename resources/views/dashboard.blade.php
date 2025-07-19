<!-- Fichier: resources/views/dashboard.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ 'Tableau de bord' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if(auth()->user()->role === 'admin')
                        Vous êtes connecté en tant qu'administrateur.
                        <br>
                        <a href="{{ route('admin.dashboard') }}" class="text-indigo-600 hover:text-indigo-900">Accéder au panel admin</a>

                    @elseif(auth()->user()->role === 'entrepreneur_approuve')
                        Bienvenue, entrepreneur ! Vous pouvez maintenant gérer votre stand et vos produits.
                         <br>
                        <a href="{{ route('stand.edit') }}" class="text-indigo-600 hover:text-indigo-900">Gérer mon stand</a>

                    @elseif(auth()->user()->role === 'entrepreneur_en_attente')
                        Votre demande d'inscription est en cours de validation par un administrateur. Vous serez notifié lorsque votre compte sera activé.
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>