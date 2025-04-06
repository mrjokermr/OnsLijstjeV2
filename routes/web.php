<?php

use App\Http\Controllers\ShoppingListController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware(['auth'])->group(function () {
    //name dashboard for the fortify login routing redirects.
    Route::get('main-menu', [ShoppingListController::class, 'index'])->name('dashboard');
});

require __DIR__.'/auth.php';
