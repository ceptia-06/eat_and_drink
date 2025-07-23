<!-- Fichier : resources/views/admin/orders/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Suivi des Commandes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-6">
                @forelse ($orders as $order)
                    <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                        Commande #{{ $order->id }} - 
                                        <span class="font-normal text-gray-600 dark:text-gray-400">
                                            Stand: {{ $order->stand->nom_stand ?? 'N/A' }}
                                            (par {{ $order->stand->user->nom_entreprise ?? 'N/A' }})
                                        </span>
                                    </h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                        Passée le : {{ $order->created_at->format('d/m/Y à H:i') }}
                                    </p>
                                </div>
                                <div class="text-right">
                                    @php
                                        $total = 0;
                                        foreach($order->details_commande as $details) {
                                            $total += $details['prix'] * $details['quantity'];
                                        }
                                    @endphp
                                    <p class="text-xl font-bold text-indigo-600 dark:text-indigo-400">
                                        {{ number_format($total, 2, ',', ' ') }} €
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="p-6 bg-gray-50 dark:bg-gray-800/50">
                            <h4 class="font-semibold text-gray-700 dark:text-gray-300">Détails :</h4>
                            <ul class="mt-2 list-disc list-inside text-gray-600 dark:text-gray-400 space-y-1">
                                @foreach ($order->details_commande as $details)
                                    <li>{{ $details['quantity'] }} x {{ $details['nom'] }} (à {{ number_format($details['prix'], 2, ',', ' ') }} €)</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @empty
                    <div class="text-center bg-white dark:bg-gray-800 rounded-lg shadow-sm p-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-gray-100">Aucune commande passée</h3>
                        <p class="mt-1 text-sm text-gray-500">Revenez plus tard pour voir les commandes des visiteurs.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>