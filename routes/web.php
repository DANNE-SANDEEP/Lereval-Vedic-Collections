<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\AddProductComponent;
use App\Livewire\CategoryComponent;
use App\Livewire\OrderManagementComponent;
use Illuminate\Support\Facades\Route;
use App\Livewire\BrowseProductsComponent;
use App\Livewire\SingleProductComponent;
use App\Livewire\CartComponent;
use App\Http\Controllers\CategoryController;
use App\Livewire\AdminOverview;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','rolemanager:customer'])->name('dashboard');


Route::middleware(['auth', 'verified','rolemanager:admin'])->group(function () {

    Route::get('/admin/dashboard', AdminOverview::class)->name('admin.dashboard');

    Route::get('/admin/categories', CategoryComponent::class)->name('admin.categories');

    Route::get('/admin/add-product', AddProductComponent::class)->name('admin.add-product');

    Route::get('/admin/orders', OrderManagementComponent::class)->name('admin.orders');

});

Route::get('/', BrowseProductsComponent::class)->name('products.browse');

Route::get('/product/{id}', SingleProductComponent::class)->name('product.show');

Route::get('/category/{id}', [CategoryController::class, 'index'])->name('category.show');

Route::middleware(['auth', 'verified', 'rolemanager:customer'])->group(function(){

    Route::get('/cart', CartComponent::class)->name('cart');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
