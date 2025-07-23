<!-- Fichier : resources/views/layouts/sidebar.blade.php -->

<h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Menu</h2>

<nav>
    <ul>
        <!-- Lien commun : Dashboard -->
        <li>
            <a href="{{ route('dashboard') }}" 
               class="flex items-center p-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 {{ request()->routeIs('dashboard') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span>Tableau de bord</span>
            </a>
        </li>

        <!-- ==================== MENU ADMIN ==================== -->
        @if(auth()->user()->role === 'admin')
            <li class="mt-2">
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center p-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    <span>Approbations</span>
                </a>
            </li>
            <li class="mt-2">
                <a href="{{ route('admin.orders.index') }}"
                class="flex items-center p-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 {{ request()->routeIs('admin.orders.index') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    <span>Suivi des Commandes</span>
                </a>
            </li>
        @endif

        <!-- ==================== MENU ENTREPRENEUR ==================== -->
        @if(auth()->user()->role === 'entrepreneur_approuve')
            <li class="mt-2">
                <a href="{{ route('stand.edit') }}"
                   class="flex items-center p-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 {{ request()->routeIs('stand.edit') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
                   <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    <span>Mon Stand</span>
                </a>
            </li>
            <li class="mt-2">
                <a href="{{ route('produits.index') }}"
                   class="flex items-center p-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 {{ request()->routeIs('produits.*') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 9V7a2 2 0 00-2-2H9a2 2 0 00-2 2v2m8 0H9m8 0l1 9H8l1-9m-4-2h14a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/></svg>
                    <span>Mes Produits</span>
                </a>
            </li>
        @endif

         <!-- ==================== STATUS EN ATTENTE ==================== -->
         @if(auth()->user()->role === 'entrepreneur_en_attente')
            <li class="mt-4 p-2 bg-yellow-100 dark:bg-yellow-800 rounded-lg">
                <p class="text-sm text-yellow-800 dark:text-yellow-200">
                    Votre compte est en attente d'approbation.
                </p>
            </li>
         @endif
    </ul>
</nav>