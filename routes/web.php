<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\StandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\CartController; 




Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/exposants', [PublicController::class, 'index'])->name('exposants.index');
Route::get('/exposants/{stand}', [PublicController::class, 'show'])->name('exposants.show');

Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/users/{user}/approve', [UserController::class, 'approve'])->name('users.approve');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
});

Route::middleware(['auth', 'role:entrepreneur_approuve'])->group(function () {
    
    // La page pour voir/modifier son stand
    Route::get('/mon-stand', [StandController::class, 'edit'])->name('stand.edit');
    
    // La route pour sauvegarder les modifications (le formulaire enverra les données ici)
    Route::post('/mon-stand', [StandController::class, 'update'])->name('stand.update');

    // ROUTE RESOURCE POUR LES PRODUITS
    // Elle va automatiquement créer les routes pour:
    // index, create, store, show, edit, update, destroy
    Route::resource('produits', ProductController::class);

});

require __DIR__.'/auth.php';
