<x-guest-layout>
    <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-8">Votre Panier</h1>
        
        @if(session('success'))
            <div class="p-4 mb-4 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
        @endif

        @if(!empty($cart))
            <div class="bg-white shadow-md rounded-lg p-6">
                @foreach($cart as $id => $details)
                <div class="flex items-center justify-between py-4 border-b">
                    <div class="flex items-center">
                        <img src="{{ $details['image_url'] ?? 'https://via.placeholder.com/150' }}" alt="{{ $details['nom'] }}" class="w-20 h-20 object-cover rounded mr-4">
                        <div>
                            <h2 class="font-semibold text-lg">{{ $details['nom'] }}</h2>
                            <p class="text-gray-600">{{ $details['prix'] }} € x {{ $details['quantity'] }}</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <span class="font-bold text-xl mr-4">{{ $details['prix'] * $details['quantity'] }} €</span>
                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-red-500 hover:text-red-700 font-bold">X</button>
                        </form>
                    </div>
                </div>
                @endforeach
                
                <div class="mt-8 text-right">
                    <p class="text-2xl font-bold">Total : <span class="text-indigo-600">{{ $total }} €</span></p>
                    <form action="{{ route('checkout') }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit" class="w-full sm:w-auto px-8 py-3 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700">
                            Passer la Commande
                        </button>
                    </form>
                </div>
            </div>
        @else
            <div class="text-center bg-white p-12 rounded-lg shadow">
                <p class="text-xl text-gray-500">Votre panier est vide.</p>
                <a href="{{ route('exposants.index') }}" class="mt-6 inline-block bg-indigo-600 text-white py-2 px-6 rounded-md font-semibold hover:bg-indigo-700">
                    Voir les exposants
                </a>
            </div>
        @endif
    </div>
</x-guest-layout>